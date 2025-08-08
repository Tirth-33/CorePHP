<!DOCTYPE html>
<html>
<head>
    <title>Factorial Performance Comparison</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="number"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            background: #e9ecef;
            padding: 15px;
            border-radius: 4px;
        }
        .result p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Factorial Calculator & Performance Comparison</h2>
        <form method="post">
            <label for="number">Enter a number:</label>
            <input type="number" name="number" id="number" min="0" required>
            <input type="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = intval($_POST["number"]);

            // Recursive factorial
            function factorial_recursive($n) {
                if ($n <= 1) return 1;
                return $n * factorial_recursive($n - 1);
            }

            // Iterative factorial
            function factorial_iterative($n) {
                $result = 1;
                for ($i = 2; $i <= $n; $i++) {
                    $result *= $i;
                }
                return $result;
            }

            // Measure recursive time
            $start_recursive = microtime(true);
            $fact_recursive = factorial_recursive($n);
            $end_recursive = microtime(true);
            $time_recursive = $end_recursive - $start_recursive;

            // Measure iterative time
            $start_iterative = microtime(true);
            $fact_iterative = factorial_iterative($n);
            $end_iterative = microtime(true);
            $time_iterative = $end_iterative - $start_iterative;

            echo "<div class='result'>";
            echo "<p><strong>Number:</strong> $n</p>";
            echo "<p><strong>Recursive Result:</strong> $fact_recursive</p>";
            echo "<p><strong>Iterative Result:</strong> $fact_iterative</p>";
            echo "<p><strong>Recursive Time:</strong> " . number_format($time_recursive, 6) . " seconds</p>";
            echo "<p><strong>Iterative Time:</strong> " . number_format($time_iterative, 6) . " seconds</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>