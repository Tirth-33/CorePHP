<?php
session_start();
session_destroy();

// Redirect to login page
header("Location: 49. Module-1_Ex-52_Page-Redirect-Login.php");
exit();