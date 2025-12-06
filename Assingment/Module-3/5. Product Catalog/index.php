<?php
require_once 'config.php';

// Get filter parameters
$category = $_GET['category'] ?? '';
$search = $_GET['search'] ?? '';

// Build query
$sql = "SELECT * FROM products WHERE 1=1";
$params = [];

if ($category) {
    $sql .= " AND category = ?";
    $params[] = $category;
}

if ($search) {
    $sql .= " AND (name LIKE ? OR description LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

$sql .= " ORDER BY name";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get categories for filter
$categoryStmt = $pdo->query("SELECT DISTINCT category FROM products ORDER BY category");
$categories = $categoryStmt->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f5f5; }
        .header { background: #2c3e50; color: white; padding: 20px 0; text-align: center; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .filters { background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .filter-group { display: flex; gap: 15px; align-items: center; flex-wrap: wrap; }
        .filter-group input, .filter-group select { padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .filter-group button { background: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; }
        .filter-group button:hover { background: #2980b9; }
        .products-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
        .product-card { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.2s; }
        .product-card:hover { transform: translateY(-2px); }
        .product-image { width: 100%; height: 200px; object-fit: cover; }
        .product-info { padding: 20px; }
        .product-name { font-size: 18px; font-weight: bold; margin-bottom: 8px; color: #2c3e50; }
        .product-category { color: #7f8c8d; font-size: 14px; margin-bottom: 8px; }
        .product-description { color: #555; margin-bottom: 15px; line-height: 1.4; }
        .product-price { font-size: 24px; font-weight: bold; color: #e74c3c; margin-bottom: 10px; }
        .product-stock { color: #27ae60; font-size: 14px; }
        .no-products { text-align: center; padding: 40px; color: #7f8c8d; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Product Catalog</h1>
        <p>Discover amazing products at great prices</p>
    </div>

    <div class="container">
        <!-- Filters -->
        <div class="filters">
            <form method="GET" class="filter-group">
                <input type="text" name="search" placeholder="Search products..." value="<?= htmlspecialchars($search) ?>">
                
                <select name="category">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= htmlspecialchars($cat) ?>" <?= $category === $cat ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cat) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <button type="submit">Filter</button>
                <a href="index.php" style="text-decoration: none; color: #7f8c8d;">Clear</a>
            </form>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            <?php if (empty($products)): ?>
                <div class="no-products">
                    <h3>No products found</h3>
                    <p>Try adjusting your search or filter criteria</p>
                </div>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?= htmlspecialchars($product['image_url']) ?>" 
                             alt="<?= htmlspecialchars($product['name']) ?>" 
                             class="product-image">
                        
                        <div class="product-info">
                            <div class="product-category"><?= htmlspecialchars($product['category']) ?></div>
                            <h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
                            <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                            <div class="product-price">&#8377;<?= number_format($product['price'], 2) ?></div>
                            <div class="product-stock">
                                <?= $product['stock_quantity'] > 0 ? "In Stock ({$product['stock_quantity']} available)" : "Out of Stock" ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>