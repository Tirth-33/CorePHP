<?php
session_start();

// Simulate login (in real life, you'd check username/password)
$_SESSION['logged_in'] = true;

// Redirect to protected page
header("Location: 50. Module-1_Ex-52_Page-Redirect-Protected.php");
exit();