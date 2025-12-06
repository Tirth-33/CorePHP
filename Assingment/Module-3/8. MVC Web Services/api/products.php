<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once __DIR__ . '/../models/Product.php';

session_start();

function sendResponse($success, $message, $data = null) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data,
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    exit;
}

function requireAuth() {
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        sendResponse(false, 'Authentication required');
    }
}

$method = $_SERVER['REQUEST_METHOD'];
$product = new Product();

try {
    switch ($method) {
        case 'GET':
            $id = $_GET['id'] ?? null;
            
            if ($id) {
                $productData = $product->getProductById($id);
                if ($productData) {
                    sendResponse(true, 'Product retrieved', $productData);
                } else {
                    http_response_code(404);
                    sendResponse(false, 'Product not found');
                }
            } else {
                $products = $product->getAllProducts();
                sendResponse(true, 'Products retrieved', $products);
            }
            break;
            
        case 'POST':
            requireAuth();
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($input['name'], $input['price'])) {
                http_response_code(400);
                sendResponse(false, 'Name and price required');
            }
            
            if ($product->createProduct(
                $input['name'],
                $input['description'] ?? '',
                $input['price'],
                $input['category'] ?? ''
            )) {
                sendResponse(true, 'Product created successfully');
            } else {
                http_response_code(500);
                sendResponse(false, 'Failed to create product');
            }
            break;
            
        case 'PUT':
            requireAuth();
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($input['id'], $input['name'], $input['price'])) {
                http_response_code(400);
                sendResponse(false, 'ID, name, and price required');
            }
            
            if ($product->updateProduct(
                $input['id'],
                $input['name'],
                $input['description'] ?? '',
                $input['price'],
                $input['category'] ?? ''
            )) {
                sendResponse(true, 'Product updated successfully');
            } else {
                http_response_code(500);
                sendResponse(false, 'Failed to update product');
            }
            break;
            
        case 'DELETE':
            requireAuth();
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($input['id'])) {
                http_response_code(400);
                sendResponse(false, 'Product ID required');
            }
            
            if ($product->deleteProduct($input['id'])) {
                sendResponse(true, 'Product deleted successfully');
            } else {
                http_response_code(500);
                sendResponse(false, 'Failed to delete product');
            }
            break;
            
        default:
            http_response_code(405);
            sendResponse(false, 'Method not allowed');
    }
} catch (Exception $e) {
    http_response_code(500);
    sendResponse(false, 'Server error: ' . $e->getMessage());
}
?>