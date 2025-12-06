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

$phone = $input['phone'] ?? '';
$message = $input['message'] ?? '';
$type = $input['type'] ?? 'custom';

// Validate input
if (empty($phone) || empty($message)) {
    http_response_code(400);
    echo json_encode(['error' => 'Phone number and message are required']);
    exit();
}

// Validate phone number format
if (!preg_match('/^\+?[1-9]\d{1,14}$/', preg_replace('/\s+/', '', $phone))) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid phone number format']);
    exit();
}

// Validate message length
if (strlen($message) > 160) {
    http_response_code(400);
    echo json_encode(['error' => 'Message too long (max 160 characters)']);
    exit();
}

// Database connection for SMS logs
$host = 'localhost';
$dbname = 'sms_notifications';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database and table if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS sms_logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        phone_number VARCHAR(20) NOT NULL,
        message TEXT NOT NULL,
        message_type VARCHAR(50) DEFAULT 'custom',
        message_id VARCHAR(255),
        status VARCHAR(20) DEFAULT 'pending',
        provider VARCHAR(20) DEFAULT 'twilio',
        sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        delivered_at TIMESTAMP NULL,
        error_message TEXT NULL
    )");
    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Twilio configuration
$twilio_sid = 'YOUR_TWILIO_ACCOUNT_SID';
$twilio_token = 'YOUR_TWILIO_AUTH_TOKEN';
$twilio_phone = 'YOUR_TWILIO_PHONE_NUMBER'; // e.g., +1234567890

// Send SMS
$result = sendSMS($phone, $message, $type, $twilio_sid, $twilio_token, $twilio_phone);

if ($result['success']) {
    // Log successful SMS
    logSMS($pdo, $phone, $message, $type, $result['message_id'], 'sent');
    
    echo json_encode([
        'success' => true,
        'message_id' => $result['message_id'],
        'message' => 'SMS sent successfully'
    ]);
} else {
    // Log failed SMS
    logSMS($pdo, $phone, $message, $type, null, 'failed', $result['error']);
    
    http_response_code(500);
    echo json_encode(['error' => $result['error']]);
}

function sendSMS($phone, $message, $type, $sid, $token, $from_phone) {
    // For demo purposes, simulate SMS sending if no Twilio credentials
    if ($sid === 'YOUR_TWILIO_ACCOUNT_SID') {
        // Mock SMS sending
        $message_id = 'SM' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 32));
        
        return [
            'success' => true,
            'message_id' => $message_id,
            'status' => 'sent'
        ];
    }
    
    // Real Twilio SMS sending
    try {
        // Twilio API endpoint
        $url = "https://api.twilio.com/2010-04-01/Accounts/$sid/Messages.json";
        
        // Prepare data
        $data = [
            'From' => $from_phone,
            'To' => $phone,
            'Body' => $message
        ];
        
        // Create context for HTTP request
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => [
                    'Authorization: Basic ' . base64_encode($sid . ':' . $token),
                    'Content-Type: application/x-www-form-urlencoded'
                ],
                'content' => http_build_query($data)
            ]
        ]);
        
        // Send request to Twilio
        $response = file_get_contents($url, false, $context);
        
        if ($response === false) {
            return ['success' => false, 'error' => 'Failed to connect to Twilio API'];
        }
        
        $result = json_decode($response, true);
        
        if (isset($result['sid'])) {
            return [
                'success' => true,
                'message_id' => $result['sid'],
                'status' => $result['status']
            ];
        } else {
            return [
                'success' => false,
                'error' => $result['message'] ?? 'Unknown Twilio error'
            ];
        }
        
    } catch (Exception $e) {
        return ['success' => false, 'error' => 'SMS sending failed: ' . $e->getMessage()];
    }
}

function logSMS($pdo, $phone, $message, $type, $message_id, $status, $error = null) {
    try {
        $stmt = $pdo->prepare("INSERT INTO sms_logs (phone_number, message, message_type, message_id, status, error_message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$phone, $message, $type, $message_id, $status, $error]);
        return $pdo->lastInsertId();
    } catch(PDOException $e) {
        error_log("SMS logging error: " . $e->getMessage());
        return false;
    }
}

// Webhook handler for Twilio delivery status (optional)
if (isset($_GET['webhook']) && $_GET['webhook'] === 'twilio') {
    handleTwilioWebhook($pdo);
}

function handleTwilioWebhook($pdo) {
    $message_sid = $_POST['MessageSid'] ?? '';
    $message_status = $_POST['MessageStatus'] ?? '';
    
    if ($message_sid && $message_status) {
        try {
            $stmt = $pdo->prepare("UPDATE sms_logs SET status = ?, delivered_at = NOW() WHERE message_id = ?");
            $stmt->execute([$message_status, $message_sid]);
            
            echo json_encode(['status' => 'webhook processed']);
        } catch(PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Webhook processing failed']);
        }
    }
}
?>