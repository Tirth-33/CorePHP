<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: 49. Module-1_Ex-52_Page-Redirect-Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Protected Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f8;
      padding: 40px;
    }
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h1 {
      color: #0078D7;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>✅ Access Granted</h1>
    <p>Welcome! You are logged in and can view this protected content.</p>
  </div>
</body>
</html>