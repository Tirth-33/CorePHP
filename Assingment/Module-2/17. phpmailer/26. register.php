<?php
require '26.1 sendmail.php'; // Make sure the path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Basic validation (you can expand this)
    if (!empty($email) && !empty($username) && !empty($password)) {
        // Save user to database here (optional)

        // Send confirmation email
        if (sendConfirmationEmail($email, $username)) {
            echo "<p style='color:green;'>Registration successful! Confirmation email sent.</p>";
        } else {
            echo "<p style='color:red;'>Registration successful, but email could not be sent.</p>";
        }
    } else {
        echo "<p style='color:red;'>Please fill in all fields.</p>";
    }
}
?>

<form method="post" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Register">
</form>