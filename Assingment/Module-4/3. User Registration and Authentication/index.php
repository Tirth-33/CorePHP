<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Database connection
$host = 'localhost';
$dbname = 'user_auth_system';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Create users table if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email_verified_at TIMESTAMP NULL,
    verification_token VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Add verification_token column if it doesn't exist
$pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS verification_token VARCHAR(255) NULL");

$page = $_GET['page'] ?? 'home';

function sendVerificationEmail($email, $token) {
    // Simulated email - in production, configure SMTP
    $link = "http://localhost/Revision/Assingment/Module-4/3.%20User%20Registration%20and%20Authentication/index.php?page=verify&token=$token";
    $_SESSION['verification_link'] = $link;
    return true;
}

// Handle form submissions
if ($_POST) {
    if ($page === 'register') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(32));
        
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, verification_token) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $email, $password, $token]);
            sendVerificationEmail($email, $token);
            $success = "Registration successful! <a href='" . $_SESSION['verification_link'] . "'>Click here to verify your email</a> (simulated email).";
        } catch(PDOException $e) {
            $error = "Registration failed: " . $e->getMessage();
        }
    }
    
    if ($page === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            if ($user['email_verified_at']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $page = 'dashboard';
            } else {
                // Show verification link again for unverified users
                $stmt = $pdo->prepare("SELECT verification_token FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $tokenData = $stmt->fetch();
                if ($tokenData && $tokenData['verification_token']) {
                    $link = "http://localhost/Revision/Assingment/Module-4/3.%20User%20Registration%20and%20Authentication/index.php?page=verify&token=" . $tokenData['verification_token'];
                    $error = "Please verify your email first. <a href='$link'>Click here to verify</a>";
                } else {
                    $error = "Please verify your email first.";
                }
            }
        } else {
            $error = "Invalid email or password.";
        }
    }
}

// Handle email verification
if ($page === 'verify' && isset($_GET['token'])) {
    $token = $_GET['token'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE verification_token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();
    
    if ($user) {
        $stmt = $pdo->prepare("UPDATE users SET email_verified_at = NOW(), verification_token = NULL WHERE id = ?");
        $stmt->execute([$user['id']]);
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $page = 'dashboard';
        $success = "Email verified successfully! Welcome to your dashboard.";
    } else {
        $error = "Invalid or expired verification token.";
        $page = 'login';
    }
}

// Handle logout
if ($page === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Check authentication for dashboard
if ($page === 'dashboard' && !isset($_SESSION['user_id'])) {
    $page = 'login';
    $error = 'Please login first.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Auth System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f5f5f5; }
        .container { max-width: 400px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background: #0056b3; }
        .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .nav { text-align: center; margin-top: 15px; }
        .nav a { color: #007bff; text-decoration: none; margin: 0 10px; }
        .dashboard { max-width: 600px; }
        .user-info { background: #e9ecef; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
    </style>
</head>
<body>

<?php if ($page === 'home'): ?>
    <div class="container">
        <h1>Welcome to User Auth System</h1>
        <p>A simple user registration and authentication system with email verification.</p>
        <div class="nav">
            <?php if (isset($_SESSION['user_id'])): ?>
                <p>Hello, <?= $_SESSION['username'] ?>!</p>
                <a href="?page=dashboard">Dashboard</a>
                <a href="?page=logout">Logout</a>
            <?php else: ?>
                <a href="?page=login">Login</a>
                <a href="?page=register">Register</a>
            <?php endif; ?>
        </div>
    </div>

<?php elseif ($page === 'register'): ?>
    <div class="container">
        <h2>Register</h2>
        <?php if (isset($error)): ?><div class="error"><?= $error ?></div><?php endif; ?>
        <?php if (isset($success)): ?><div class="success"><?= $success ?></div><?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="nav">
            <a href="?page=login">Already have an account? Login</a>
        </div>
    </div>

<?php elseif ($page === 'login'): ?>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)): ?><div class="error"><?= $error ?></div><?php endif; ?>
        <?php if (isset($success)): ?><div class="success"><?= $success ?></div><?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="nav">
            <a href="?page=register">Don't have an account? Register</a>
        </div>
    </div>

<?php elseif ($page === 'dashboard'): ?>
    <?php
    if (!isset($_SESSION['user_id'])) {
        echo "<div class='container'><div class='error'>Session error. Please login again.</div><a href='?page=login'>Login</a></div>";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();
        if (!$user) {
            echo "<div class='container'><div class='error'>User not found.</div><a href='?page=login'>Login</a></div>";
        } else {
    ?>
    <div class="container dashboard">
        <h1>Dashboard</h1>
        <div class="user-info">
            <h3>User Information</h3>
            <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Email Verified:</strong> <?= $user['email_verified_at'] ? 'Yes' : 'No' ?></p>
            <p><strong>Member Since:</strong> <?= date('F j, Y', strtotime($user['created_at'])) ?></p>
        </div>
        <div class="nav">
            <a href="?page=home">Home</a>
            <a href="?page=logout">Logout</a>
        </div>
    </div>
    <?php
        }
    }
    ?>


<?php endif; ?>

</body>
</html>