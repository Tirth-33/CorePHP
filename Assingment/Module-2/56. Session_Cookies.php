<?php
session_start();

// --- Simple user store (demo only) ---
// Changed: use password_hash so password_verify() works
$users = [
    'Jaldhi' => password_hash('password', PASSWORD_DEFAULT),
    'Ketan' => password_hash('ketan12345', PASSWORD_DEFAULT)
];

// tokens persistence file (for "remember me" tokens)
$tokensFile = __DIR__ . '/remember_tokens.json';
$tokenTTL = 30 * 24 * 3600; // 30 days

function load_tokens($file) {
    if (!is_file($file)) {
        return [];
    }
    $data = file_get_contents($file);
    $arr = json_decode($data, true);
    return is_array($arr) ? $arr : [];
}

function save_tokens($file, $tokens) {
    file_put_contents($file, json_encode($tokens, JSON_PRETTY_PRINT), LOCK_EX);
}

function is_https() {
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || ($_SERVER['SERVER_PORT'] ?? '') == 443;
}

// cookie name
$cookieName = 'remember_token';

// Auto-login using remember token if session not present
if (!isset($_SESSION['username']) && !empty($_COOKIE[$cookieName])) {
    $tokens = load_tokens($tokensFile);
    $token = $_COOKIE[$cookieName];
    if (!empty($tokens[$token]) && isset($tokens[$token]['username'], $tokens[$token]['expires'])) {
        if ($tokens[$token]['expires'] >= time()) {
            // valid token -> restore session
            session_regenerate_id(true);
            $_SESSION['username'] = $tokens[$token]['username'];
            $_SESSION['logged_at'] = time();

            // rotate token for improved security
            unset($tokens[$token]);
            $newToken = bin2hex(random_bytes(32));
            $tokens[$newToken] = [
                'username' => $_SESSION['username'],
                'expires' => time() + $tokenTTL
            ];
            save_tokens($tokensFile, $tokens);

            setcookie(
                $cookieName,
                $newToken,
                [
                    'expires' => time() + $tokenTTL,
                    'path' => '/',
                    'secure' => is_https(),
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]
            );
        } else {
            // expired token -> remove
            unset($tokens[$token]);
            save_tokens($tokensFile, $tokens);
            setcookie($cookieName, '', ['expires' => time() - 3600, 'path' => '/', 'httponly' => true, 'secure' => is_https(), 'samesite' => 'Lax']);
        }
    } else {
        // unknown token -> clear cookie
        setcookie($cookieName, '', ['expires' => time() - 3600, 'path' => '/', 'httponly' => true, 'secure' => is_https(), 'samesite' => 'Lax']);
    }
}

// Simple router for actions
$action = $_POST['action'] ?? $_GET['action'] ?? null;

if ($action === 'login') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    $error = null;

    if ($username === '' || $password === '') {
        $error = 'Username and password are required.';
    } elseif (!isset($users[$username]) || !password_verify($password, $users[$username])) {
        $error = 'Invalid username or password.';
    }

    if ($error === null) {
        // Successful login
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        $_SESSION['logged_at'] = time();

        if ($remember) {
            $tokens = load_tokens($tokensFile);
            $token = bin2hex(random_bytes(32));
            $tokens[$token] = [
                'username' => $username,
                'expires' => time() + $tokenTTL
            ];
            save_tokens($tokensFile, $tokens);

            setcookie(
                $cookieName,
                $token,
                [
                    'expires' => time() + $tokenTTL,
                    'path' => '/',
                    'secure' => is_https(),
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]
            );
        } else {
            // ensure no stale cookie
            setcookie($cookieName, '', ['expires' => time() - 3600, 'path' => '/', 'httponly' => true, 'secure' => is_https(), 'samesite' => 'Lax']);
        }

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

if ($action === 'logout') {
    // Remove remember token if any
    if (!empty($_COOKIE[$cookieName])) {
        $tokens = load_tokens($tokensFile);
        $token = $_COOKIE[$cookieName];
        if (isset($tokens[$token])) {
            unset($tokens[$token]);
            save_tokens($tokensFile, $tokens);
        }
        setcookie($cookieName, '', ['expires' => time() - 3600, 'path' => '/', 'httponly' => true, 'secure' => is_https(), 'samesite' => 'Lax']);
    }

    // Unset all session variables
    $_SESSION = [];

    // Destroy session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Helper values for display
$sessionUser = $_SESSION['username'] ?? null;
$cookieToken = $_COOKIE[$cookieName] ?? null;
$cookieUser = null;
if ($cookieToken) {
    $tokens = load_tokens($tokensFile);
    $cookieUser = $tokens[$cookieToken]['username'] ?? null;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sessions & Cookies Demo</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 20px; }
        form { margin: 10px 0; }
        label { display:block; margin:6px 0; }
        .error { color: #c00; }
    </style>
</head>
<body>
    <h2>Sessions & Cookies Demo</h2>

    <p>Session user: <strong><?php echo htmlspecialchars($sessionUser ?? '— not logged in —'); ?></strong></p>
    <p>Remember cookie user: <strong><?php echo htmlspecialchars($cookieUser ?? '— none —'); ?></strong></p>

    <?php if (!empty($error)): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if ($sessionUser): ?>
        <form method="post">
            <input type="hidden" name="action" value="logout">
            <button type="submit">Logout</button>
        </form>
    <?php else: ?>
        <form method="post" autocomplete="off">
            <label>
                Username:
                <input type="text" name="username" required>
            </label>
            <label>
                Password:
                <input type="password" name="password" required>
            </label>
            <label>
                <input type="checkbox" name="remember"> Remember me (keep me logged in)
            </label>
            <input type="hidden" name="action" value="login">
            <button type="submit">Login</button>
        </form>

        <h4>Demo accounts</h4>
        <ul>
            <li>Jaldhi / password</li>
            <li>Ketan / ketan12345</li>
        </ul>
    <?php endif; ?>

    <hr>
    <h4>Notes</h4>
    <ul>
        <li>Remember-me uses a server-side token file: <code>remember_tokens.json</code> (created next to this script).</li>
        <li>Cookies are HttpOnly and use Secure when the page is served over HTTPS.</li>
        <li>Tokens are rotated on auto-login for better security.</li>
        <li>This example is for learning. For production use a proper database, stronger token management, and additional protections.</li>
    </ul>
</body>
</html>