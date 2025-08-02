<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reverse Number Sequence</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .sequence-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        .output {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
        }
    </style>
</head>
<body>

<div class="sequence-box">
    <h2>Reverse Number Sequence</h2>
    <div class="output">
        <?php
        $num = 10;
        do {
            echo "$num<br>";
            $num--;
        } while ($num >= 1);
        ?>
    </div>
</div>

</body>
</html>