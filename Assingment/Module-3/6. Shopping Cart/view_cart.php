<?php
require_once 'cart.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .header { background: #333; color: white; padding: 15px 0; }
        .nav { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; }
        .back-btn { background: #007bff; padding: 8px 15px; border-radius: 5px; text-decoration: none; color: white; }
        .container { max-width: 800px; margin: 20px auto; padding: 0 20px; }
        .cart-item { background: white; padding: 20px; margin-bottom: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; }
        .item-info { flex: 1; }
        .item-name { font-size: 18px; font-weight: bold; margin-bottom: 5px; }
        .item-price { color: #e74c3c; font-weight: bold; }
        .quantity-controls { display: flex; align-items: center; gap: 10px; margin: 0 20px; }
        .qty-btn { background: #007bff; color: white; border: none; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; }
        .qty-input { width: 60px; text-align: center; padding: 5px; border: 1px solid #ddd; border-radius: 4px; }
        .remove-btn { background: #dc3545; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer; }
        .cart-total { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); text-align: right; }
        .total-amount { font-size: 24px; font-weight: bold; color: #28a745; }
        .checkout-btn { background: #28a745; color: white; border: none; padding: 15px 30px; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 15px; }
        .clear-btn { background: #6c757d; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; margin-right: 10px; }
        .empty-cart { text-align: center; padding: 40px; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <div class="nav">
            <h1>Shopping Cart</h1>
            <a href="products.php" class="back-btn">&#8592; Continue Shopping</a>
        </div>
    </div>

    <div class="container">
        <div id="cart-items">
            <?php if (empty($_SESSION['cart'])): ?>
                <div class="empty-cart">
                    <h3>Your cart is empty</h3>
                    <p>Add some products to get started!</p>
                </div>
            <?php else: ?>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="cart-item" id="item-<?= $item['id'] ?>">
                        <div class="item-info">
                            <div class="item-name"><?= htmlspecialchars($item['name']) ?></div>
                            <div class="item-price">&#8377;<?= number_format($item['price']) ?> each</div>
                        </div>
                        
                        <div class="quantity-controls">
                            <button class="qty-btn" onclick="updateQuantity(<?= $item['id'] ?>, <?= $item['quantity'] - 1 ?>)">-</button>
                            <input type="number" class="qty-input" value="<?= $item['quantity'] ?>" 
                                   onchange="updateQuantity(<?= $item['id'] ?>, this.value)" min="0">
                            <button class="qty-btn" onclick="updateQuantity(<?= $item['id'] ?>, <?= $item['quantity'] + 1 ?>)">+</button>
                        </div>
                        
                        <div style="text-align: right;">
                            <div style="font-weight: bold; margin-bottom: 10px;">
                                &#8377;<?= number_format($item['price'] * $item['quantity']) ?>
                            </div>
                            <button class="remove-btn" onclick="removeItem(<?= $item['id'] ?>)">Remove</button>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <div class="cart-total">
                    <button class="clear-btn" onclick="clearCart()">Clear Cart</button>
                    <div class="total-amount">
                        Total: &#8377;<span id="total-amount"><?= number_format(getCartTotal()) ?></span>
                    </div>
                    <button class="checkout-btn" onclick="checkout()">Proceed to Checkout</button>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        async function updateQuantity(id, quantity) {
            const formData = new FormData();
            formData.append('action', 'update');
            formData.append('product_id', id);
            formData.append('quantity', quantity);

            try {
                const response = await fetch('cart.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                alert('Error updating cart');
            }
        }

        async function removeItem(id) {
            if (confirm('Remove this item from cart?')) {
                const formData = new FormData();
                formData.append('action', 'remove');
                formData.append('product_id', id);

                try {
                    const response = await fetch('cart.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        location.reload();
                    } else {
                        alert('Error: ' + result.message);
                    }
                } catch (error) {
                    alert('Error removing item');
                }
            }
        }

        async function clearCart() {
            if (confirm('Clear entire cart?')) {
                const formData = new FormData();
                formData.append('action', 'clear');

                try {
                    const response = await fetch('cart.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        location.reload();
                    } else {
                        alert('Error: ' + result.message);
                    }
                } catch (error) {
                    alert('Error clearing cart');
                }
            }
        }

        function checkout() {
            alert('Checkout functionality would be implemented here!');
        }
    </script>
</body>
</html>