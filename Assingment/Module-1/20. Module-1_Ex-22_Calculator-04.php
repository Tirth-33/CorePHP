<!-- calculator.html -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Numeric Calculator</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      padding-top: 50px;
    }
    .calculator {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 240px;
    }
    input[type="text"] {
      width: 100%;
      height: 40px;
      font-size: 20px;
      text-align: right;
      margin-bottom: 10px;
      padding: 5px;
    }
    .buttons {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 10px;
    }
    button {
      padding: 15px;
      font-size: 18px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <form class="calculator" method="post" action="">
    <input type="text" name="expression" id="expression" readonly>
    <div class="buttons">
      <button type="button" onclick="append('7')">7</button>
      <button type="button" onclick="append('8')">8</button>
      <button type="button" onclick="append('9')">9</button>
      <button type="button" onclick="append('/')">÷</button>

      <button type="button" onclick="append('4')">4</button>
      <button type="button" onclick="append('5')">5</button>
      <button type="button" onclick="append('6')">6</button>
      <button type="button" onclick="append('*')">×</button>

      <button type="button" onclick="append('1')">1</button>
      <button type="button" onclick="append('2')">2</button>
      <button type="button" onclick="append('3')">3</button>
      <button type="button" onclick="append('-')">−</button>

      <button type="button" onclick="append('0')">0</button>
      <button type="button" onclick="append('.')">.</button>
      <button type="submit">=</button>
      <button type="button" onclick="append('+')">+</button>
    </div>
    <button type="button" onclick="clearCalc()" style="margin-top:10px;">Clear</button>
  </form>

  <script>
    function append(val) {
      document.getElementById('expression').value += val;
    }
    function clearCalc() {
      document.getElementById('expression').value = '';
    }
  </script>
</body>
</html>


<?php
// calculator.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $expression = $_POST["expression"];

  // Basic validation: remove unwanted characters
  $expression = preg_replace("#[^0-9+\-*/.()]#", "", $expression);

  try {
    // Evaluate expression using eval (note: eval should be used carefully)
    $result = eval("return $expression;");
    echo "<h2 style='text-align:center;'>Result: $result</h2>";
  } catch (Throwable $e) {
    echo "<h2 style='text-align:center; color:red;'>Error in expression</h2>";
  }
}
?>