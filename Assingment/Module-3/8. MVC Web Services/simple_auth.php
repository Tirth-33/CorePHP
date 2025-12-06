<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");
session_start();

$input = json_decode(file_get_contents('php://input'), true);
$action = $input['action'] ?? '';

// Simple user data (no database needed for testing)
$users = [
    'admin@example.com' => ['id' => 1, 'username' => 'admin', 'password' => 'password'],
    'user@example.com' => ['id' => 2, 'username' => 'user', 'password' => 'password']
];

switch ($action) {
    case 'login':
        $email = $input['email'] ?? '';
        $password = $input['password'] ?? '';
        
        if (isset($users[$email]) && $users[$email]['password'] === $password) {
            $_SESSION['user_id'] = $users[$email]['id'];
            $_SESSION['username'] = $users[$email]['username'];
            echo json_encode(['success' => true, 'message' => 'Login successful', 'data' => ['id' => $users[$email]['id'], 'username' => $users[$email]['username']]]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
        break;
        
    case 'logout':
        session_destroy();
        echo json_encode(['success' => true, 'message' => 'Logout successful']);
        break;
        
    case 'profile':
        if (isset($_SESSION['user_id'])) {
            echo json_encode(['success' => true, 'message' => 'Profile retrieved', 'data' => ['id' => $_SESSION['user_id'], 'username' => $_SESSION['username']]]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Not authenticated']);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>