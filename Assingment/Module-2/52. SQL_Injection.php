<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '51. MySQL_DB.php';

$db = new Database();
$users = $db->fetchAll("SELECT * FROM users1");

// Display all users in a table
echo "<h3>All Users</h3>";
if ($users) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>{$user['id']}</td>";
        echo "<td>{$user['name']}</td>";
        echo "<td>{$user['email']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found.<br>";
}

// Search for user by email if parameter is set
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo "<h3>Search Result</h3>";
    echo "Searching for email: <b>" . htmlspecialchars($email) . "</b><br>";
    $sql = "SELECT * FROM users1 WHERE email = ?";
    $result = $db->query($sql, [$email])->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "Welcome, <b>" . htmlspecialchars($result[0]['name']) . "</b>";
    } else {
        echo "User not found.";
    }
}

// Simple search form
?>
<br><br>
<form method="get">
    <label for="email">Search user by email:</label>
    <input type="text" name="email" id="email" required>
    <button type="submit">Search</button>
</form>