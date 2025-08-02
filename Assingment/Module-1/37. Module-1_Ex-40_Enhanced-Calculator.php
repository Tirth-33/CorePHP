<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enhanced Calculator</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .calculator {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        .result {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Enhanced Calculator</h2>
    <form method="post">
        <input type="number" name="num1" step="any" placeholder="Enter first number" required>
        <input type="number" name="num2" step="any" placeholder="Enter second number (if needed)">
        <select name="operation">
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
            <option value="%">Modulus (%)</option>
            <option value="^">Exponentiation (^)</option>
            <option value="√">Square Root (√)</option>
        </select>
        <input type="submit" name="calculate" value="Calculate">
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $op = $_POST['operation'];
        $result = "";

        if ($op == '+') {
            $result = $num1 + $num2;
        } elseif ($op == '-') {
            $result = $num1 - $num2;
        } elseif ($op == '*') {
            $result = $num1 * $num2;
        } elseif ($op == '/') {
            $result = $num2 != 0 ? $num1 / $num2 : "Error: Division by zero";
        } elseif ($op == '%') {
            $result = $num2 != 0 ? $num1 % $num2 : "Error: Division by zero";
        } elseif ($op == '^') {
            $result = pow($num1, $num2);
        } elseif ($op == '√') {
            $result = $num1 >= 0 ? sqrt($num1) : "Error: Negative input for square root";
        } else {
            $result = "Invalid operation";
        }

        echo "<div class='result'>Result: $result</div>";
    }
    ?>
</div>

</body>
</html>