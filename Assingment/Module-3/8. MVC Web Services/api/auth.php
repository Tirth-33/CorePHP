<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once __DIR__ . '/../models/User.php';

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

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    sendResponse(false, 'Method not allowed');
}

$input = json_decode(file_get_contents('php://input'), true);
$action = $input['action'] ?? '';

$user = new User();

try {
    switch ($action) {
        case 'register':
            if (!isset($input['username'], $input['email'], $input['password'])) {
                http_response_code(400);
                sendResponse(false, 'Username, email, and password required');
            }
            
            if ($user->register($input['username'], $input['email'], $input['password'])) {
                sendResponse(true, 'User registered successfully');
            } else {
                http_response_code(500);
                sendResponse(false, 'Registration failed');
            }
            break;
            
        case 'login':
            if (!isset($input['email'], $input['password'])) {
                http_response_code(400);
                sendResponse(false, 'Email and password required');
            }
            
            $userData = $user->login($input['email'], $input['password']);
            if ($userData) {
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['username'] = $userData['username'];
                sendResponse(true, 'Login successful', $userData);
            } else {
                http_response_code(401);
                sendResponse(false, 'Invalid credentials');
            }
            break;
            
        case 'logout':
            session_destroy();
            sendResponse(true, 'Logout successful');
            break;
            
        case 'profile':
            if (!isset($_SESSION['user_id'])) {
                http_response_code(401);
                sendResponse(false, 'Not authenticated');
            }
            
            $userData = $user->getUserById($_SESSION['user_id']);
            if ($userData) {
                sendResponse(true, 'Profile retrieved', $userData);
            } else {
                http_response_code(404);
                sendResponse(false, 'User not found');
            }
            break;
            
        default:
            http_response_code(400);
            sendResponse(false, 'Invalid action');
    }
} catch (Exception $e) {
    http_response_code(500);
    sendResponse(false, 'Server error: ' . $e->getMessage());
}
?>