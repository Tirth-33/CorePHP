<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dummy Payment Checkout</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        .checkout-box { background: #f8f9fa; border: 1px solid #dee2e6; padding: 30px; border-radius: 10px; text-align: center; }
        .btn { background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin: 10px; }
        .btn-cancel { background: #dc3545; }
        .card-input { width: 200px; padding: 8px; margin: 5px; border: 1px solid #ccc; border-radius: 3px; }
    </style>
</head>
<body>
    <?php
    session_start();
    $payment_data = $_SESSION['payment_data'] ?? null;
    ?>
    
    <div class="checkout-box">
        <h2>🔒 Secure Payment Checkout (Demo)</h2>
        
        <?php if ($payment_data): ?>
            <p><strong>Product:</strong> <?php echo htmlspecialchars($payment_data['product_name']); ?></p>
            <p><strong>Amount:</strong> ₹<?php echo number_format($payment_data['amount'] / 100, 2); ?></p>
            
            <div style="margin: 20px 0;">
                <h4>Enter Card Details (Demo)</h4>
                <input type="text" class="card-input" placeholder="4242 4242 4242 4242" readonly><br>
                <input type="text" class="card-input" placeholder="12/25" readonly>
                <input type="text" class="card-input" placeholder="123" readonly>
            </div>
            
            <p><em>This is a demo payment system for assignment purposes</em></p>
            
            <form action="success.php" method="GET" style="display: inline;">
                <input type="hidden" name="session_id" value="<?php echo $payment_data['session_id']; ?>">
                <button type="submit" class="btn">Complete Payment</button>
            </form>
            
            <form action="cancel.php" method="GET" style="display: inline;">
                <button type="submit" class="btn btn-cancel">Cancel</button>
            </form>
        <?php else: ?>
            <p>Invalid payment session</p>
            <a href="index.php" class="btn">Back to Blog</a>
        <?php endif; ?>
    </div>
</body>
</html>