<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

// Database connection
$host = 'localhost';
$dbname = 'social_auth';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database and table if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        provider VARCHAR(50) NOT NULL,
        provider_id VARCHAR(255),
        avatar_url TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");
    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch($action) {
    case 'google_login':
        handleGoogleLogin();
        break;
    case 'facebook_login':
        handleFacebookLogin();
        break;
    case 'logout':
        handleLogout();
        break;
    case 'get_user':
        getCurrentUser();
        break;
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Invalid action']);
}

function handleGoogleLogin() {
    $token = $_POST['token'] ?? '';
    
    if (empty($token)) {
        http_response_code(400);
        echo json_encode(['error' => 'Token required']);
        return;
    }
    
    // Verify Google token (requires Google Client Library)
    $google_client_id = 'YOUR_GOOGLE_CLIENT_ID';
    
    // For demo purposes, simulate token verification
    if ($google_client_id === 'YOUR_GOOGLE_CLIENT_ID') {
        // Mock Google user data
        $userData = [
            'id' => 'google_123456789',
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'picture' => 'https://via.placeholder.com/80/4285f4/white?text=JD'
        ];
    } else {
        // Real Google token verification
        $userData = verifyGoogleToken($token, $google_client_id);
        if (!$userData) {
            http_response_code(401);
            echo json_encode(['error' => 'Invalid Google token']);
            return;
        }
    }
    
    $user = createOrUpdateUser($userData, 'google');
    createSession($user);
    
    echo json_encode(['success' => true, 'user' => $user]);
}

function handleFacebookLogin() {
    $accessToken = $_POST['access_token'] ?? '';
    
    if (empty($accessToken)) {
        http_response_code(400);
        echo json_encode(['error' => 'Access token required']);
        return;
    }
    
    // Verify Facebook token
    $facebook_app_id = 'YOUR_FACEBOOK_APP_ID';
    $facebook_app_secret = 'YOUR_FACEBOOK_APP_SECRET';
    
    // For demo purposes, simulate token verification
    if ($facebook_app_id === 'YOUR_FACEBOOK_APP_ID') {
        // Mock Facebook user data
        $userData = [
            'id' => 'facebook_987654321',
            'name' => 'Jane Smith',
            'email' => 'jane.smith@facebook.com',
            'picture' => ['data' => ['url' => 'https://via.placeholder.com/80/1877f2/white?text=JS']]
        ];
    } else {
        // Real Facebook token verification
        $userData = verifyFacebookToken($accessToken, $facebook_app_id, $facebook_app_secret);
        if (!$userData) {
            http_response_code(401);
            echo json_encode(['error' => 'Invalid Facebook token']);
            return;
        }
    }
    
    $user = createOrUpdateUser($userData, 'facebook');
    createSession($user);
    
    echo json_encode(['success' => true, 'user' => $user]);
}

function verifyGoogleToken($token, $client_id) {
    // This would use Google Client Library to verify token
    // require_once 'vendor/autoload.php';
    // $client = new Google_Client(['client_id' => $client_id]);
    // $payload = $client->verifyIdToken($token);
    // return $payload ? $payload : false;
    
    return false; // Placeholder for real implementation
}

function verifyFacebookToken($accessToken, $app_id, $app_secret) {
    $url = "https://graph.facebook.com/me?fields=id,name,email,picture&access_token=$accessToken";
    $response = file_get_contents($url);
    
    if ($response === false) {
        return false;
    }
    
    $userData = json_decode($response, true);
    
    // Verify token belongs to our app
    $tokenUrl = "https://graph.facebook.com/app?access_token=$accessToken";
    $tokenResponse = file_get_contents($tokenUrl);
    $tokenData = json_decode($tokenResponse, true);
    
    if ($tokenData['id'] !== $app_id) {
        return false;
    }
    
    return $userData;
}

function createOrUpdateUser($userData, $provider) {
    global $pdo;
    
    $email = $userData['email'];
    $name = $userData['name'];
    $providerId = $userData['id'];
    $avatarUrl = $provider === 'google' ? $userData['picture'] : $userData['picture']['data']['url'];
    
    // Check if user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR (provider = ? AND provider_id = ?)");
    $stmt->execute([$email, $provider, $providerId]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($existingUser) {
        // Update existing user
        $stmt = $pdo->prepare("UPDATE users SET name = ?, avatar_url = ?, last_login = NOW() WHERE id = ?");
        $stmt->execute([$name, $avatarUrl, $existingUser['id']]);
        
        $existingUser['name'] = $name;
        $existingUser['avatar_url'] = $avatarUrl;
        return $existingUser;
    } else {
        // Create new user
        $stmt = $pdo->prepare("INSERT INTO users (name, email, provider, provider_id, avatar_url) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $provider, $providerId, $avatarUrl]);
        
        return [
            'id' => $pdo->lastInsertId(),
            'name' => $name,
            'email' => $email,
            'provider' => $provider,
            'provider_id' => $providerId,
            'avatar_url' => $avatarUrl
        ];
    }
}

function createSession($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_provider'] = $user['provider'];
    $_SESSION['user_avatar'] = $user['avatar_url'];
}

function handleLogout() {
    session_destroy();
    echo json_encode(['success' => true, 'message' => 'Logged out successfully']);
}

function getCurrentUser() {
    if (isset($_SESSION['user_id'])) {
        echo json_encode([
            'logged_in' => true,
            'user' => [
                'id' => $_SESSION['user_id'],
                'name' => $_SESSION['user_name'],
                'email' => $_SESSION['user_email'],
                'provider' => $_SESSION['user_provider'],
                'avatar_url' => $_SESSION['user_avatar']
            ]
        ]);
    } else {
        echo json_encode(['logged_in' => false]);
    }
}
?>