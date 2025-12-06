<?php
require_once 'vendor/autoload.php';

// Set Stripe API key (use test key for development)
\Stripe\Stripe::setApiKey('sk_test_your_stripe_secret_key_here'); // Replace with: sk_test_51ABC123...

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

// Validate required fields
if (!isset($input['amount']) || !isset($input['currency']) || !isset($input['payment_method_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields: amount, currency, payment_method_id']);
    exit;
}

try {
    // Create payment intent
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $input['amount'], // Amount in cents
        'currency' => $input['currency'],
        'payment_method' => $input['payment_method_id'],
        'confirmation_method' => 'manual',
        'confirm' => true,
        'return_url' => 'https://your-website.com/return'
    ]);

    if ($paymentIntent->status === 'succeeded') {
        echo json_encode([
            'success' => true,
            'payment_intent_id' => $paymentIntent->id,
            'status' => $paymentIntent->status
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'requires_action' => true,
            'client_secret' => $paymentIntent->client_secret
        ]);
    }

} catch (\Stripe\Exception\CardException $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getError()->message]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Payment processing failed']);
}
?>