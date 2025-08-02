<!-- calculator.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Smart Calculator</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f7;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 50px;
    }
    form {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 300px;
    }
    input, select, button {
      width: 100%;
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    button {
      background: #007BFF;
      color: white;
      border: none;
      font-weight: bold;
    }
    h2 {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <form method="post" action="">
    <input type="number" name="num1" placeholder="First number" required>
    <input type="number" name="num2" placeholder="Second number" required>

    <select name="operation" required>
      <option value="add">Addition (+)</option>
      <option value="subtract">Subtraction (-)</option>
      <option value="multiply">Multiplication (×)</option>
      <option value="divide">Division (÷)</option>
      <option value="modulus">Modulus (%)</option>
      <option value="power">Exponentiation (^)</option>
    </select>

    <button type="submit">Calculate</button>
  </form>
</body>
</html>

<?php
// calculator.php

function add($a, $b) {
  return $a + $b;
}
function subtract($a, $b) {
  return $a - $b;
}
function multiply($a, $b) {
  return $a * $b;
}
function divide($a, $b) {
  return $b == 0 ? "Cannot divide by zero!" : $a / $b;
}
function modulus($a, $b) {
  return $b == 0 ? "Cannot divide by zero!" : $a % $b;
}
function power($a, $b) {
  return pow($a, $b);
}

// Handle form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $num1 = $_POST["num1"];
  $num2 = $_POST["num2"];
  $op = $_POST["operation"];

  switch ($op) {
    case "add": $result = add($num1, $num2); break;
    case "subtract": $result = subtract($num1, $num2); break;
    case "multiply": $result = multiply($num1, $num2); break;
    case "divide": $result = divide($num1, $num2); break;
    case "modulus": $result = modulus($num1, $num2); break;
    case "power": $result = power($num1, $num2); break;
    default: $result = "Invalid operation.";
  }

  echo "<h2 style='text-align:center;'>Result: $result</h2>";
}
?>