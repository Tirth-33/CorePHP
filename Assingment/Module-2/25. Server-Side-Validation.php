<?php
// Initialize variables
$errors = [];
$email = $password = $username = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $username = trim($_POST["username"]);

    // Email validation
    if (!preg_match("/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/", $email)) {
        $errors[] = "Invalid email format.";
    }

    // Password validation (min 8 chars, at least one letter and one number)
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters long and include letters and numbers.";
    }

    // Optional: Username validation (alphanumeric, 3–15 chars)
    if (!preg_match("/^[a-zA-Z0-9]{3,15}$/", $username)) {
        $errors[] = "Username must be 3–15 characters and alphanumeric.";
    }

    // If no errors, proceed (e.g., save to DB)
    if (empty($errors)) {
        echo "<p style='color:green;'>Registration successful!</p>";
        // You can add database insertion code here
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<!-- HTML Form -->
<form method="post" action="">
    <label>Email:</label><br>
    <input type="text" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <input type="submit" value="Register">
</form>