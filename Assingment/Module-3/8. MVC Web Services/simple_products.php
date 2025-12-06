<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");
session_start();

$method = $_SERVER['REQUEST_METHOD'];

// Simple product data (no database needed)
$products = [
    1 => ['id' => 1, 'name' => 'Laptop', 'price' => 75000, 'category' => 'Electronics'],
    2 => ['id' => 2, 'name' => 'Phone', 'price' => 35000, 'category' => 'Electronics'],
    3 => ['id' => 3, 'name' => 'Headphones', 'price' => 8500, 'category' => 'Electronics']
];

switch ($method) {
    case 'GET':
        $id = $_GET['id'] ?? null;
        if ($id && isset($products[$id])) {
            echo json_encode(['success' => true, 'data' => $products[$id]]);
        } elseif ($id) {
            echo json_encode(['success' => false, 'message' => 'Product not found']);
        } else {
            echo json_encode(['success' => true, 'data' => array_values($products)]);
        }
        break;
        
    case 'POST':
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Authentication required']);
            break;
        }
        
        $input = json_decode(file_get_contents('php://input'), true);
        $newId = max(array_keys($products)) + 1;
        $products[$newId] = [
            'id' => $newId,
            'name' => $input['name'] ?? 'New Product',
            'price' => $input['price'] ?? 0,
            'category' => $input['category'] ?? 'General'
        ];
        echo json_encode(['success' => true, 'message' => 'Product created', 'data' => $products[$newId]]);
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Method not allowed']);
}
?>