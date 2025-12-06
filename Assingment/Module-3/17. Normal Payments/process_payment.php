<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);
$paymentMethod = $input['payment_method'] ?? '';
$amount = $input['amount'] ?? 0;

if (empty($paymentMethod) || $amount <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid payment data']);
    exit();
}

// Database connection for storing transactions
$host = 'localhost';
$dbname = 'payment_system';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database and table if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        transaction_id VARCHAR(255) UNIQUE NOT NULL,
        payment_method VARCHAR(50) NOT NULL,
        amount DECIMAL(10,2) NOT NULL,
        currency VARCHAR(3) DEFAULT 'INR',
        status VARCHAR(20) DEFAULT 'pending',
        customer_email VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");
    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

switch($paymentMethod) {
    case 'stripe':
        handleStripePayment($pdo, $amount);
        break;
    case 'paypal':
        handlePayPalPayment($pdo, $amount);
        break;
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Unsupported payment method']);
}

function handleStripePayment($pdo, $amount) {
    // Stripe configuration
    $stripe_secret_key = 'sk_test_YOUR_STRIPE_SECRET_KEY'; // Replace with actual secret key
    
    // For demo purposes, simulate Stripe payment if no API key
    if ($stripe_secret_key === 'sk_test_YOUR_STRIPE_SECRET_KEY') {
        // Mock Stripe payment intent
        $transactionId = 'pi_demo_' . generateTransactionId();
        
        // Store transaction in database
        storeTransaction($pdo, $transactionId, 'stripe', $amount / 100, 'completed');
        
        echo json_encode([
            'client_secret' => $transactionId . '_secret_demo',
            'transaction_id' => $transactionId,
            'status' => 'succeeded'
        ]);
        return;
    }
    
    // Real Stripe integration
    require_once 'vendor/autoload.php'; // Stripe PHP library
    \Stripe\Stripe::setApiKey($stripe_secret_key);
    
    try {
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'inr',
            'payment_method_types' => ['card'],
            'metadata' => [
                'order_id' => 'order_' . time()
            ]
        ]);
        
        // Store transaction in database
        storeTransaction($pdo, $paymentIntent->id, 'stripe', $amount / 100, 'pending');
        
        echo json_encode([
            'client_secret' => $paymentIntent->client_secret,
            'transaction_id' => $paymentIntent->id
        ]);
        
    } catch (\Stripe\Exception\ApiErrorException $e) {
        http_response_code(400);
        echo json_encode(['error' => 'Stripe error: ' . $e->getMessage()]);
    }
}

function handlePayPalPayment($pdo, $amount) {
    // PayPal configuration
    $paypal_client_id = 'YOUR_PAYPAL_CLIENT_ID';
    $paypal_client_secret = 'YOUR_PAYPAL_CLIENT_SECRET';
    $paypal_mode = 'sandbox'; // 'sandbox' or 'live'
    
    // For demo purposes, simulate PayPal payment if no credentials
    if ($paypal_client_id === 'YOUR_PAYPAL_CLIENT_ID') {
        // Mock PayPal payment
        $transactionId = 'paypal_demo_' . generateTransactionId();
        
        // Store transaction in database
        storeTransaction($pdo, $transactionId, 'paypal', $amount / 100, 'completed');
        
        echo json_encode([
            'order_id' => $transactionId,
            'transaction_id' => $transactionId,
            'status' => 'approved'
        ]);
        return;
    }
    
    // Real PayPal integration
    $paypal_url = $paypal_mode === 'sandbox' 
        ? 'https://api.sandbox.paypal.com' 
        : 'https://api.paypal.com';
    
    // Get access token
    $token = getPayPalAccessToken($paypal_client_id, $paypal_client_secret, $paypal_url);
    
    if (!$token) {
        http_response_code(500);
        echo json_encode(['error' => 'PayPal authentication failed']);
        return;
    }
    
    // Create PayPal order
    $order = createPayPalOrder($token, $amount / 100, $paypal_url);
    
    if ($order) {
        // Store transaction in database
        storeTransaction($pdo, $order['id'], 'paypal', $amount / 100, 'pending');
        
        echo json_encode([
            'order_id' => $order['id'],
            'approval_url' => $order['links'][1]['href'] ?? ''
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'PayPal order creation failed']);
    }
}

function getPayPalAccessToken($client_id, $client_secret, $base_url) {
    $url = $base_url . '/v1/oauth2/token';
    
    $data = 'grant_type=client_credentials';
    
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => [
                'Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret),
                'Content-Type: application/x-www-form-urlencoded'
            ],
            'content' => $data
        ]
    ]);
    
    $response = file_get_contents($url, false, $context);
    
    if ($response === false) {
        return false;
    }
    
    $data = json_decode($response, true);
    return $data['access_token'] ?? false;
}

function createPayPalOrder($access_token, $amount, $base_url) {
    $url = $base_url . '/v2/checkout/orders';
    
    $order_data = [
        'intent' => 'CAPTURE',
        'purchase_units' => [[
            'amount' => [
                'currency_code' => 'INR',
                'value' => number_format($amount, 2, '.', '')
            ]
        ]],
        'application_context' => [
            'return_url' => 'http://localhost/success',
            'cancel_url' => 'http://localhost/cancel'
        ]
    ];
    
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => [
                'Authorization: Bearer ' . $access_token,
                'Content-Type: application/json'
            ],
            'content' => json_encode($order_data)
        ]
    ]);
    
    $response = file_get_contents($url, false, $context);
    
    if ($response === false) {
        return false;
    }
    
    return json_decode($response, true);
}

function storeTransaction($pdo, $transactionId, $paymentMethod, $amount, $status) {
    try {
        $stmt = $pdo->prepare("INSERT INTO transactions (transaction_id, payment_method, amount, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$transactionId, $paymentMethod, $amount, $status]);
        return $pdo->lastInsertId();
    } catch(PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function generateTransactionId() {
    return strtoupper(substr(md5(uniqid(rand(), true)), 0, 10));
}
?>