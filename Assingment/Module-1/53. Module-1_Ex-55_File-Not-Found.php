<?php
$criticalFile = 'config.php'; // Change to your critical file
error_log("Missing critical file: $criticalFile", 0);

if (file_exists($criticalFile)) {
    require $criticalFile;
} else {
    // Custom error message
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
      <meta charset='UTF-8'>
      <title>Error</title>
      <style>
        body {
          font-family: Arial, sans-serif;
          background: #fff3f3;
          color: #a94442;
          padding: 40px;
        }
        .error-box {
          border: 1px solid #ebccd1;
          background: #f2dede;
          padding: 20px;
          border-radius: 8px;
          max-width: 600px;
          margin: auto;
        }
        h1 {
          color: #a94442;
        }
      </style>
    </head>
    <body>
      <div class='error-box'>
        <h1>⚠️ Critical Error</h1>
        <p>The required file <strong>$criticalFile</strong> was not found.</p>
        <p>Please contact the administrator or check your configuration.</p>
      </div>
    </body>
    </html>";
    exit(); // Stop further execution
    
}
?>

