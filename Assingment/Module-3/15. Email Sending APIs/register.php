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

// Validate input
$fullName = trim($input['fullName'] ?? '');
$email = trim($input['email'] ?? '');
$password = $input['password'] ?? '';

if (empty($fullName) || empty($email) || empty($password)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email address']);
    exit();
}

// Database connection (create users table if needed)
$host = 'localhost';
$dbname = 'email_registration';
$username = 'root';
$password_db = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password_db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database and table if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        password_hash VARCHAR(255) NOT NULL,
        email_verified BOOLEAN DEFAULT FALSE,
        verification_token VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Check if email already exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
    http_response_code(400);
    echo json_encode(['error' => 'Email already registered']);
    exit();
}

// Generate verification token
$verificationToken = bin2hex(random_bytes(32));

// Hash password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insert user
try {
    $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password_hash, verification_token) VALUES (?, ?, ?, ?)");
    $stmt->execute([$fullName, $email, $passwordHash, $verificationToken]);
    $userId = $pdo->lastInsertId();
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Registration failed']);
    exit();
}

// Send confirmation email
$emailSent = sendConfirmationEmail($email, $fullName, $verificationToken);

if ($emailSent) {
    echo json_encode([
        'success' => true,
        'message' => 'Registration successful! Please check your email for confirmation.',
        'user_id' => $userId
    ]);
} else {
    echo json_encode([
        'success' => true,
        'message' => 'Registration successful! Email confirmation simulated (demo mode).',
        'user_id' => $userId
    ]);
}

function sendConfirmationEmail($email, $fullName, $token) {
    // SendGrid API configuration
    $sendgrid_api_key = 'YOUR_SENDGRID_API_KEY'; // Replace with actual API key
    
    // Mailgun API configuration  
    $mailgun_api_key = 'YOUR_MAILGUN_API_KEY'; // Replace with actual API key
    $mailgun_domain = 'YOUR_MAILGUN_DOMAIN'; // Replace with your domain
    
    // For demo purposes, simulate email sending if no API keys configured
    if ($sendgrid_api_key === 'YOUR_SENDGRID_API_KEY' && $mailgun_api_key === 'YOUR_MAILGUN_API_KEY') {
        // Log email details (in production, this would actually send)
        error_log("Email would be sent to: $email");
        error_log("Subject: Welcome! Please confirm your email");
        error_log("Verification token: $token");
        return true; // Simulate successful sending
    }
    
    // Try SendGrid first
    if ($sendgrid_api_key !== 'YOUR_SENDGRID_API_KEY') {
        return sendWithSendGrid($email, $fullName, $token, $sendgrid_api_key);
    }
    
    // Try Mailgun as fallback
    if ($mailgun_api_key !== 'YOUR_MAILGUN_API_KEY') {
        return sendWithMailgun($email, $fullName, $token, $mailgun_api_key, $mailgun_domain);
    }
    
    return false;
}

function sendWithSendGrid($email, $fullName, $token, $api_key) {
    $confirmationUrl = "http://localhost/Revision/Assingment/Module-3/15.%20Email%20Sending%20APIs/confirm.php?token=$token";
    
    $data = [
        'personalizations' => [[
            'to' => [['email' => $email, 'name' => $fullName]],
            'subject' => 'Welcome! Please confirm your email'
        ]],
        'from' => ['email' => 'noreply@yoursite.com', 'name' => 'Your Site'],
        'content' => [[
            'type' => 'text/html',
            'value' => generateEmailHTML($fullName, $confirmationUrl)
        ]]
    ];
    
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => [
                "Authorization: Bearer $api_key",
                "Content-Type: application/json"
            ],
            'content' => json_encode($data)
        ]
    ]);
    
    $response = file_get_contents('https://api.sendgrid.com/v3/mail/send', false, $context);
    return $response !== false;
}

function sendWithMailgun($email, $fullName, $token, $api_key, $domain) {
    $confirmationUrl = "http://localhost/Revision/Assingment/Module-3/15.%20Email%20Sending%20APIs/confirm.php?token=$token";
    
    $data = [
        'from' => "Your Site <noreply@$domain>",
        'to' => "$fullName <$email>",
        'subject' => 'Welcome! Please confirm your email',
        'html' => generateEmailHTML($fullName, $confirmationUrl)
    ];
    
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => [
                'Authorization: Basic ' . base64_encode("api:$api_key"),
                'Content-Type: application/x-www-form-urlencoded'
            ],
            'content' => http_build_query($data)
        ]
    ]);
    
    $response = file_get_contents("https://api.mailgun.net/v3/$domain/messages", false, $context);
    return $response !== false;
}

function generateEmailHTML($fullName, $confirmationUrl) {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Email Confirmation</title>
    </head>
    <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;'>
        <div style='background: #f8f9fa; padding: 30px; border-radius: 10px;'>
            <h1 style='color: #667eea; text-align: center; margin-bottom: 30px;'>Welcome to Our Platform!</h1>
            
            <p>Hi <strong>$fullName</strong>,</p>
            
            <p>Thank you for registering with us! We're excited to have you on board.</p>
            
            <p>To complete your registration, please click the button below to confirm your email address:</p>
            
            <div style='text-align: center; margin: 30px 0;'>
                <a href='$confirmationUrl' style='background: #667eea; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block; font-weight: bold;'>Confirm Email Address</a>
            </div>
            
            <p>If the button doesn't work, you can also copy and paste this link into your browser:</p>
            <p style='word-break: break-all; color: #667eea;'>$confirmationUrl</p>
            
            <hr style='margin: 30px 0; border: none; border-top: 1px solid #ddd;'>
            
            <p style='font-size: 14px; color: #666;'>If you didn't create this account, please ignore this email.</p>
            
            <p>Best regards,<br><strong>The Team</strong></p>
        </div>
    </body>
    </html>
    ";
}
?>