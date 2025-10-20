<?php
// filepath: e:\xampp\htdocs\Revision\Assingment\Module-2\54. Registration_Validation.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$errors = [];
$username = $email = $password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Username: 4-20 chars, letters, numbers, underscores only
    $username = trim($_POST['username']);
    if (!preg_match('/^[A-Za-z0-9_]{4,20}$/', $username)) {
        $errors[] = "Username must be 4-20 characters and contain only letters, numbers, or underscores.";
    }

    // Email: basic email pattern
    $email = trim($_POST['email']);
    if (!preg_match('/^[\w\.-]+@[\w\.-]+\.\w{2,}$/', $email)) {
        $errors[] = "Invalid email format.";
    }

    // Password: at least 6 chars, at least one letter and one number
    $password = $_POST['password'];
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*()_+]{6,}$/', $password)) {
        $errors[] = "Password must be at least 6 characters and include at least one letter and one number.";
    }

    if (empty($errors)) {
        echo "<span style='color:green;'>All inputs are valid!</span>";
        // Here you would proceed with registration (e.g., insert into DB)
    }
}
?>

<h3>Registration with Server-Side Validation</h3>
<?php
if (!empty($errors)) {
    echo "<ul style='color:red;'>";
    foreach ($errors as $err) {
        echo "<li>" . htmlspecialchars($err) . "</li>";
    }
    echo "</ul>";
}
?>
<form method="post">
    <label>Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required></label><br><br>
    <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Register</button>
</form>