<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful - SecurePay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); max-width: 450px; width: 90%; text-align: center; }
        .success-icon { font-size: 60px; color: #4CAF50; margin-bottom: 20px; }
        h1 { color: #333; margin-bottom: 10px; }
        .payment-id { background: #f8f9fa; padding: 15px; border-radius: 8px; margin: 20px 0; font-family: monospace; word-break: break-all; }
        .btn { display: inline-block; background: #667eea; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; margin-top: 20px; transition: background 0.3s; }
        .btn:hover { background: #5a6fd8; }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['payment_intent'])): ?>
            <div class="success-icon">✓</div>
            <h1>Payment Successful!</h1>
            <p>Your payment has been processed successfully.</p>
            <div class="payment-id">
                <strong>Transaction ID:</strong><br>
                <?= htmlspecialchars($_GET['payment_intent']) ?>
            </div>
            <p>Thank you for your purchase!</p>
            <a href="checkout.html" class="btn">Make Another Payment</a>
        <?php else: ?>
            <div class="success-icon">✗</div>
            <h1>Invalid Payment</h1>
            <p>No payment information found.</p>
            <a href="checkout.html" class="btn">Go to Checkout</a>
        <?php endif; ?>
    </div>
</body>
</html>