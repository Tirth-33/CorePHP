<!DOCTYPE html>
<html>
<head>
    <title>Grade Evaluator</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #eef2f3;
            padding: 30px;
        }
        .form-box {
            background-color: #fff;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .message {
            font-weight: bold;
            color: #2e8b57;
        }
    </style>
</head>
<body>

    <div class="form-box">
        <h2>Enter Your Grade</h2>
        <form method="post">
            <input type="text" name="grade" placeholder="Enter grade (A, B, C, D, F)" required>
            <input type="submit" value="Evaluate">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $grade = strtoupper(trim($_POST["grade"]));

            echo "<div class='message'>";
            switch ($grade) {
                case 'A':
                case 'B':
                    echo "Grade: $grade — Excellent!";
                    break;
                case 'C':
                    echo "Grade: $grade — Good.";
                    break;
                case 'D':
                    echo "Grade: $grade — Needs Improvement.";
                    break;
                case 'F':
                    echo "Grade: $grade — Failed.";
                    break;
                default:
                    echo "Grade: $grade — Invalid grade entered.";
            }
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>