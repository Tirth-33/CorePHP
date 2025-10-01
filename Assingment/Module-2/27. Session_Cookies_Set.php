<?php
// Start the session
session_start();

// Store user data in session
$_SESSION['username'] = 'Tirth';
$_SESSION['role'] = 'Admin';

// Set a cookie (expires in 1 hour)
setcookie('user_theme', 'dark_mode', time() + 3600, '/');

echo "Session and cookie have been set.";
?>