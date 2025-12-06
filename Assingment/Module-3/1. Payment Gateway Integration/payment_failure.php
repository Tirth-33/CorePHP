<!DOCTYPE html>
<html>
<head>
    <title>Payment Failed - SecurePay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); max-width: 450px; width: 90%; text-align: center; }
        .error-icon { font-size: 60px; color: #f44336; margin-bottom: 20px; }
        h1 { color: #333; margin-bottom: 10px; }
        .error-message { background: #ffebee; padding: 15px; border-radius: 8px; margin: 20px 0; color: #c62828; border-left: 4px solid #f44336; }
        .btn { display: inline-block; background: #667eea; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; margin-top: 20px; transition: background 0.3s; }
        .btn:hover { background: #5a6fd8; }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-icon">✗</div>
        <h1>Payment Failed</h1>
        <p>We couldn't process your payment.</p>
        <div class="error-message">
            <strong>Error:</strong> <?= htmlspecialchars($_GET['error'] ?? 'Payment failed') ?>
        </div>
        <p>Please check your card details and try again.</p>
        <a href="checkout.html" class="btn">Try Again</a>
    </div>
</body>
</html>