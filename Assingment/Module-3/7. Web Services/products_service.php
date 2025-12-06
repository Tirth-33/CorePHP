<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

// Sample product data
$products = [
    1 => [
        'id' => 1,
        'name' => 'Laptop',
        'description' => 'High-performance laptop with 16GB RAM',
        'price' => 75000.00,
        'category' => 'Electronics',
        'stock' => 25,
        'image' => 'laptop.jpg'
    ],
    2 => [
        'id' => 2,
        'name' => 'Smartphone',
        'description' => 'Latest Android smartphone with 128GB storage',
        'price' => 35000.00,
        'category' => 'Electronics',
        'stock' => 50,
        'image' => 'smartphone.jpg'
    ],
    3 => [
        'id' => 3,
        'name' => 'Headphones',
        'description' => 'Wireless Bluetooth headphones with noise cancellation',
        'price' => 8500.00,
        'category' => 'Electronics',
        'stock' => 100,
        'image' => 'headphones.jpg'
    ],
    4 => [
        'id' => 4,
        'name' => 'T-Shirt',
        'description' => 'Cotton casual t-shirt available in multiple colors',
        'price' => 899.00,
        'category' => 'Clothing',
        'stock' => 200,
        'image' => 'tshirt.jpg'
    ],
    5 => [
        'id' => 5,
        'name' => 'Jeans',
        'description' => 'Premium denim jeans with comfortable fit',
        'price' => 2499.00,
        'category' => 'Clothing',
        'stock' => 75,
        'image' => 'jeans.jpg'
    ]
];

// Error handling function
function sendError($code, $message) {
    http_response_code($code);
    echo json_encode([
        'error' => true,
        'code' => $code,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    exit;
}

// Success response function
function sendSuccess($data, $message = 'Success') {
    echo json_encode([
        'error' => false,
        'message' => $message,
        'data' => $data,
        'timestamp' => date('Y-m-d H:i:s')
    ]);
}

// Only allow GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    sendError(405, 'Method not allowed. Only GET requests are supported.');
}

// Get request parameters
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$category = isset($_GET['category']) ? trim($_GET['category']) : null;
$search = isset($_GET['search']) ? trim($_GET['search']) : null;

try {
    // Get single product by ID
    if ($id) {
        if (!isset($products[$id])) {
            sendError(404, "Product with ID $id not found");
        }
        sendSuccess($products[$id], 'Product retrieved successfully');
    }
    
    // Filter products
    $filteredProducts = $products;
    
    // Filter by category
    if ($category) {
        $filteredProducts = array_filter($filteredProducts, function($product) use ($category) {
            return strcasecmp($product['category'], $category) === 0;
        });
        
        if (empty($filteredProducts)) {
            sendError(404, "No products found in category: $category");
        }
    }
    
    // Search products
    if ($search) {
        $filteredProducts = array_filter($filteredProducts, function($product) use ($search) {
            return stripos($product['name'], $search) !== false || 
                   stripos($product['description'], $search) !== false;
        });
        
        if (empty($filteredProducts)) {
            sendError(404, "No products found matching search: $search");
        }
    }
    
    // Return all products or filtered results
    sendSuccess(array_values($filteredProducts), 'Products retrieved successfully');
    
} catch (Exception $e) {
    sendError(500, 'Internal server error: ' . $e->getMessage());
}
?>