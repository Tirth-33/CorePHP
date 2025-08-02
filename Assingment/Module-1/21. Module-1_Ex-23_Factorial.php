<!-- factorial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Factorial Calculator</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    input[type="number"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      background-color: #007BFF;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    h2 {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Factorial Calculator</h1>
    <form method="post" action="">
      <input type="number" name="number" min="0" placeholder="Enter a number" required>
      <button type="submit">Calculate</button>
    </form>
  </div>
</body>
</html>

<?php
// factorial.php

function factorial($n) {
  if ($n <= 1) {
    return 1;
  }
  return $n * factorial($n - 1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $num = $_POST["number"];

  // Validate input
  if (is_numeric($num) && $num >= 0) {
    $result = factorial($num);
    echo "<h2 style='text-align:center;'>Factorial of $num is: $result</h2>";
  } else {
    echo "<h2 style='text-align:center; color:red;'>Please enter a valid non-negative number.</h2>";
  }
}
?>