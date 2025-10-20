<?php
// filepath: e:\xampp\htdocs\Revision\Assingment\Module-2\register.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '51. MySQL_DB.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validate input
        if (empty($_POST['name']) || empty($_POST['email'])) {
            throw new Exception("Name and Email are required.");
        }

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);

        // Check if user already exists
        $db = new Database();
        $existing = $db->query("SELECT * FROM users1 WHERE email = ?", [$email])->fetch();

        if ($existing) {
            throw new Exception("A user with this email already exists.");
        }

        // Insert new user
        $db->query("INSERT INTO users1 (name, email) VALUES (?, ?)", [$name, $email]);
        $message = "<span style='color:green;'>Registration successful!</span>";
    } catch (Exception $e) {
        $message = "<span style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</span>";
    }
}
?>

<h3>User Registration</h3>
<?php echo $message; ?>
<form method="post">
    <label>Name: <input type="text" name="name" required></label><br><br>
    <label>Email: <input type="email" name="email" required></label><br><br>
    <button type="submit">Register</button>
</form>