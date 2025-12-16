<?php
require_once 'dummy_payment.php';

$session_id = $_GET['session_id'] ?? null;
$session = null;

if ($session_id) {
    $session = DummyPaymentGateway::retrieveSession($session_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success - My Blog</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; text-align: center; }
        .success-box { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 30px; border-radius: 10px; }
        .btn { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 5px; text-decoration: none; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="success-box">
        <h1>✅ Payment Successful!</h1>
        
        <?php if ($session): ?>
            <p>Thank you for your <?php echo $session['type'] === 'donation' ? 'donation' : 'purchase'; ?>!</p>
            <p><strong>Amount:</strong> ₹<?php echo number_format($session['amount'] / 100, 2); ?></p>
            <p><strong>Product:</strong> <?php echo htmlspecialchars($session['product_name']); ?></p>
            <p><strong>Payment ID:</strong> <?php echo htmlspecialchars($session['session_id']); ?></p>
            <p><em>Status: Payment Completed Successfully (Demo)</em></p>
        <?php else: ?>
            <p>Thank you for your payment!</p>
        <?php endif; ?>
        
        <p>Your support helps us create better content for everyone.</p>
        
        <a href="index.php" class="btn">Back to Blog</a>
    </div>
</body>
</html>