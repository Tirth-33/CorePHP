<?php
// filepath: e:\xampp\htdocs\Revision\Assingment\Module-2\fetch_users.php
require_once '51. MySQL_DB.php';

$db = new Database();
$users = $db->fetchAll("SELECT * FROM users1"); // Make sure your table is named 'users1'

if ($users) {
    echo "<h3>User List</h3>";
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
    echo "No users found.";
}