<?php
if ($user) {
    echo "<h2>User Profile</h2>";
    echo "<p>ID: {$user->id}</p>";
    echo "<p>Name: {$user->name}</p>";
    echo "<p>Email: {$user->email}</p>";
} else {
    echo "<p>User not found.</p>";
}