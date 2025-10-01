<?php
function displayUser($user) {
    echo "<h2>User Profile</h2>";
    echo "<p><strong>Name:</strong> {$user['name']}</p>";
    echo "<p><strong>Email:</strong> {$user['email']}</p>";
    echo "<p><strong>Role:</strong> {$user['role']}</p>";
}