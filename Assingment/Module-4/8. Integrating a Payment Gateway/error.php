<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Error - My Blog</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; text-align: center; }
        .error-box { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 30px; border-radius: 10px; }
        .btn { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 5px; text-decoration: none; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>⚠️ Payment Error</h1>
        <p>There was an error processing your payment:</p>
        <p><strong><?php echo htmlspecialchars($error ?? 'Unknown error occurred'); ?></strong></p>
        <p>Please try again or contact support if the problem persists.</p>
        
        <a href="index.php" class="btn">Try Again</a>
    </div>
</body>
</html>