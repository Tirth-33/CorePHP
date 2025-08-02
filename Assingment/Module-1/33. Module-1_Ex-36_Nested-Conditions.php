<!DOCTYPE html>
<html>
<head>
    <title>Number Analyzer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            width: 300px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .result {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check Your Number</h2>
        <form method="post">
            <label for="number">Enter a number:</label>
            <input type="number" name="number" id="number" required>
            <input type="submit" value="Analyze">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $number = $_POST['number'];

            echo "<div class='result'>";
            if ($number > 0) {
                echo "$number is positive.<br>";
            } elseif ($number < 0) {
                echo "$number is negative.<br>";
            } else {
                echo "The number is zero.<br>";
            }

            if ($number % 2 == 0) {
                echo "It is even.";
            } else {
                echo "It is odd.";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>