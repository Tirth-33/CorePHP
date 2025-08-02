<!-- calculator.html -->
<form method="post" action="">
  <input type="number" name="num1" placeholder="Enter first number" required>
  <input type="number" name="num2" placeholder="Enter second number" required>
  
  <select name="operation">
    <option value="add">Add</option>
    <option value="subtract">Subtract</option>
    <option value="multiply">Multiply</option>
    <option value="divide">Divide</option>
  </select>
  
  <button type="submit">Calculate</button>
</form>


<?php
// calculator.php

// User-defined functions
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
  if ($b == 0) {
    return "Cannot divide by zero.";
  }
  return $a / $b;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $num1 = $_POST["num1"];
  $num2 = $_POST["num2"];
  $operation = $_POST["operation"];
  
  switch ($operation) {
    case "add":
      $result = add($num1, $num2);
      break;
    case "subtract":
      $result = subtract($num1, $num2);
      break;
    case "multiply":
      $result = multiply($num1, $num2);
      break;
    case "divide":
      $result = divide($num1, $num2);
      break;
    default:
      $result = "Invalid operation.";
  }
  
  echo "<h2>Result: $result</h2>";
}
?>