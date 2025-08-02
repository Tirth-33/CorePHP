<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Temperature Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .converter {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 300px;
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
            background: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        .result {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="converter">
    <h2>Temperature Converter</h2>
    <form method="post">
        <input type="number" name="temperature" step="any" placeholder="Enter temperature" required>
        <select name="unit">
            <option value="C">Celsius</option>
            <option value="F">Fahrenheit</option>
        </select>
        <input type="submit" name="convert" value="Convert">
    </form>

    <?php
    if (isset($_POST['convert'])) {
        $temp = $_POST['temperature'];
        $unit = $_POST['unit'];

        if ($unit == 'C') {
            $converted = ($temp * 9/5) + 32;
            echo "<div class='result'>{$temp}°C = " . round($converted, 2) . "°F</div>";
        } elseif ($unit == 'F') {
            $converted = ($temp - 32) * 5/9;
            echo "<div class='result'>{$temp}°F = " . round($converted, 2) . "°C</div>";
        } else {
            echo "<div class='result'>Invalid unit selected.</div>";
        }
    }
    ?>
</div>

</body>
</html>