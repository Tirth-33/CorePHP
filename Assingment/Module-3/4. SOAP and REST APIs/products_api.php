<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$method = $_SERVER['REQUEST_METHOD'];
$dataFile = 'products.json';

function getProducts() {
    global $dataFile;
    return file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
}

function saveProducts($products) {
    global $dataFile;
    file_put_contents($dataFile, json_encode($products, JSON_PRETTY_PRINT));
}

function getNextId($products) {
    return empty($products) ? 1 : max(array_column($products, 'id')) + 1;
}

$products = getProducts();
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $product = array_filter($products, fn($p) => $p['id'] == $_GET['id']);
            echo json_encode($product ? array_values($product)[0] : ['error' => 'Product not found']);
        } else {
            echo json_encode($products);
        }
        break;

    case 'POST':
        if (!$input || !isset($input['name'], $input['price'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Name and price required']);
            break;
        }
        
        $newProduct = [
            'id' => getNextId($products),
            'name' => $input['name'],
            'price' => $input['price'],
            'description' => $input['description'] ?? '',
            'category' => $input['category'] ?? ''
        ];
        
        $products[] = $newProduct;
        saveProducts($products);
        echo json_encode(['success' => true, 'product' => $newProduct]);
        break;

    case 'PUT':
        if (!$input || !isset($input['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Product ID required']);
            break;
        }
        
        $index = array_search($input['id'], array_column($products, 'id'));
        if ($index === false) {
            http_response_code(404);
            echo json_encode(['error' => 'Product not found']);
            break;
        }
        
        $products[$index] = array_merge($products[$index], $input);
        saveProducts($products);
        echo json_encode(['success' => true, 'product' => $products[$index]]);
        break;

    case 'DELETE':
        if (!$input || !isset($input['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Product ID required']);
            break;
        }
        
        $index = array_search($input['id'], array_column($products, 'id'));
        if ($index === false) {
            http_response_code(404);
            echo json_encode(['error' => 'Product not found']);
            break;
        }
        
        array_splice($products, $index, 1);
        saveProducts($products);
        echo json_encode(['success' => true, 'message' => 'Product deleted']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
}
?>