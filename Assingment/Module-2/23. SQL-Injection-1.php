<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="22. SQL-Injection.php">
  <input type="text" name="FirstName" placeholder="Enter your name">
  <input type="password" name="Password" placeholder="Enter your password">
  <input type="submit" value="Login">
</form>
</body>
</html>

<?php

if (isset($_POST['FirstName']) && isset($_POST['Password'])) {
    $firstName = $_POST['FirstName'];
    $password = $_POST['Password'];
    // Proceed with query
} else {
    echo "Please fill in all required fields.";
}

$firstName = $_POST['FirstName'] ?? '';
$password = $_POST['Password'] ?? '';

if ($firstName && $password) {
    $stmt = $connection->prepare("SELECT * FROM users WHERE FirstName = ? AND Password = ?");
    $stmt->bind_param("ss", $firstName, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    // Handle result
} else {
    echo "Missing input.";
}
