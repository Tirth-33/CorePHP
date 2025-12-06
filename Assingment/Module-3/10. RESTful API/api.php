<?php
// Prevent any HTML output
ob_start();
error_reporting(0);
ini_set('display_errors', 0);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    echo json_encode(['status' => 'OK']);
    exit();
}

// Database connection
$host = 'localhost';
$dbname = 'restful_api';
$username = 'root';
$password = '';

try {
    // Create database if not exists
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");
    
    // Create tables if not exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(10,2) NOT NULL,
        category VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Insert sample data
    $pdo->exec("INSERT IGNORE INTO users (name, email) VALUES
        ('John Doe', 'john@example.com'),
        ('Jane Smith', 'jane@example.com')");
    
    $pdo->exec("INSERT IGNORE INTO products (name, description, price, category) VALUES
        ('Laptop', 'Gaming laptop', 75000.00, 'Electronics'),
        ('Phone', 'Smartphone', 35000.00, 'Electronics')");
        
} catch(PDOException $e) {
    ob_clean();
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Simple URL parsing
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);

// Extract resource from URL
if (preg_match('/\/api\.php\/([a-z]+)(?:\/([0-9]+))?/', $path, $matches)) {
    $resource = $matches[1];
    $resource_id = isset($matches[2]) ? (int)$matches[2] : null;
} else {
    $resource = '';
    $resource_id = null;
}

$method = $_SERVER['REQUEST_METHOD'];

// Debug info (remove in production)
// error_log("Resource: $resource, ID: $resource_id, Method: $method");

// Route requests based on resource and method
switch($resource) {
    case 'users':
        handleUsers($pdo, $method, $resource_id);
        break;
    case 'products':
        handleProducts($pdo, $method, $resource_id);
        break;
    default:
        ob_clean();
        http_response_code(404);
        echo json_encode(['error' => 'Resource not found']);
}

// Users resource handler
function handleUsers($pdo, $method, $id) {
    switch($method) {
        case 'GET':
            if ($id) {
                getUser($pdo, $id);
            } else {
                getUsers($pdo);
            }
            break;
        case 'POST':
            createUser($pdo);
            break;
        case 'PUT':
            if ($id) {
                updateUser($pdo, $id);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'User ID required for update']);
            }
            break;
        case 'DELETE':
            if ($id) {
                deleteUser($pdo, $id);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'User ID required for deletion']);
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
    }
}

// Products resource handler
function handleProducts($pdo, $method, $id) {
    switch($method) {
        case 'GET':
            if ($id) {
                getProduct($pdo, $id);
            } else {
                getProducts($pdo);
            }
            break;
        case 'POST':
            createProduct($pdo);
            break;
        case 'PUT':
            if ($id) {
                updateProduct($pdo, $id);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Product ID required for update']);
            }
            break;
        case 'DELETE':
            if ($id) {
                deleteProduct($pdo, $id);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Product ID required for deletion']);
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
    }
}

// User CRUD operations
function getUsers($pdo) {
    $stmt = $pdo->query("SELECT id, name, email, created_at FROM users");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function getUser($pdo, $id) {
    $stmt = $pdo->prepare("SELECT id, name, email, created_at FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        echo json_encode($user);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'User not found']);
    }
}

function createUser($pdo) {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($data['name']) || !isset($data['email'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Name and email are required']);
        return;
    }
    
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute([$data['name'], $data['email']]);
    
    http_response_code(201);
    echo json_encode(['id' => $pdo->lastInsertId(), 'message' => 'User created']);
}

function updateUser($pdo, $id) {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $result = $stmt->execute([$data['name'], $data['email'], $id]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['message' => 'User updated']);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'User not found']);
    }
}

function deleteUser($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['message' => 'User deleted']);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'User not found']);
    }
}

// Product CRUD operations
function getProducts($pdo) {
    $stmt = $pdo->query("SELECT * FROM products");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function getProduct($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        echo json_encode($product);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Product not found']);
    }
}

function createProduct($pdo) {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($data['name']) || !isset($data['price'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Name and price are required']);
        return;
    }
    
    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, category) VALUES (?, ?, ?, ?)");
    $stmt->execute([$data['name'], $data['description'] ?? '', $data['price'], $data['category'] ?? '']);
    
    http_response_code(201);
    echo json_encode(['id' => $pdo->lastInsertId(), 'message' => 'Product created']);
}

function updateProduct($pdo, $id) {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, category = ? WHERE id = ?");
    $result = $stmt->execute([$data['name'], $data['description'], $data['price'], $data['category'], $id]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['message' => 'Product updated']);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Product not found']);
    }
}

function deleteProduct($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['message' => 'Product deleted']);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Product not found']);
    }
}
?>