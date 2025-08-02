<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FizzBuzz Program</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .fizzbuzz-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 400px;
            max-height: 500px;
            overflow-y: auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .output {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
    </style>
</head>
<body>

<div class="fizzbuzz-box">
    <h2>FizzBuzz Output</h2>
    <div class="output">
        <?php
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                echo "FizzBuzz<br>";
            } elseif ($i % 3 == 0) {
                echo "Fizz<br>";
            } elseif ($i % 5 == 0) {
                echo "Buzz<br>";
            } else {
                echo "$i<br>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>