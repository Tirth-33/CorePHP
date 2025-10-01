<?php
$host = 'localhost';
$db   = 'example_app';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // 🔌 Attempt to connect to the database
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connection successful!<br>";

    // 🧾 Attempt to execute a query
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);

    // 📋 Fetch and display results
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "User: " . $row['username'] . "<br>";
    }

} catch (PDOException $e) {
    // ❌ Handle any errors
    echo "❗Database error: " . $e->getMessage();
}
?>