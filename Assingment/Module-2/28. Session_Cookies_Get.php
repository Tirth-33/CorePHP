<?php
// Resume the session
session_start();

// Retrieve session data
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    echo "Welcome, " . $_SESSION['username'] . "!<br>";
    echo "Your role is: " . $_SESSION['role'] . "<br>";
} else {
    echo "No session data found.<br>";
}

// Retrieve cookie data
if (isset($_COOKIE['user_theme'])) {
    echo "Your selected theme is: " . $_COOKIE['user_theme'];
} else {
    echo "No cookie found.";
}
?>