<?php
require_once 'cart.php';

$products = [
    1 => ['id' => 1, 'name' => 'Laptop', 'price' => 75000, 'image' => '../5. Product Catalog/images/laptop.jpg'],
    2 => ['id' => 2, 'name' => 'Smartphone', 'price' => 35000, 'image' => '../5. Product Catalog/images/smartphone.jpg'],
    3 => ['id' => 3, 'name' => 'Headphones', 'price' => 8500, 'image' => '../5. Product Catalog/images/headphones.jpg'],
    4 => ['id' => 4, 'name' => 'T-Shirt', 'price' => 899, 'image' => '../5. Product Catalog/images/t-shirts.jpg'],
    5 => ['id' => 5, 'name' => 'Jeans', 'price' => 2499, 'image' => '../5. Product Catalog/images/jeans.jpg']
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .header { background: #333; color: white; padding: 15px 0; }
        .nav { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; }
        .cart-icon { background: #007bff; padding: 8px 15px; border-radius: 20px; text-decoration: none; color: white; }
        .container { max-width: 1200px; margin: 20px auto; padding: 0 20px; }
        .products-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .product-card { background: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); text-align: center; }
        .product-image { width: 100%; height: 150px; object-fit: cover; border-radius: 5px; margin-bottom: 15px; }
        .product-name { font-size: 18px; font-weight: bold; margin-bottom: 10px; }
        .product-price { font-size: 20px; color: #e74c3c; font-weight: bold; margin-bottom: 15px; }
        .add-btn { background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        .add-btn:hover { background: #218838; }
        .notification { position: fixed; top: 20px; right: 20px; background: #28a745; color: white; padding: 15px; border-radius: 5px; display: none; }
    </style>
</head>
<body>
    <div class="header">
        <div class="nav">
            <h1>E-Commerce Store</h1>
            <a href="view_cart.php" class="cart-icon">
                &#128722; Cart (<span id="cart-count"><?= getCartCount() ?></span>)
            </a>
        </div>
    </div>

    <div class="container">
        <h2>Products</h2>
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-image">
                    <div class="product-name"><?= $product['name'] ?></div>
                    <div class="product-price">&#8377;<?= number_format($product['price']) ?></div>
                    <button class="add-btn" onclick="addToCart(<?= $product['id'] ?>, '<?= $product['name'] ?>', <?= $product['price'] ?>)">
                        Add to Cart
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="notification" class="notification"></div>

    <script>
        async function addToCart(id, name, price) {
            const formData = new FormData();
            formData.append('action', 'add');
            formData.append('product_id', id);
            formData.append('name', name);
            formData.append('price', price);
            formData.append('quantity', 1);

            try {
                const response = await fetch('cart.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    showNotification(result.message);
                    updateCartCount();
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                alert('Error adding to cart');
            }
        }

        async function updateCartCount() {
            const formData = new FormData();
            formData.append('action', 'get');
            
            const response = await fetch('cart.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            let count = 0;
            
            if (result.success) {
                for (let item of Object.values(result.cart)) {
                    count += item.quantity;
                }
            }
            
            document.getElementById('cart-count').textContent = count;
        }

        function showNotification(message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.style.display = 'block';
            
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>