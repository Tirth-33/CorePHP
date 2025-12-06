<?php
// Database connection
$host = 'localhost';
$dbname = 'email_registration';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Database connection failed');
}

$token = $_GET['token'] ?? '';

if (empty($token)) {
    die('Invalid confirmation link');
}

// Find user by token
$stmt = $pdo->prepare("SELECT id, full_name, email, email_verified FROM users WHERE verification_token = ?");
$stmt->execute([$token]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die('Invalid or expired confirmation link');
}

if ($user['email_verified']) {
    $message = 'Email already confirmed! You can now log in to your account.';
    $status = 'already_confirmed';
} else {
    // Update user as verified
    $stmt = $pdo->prepare("UPDATE users SET email_verified = TRUE, verification_token = NULL WHERE id = ?");
    $stmt->execute([$user['id']]);
    
    $message = 'Email confirmed successfully! Your account is now active.';
    $status = 'confirmed';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Email Confirmation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .confirmation-box { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); text-align: center; max-width: 500px; }
        .success-icon { font-size: 64px; margin-bottom: 20px; }
        .confirmation-box h1 { color: #333; margin-bottom: 15px; }
        .confirmation-box p { color: #666; margin-bottom: 25px; line-height: 1.6; }
        .user-info { background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .back-btn { display: inline-block; padding: 12px 25px; background: #667eea; color: white; text-decoration: none; border-radius: 8px; margin-top: 15px; }
        .back-btn:hover { background: #5a6fd8; }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <?php if ($status === 'confirmed'): ?>
            <div class="success-icon">✅</div>
            <h1>Email Confirmed!</h1>
            <p><?php echo htmlspecialchars($message); ?></p>
        <?php else: ?>
            <div class="success-icon">ℹ️</div>
            <h1>Already Confirmed</h1>
            <p><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        
        <div class="user-info">
            <strong>Account Details:</strong><br>
            Name: <?php echo htmlspecialchars($user['full_name']); ?><br>
            Email: <?php echo htmlspecialchars($user['email']); ?><br>
            Status: <?php echo $user['email_verified'] ? 'Verified' : 'Pending'; ?>
        </div>
        
        <a href="index.html" class="back-btn">← Back to Registration</a>
    </div>
</body>
</html>