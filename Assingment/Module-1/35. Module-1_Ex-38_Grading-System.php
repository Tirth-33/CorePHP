<!DOCTYPE html>
<html>
<head>
    <title>Student Grading System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f0fe;
            padding: 20px;
        }
        .grade-box {
            background-color: #ffffff;
            padding: 20px;
            margin: auto;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            font-size: 16px;
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

<div class="grade-box">
    <h2>Enter Marks to Check Grade</h2>
    <form method="post">
        <label for="marks">Marks (0–100):</label>
        <input type="number" name="marks" id="marks" min="0" max="100" required>
        <input type="submit" value="Get Grade">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $marks = $_POST['marks'];

        echo "<div class='result'>";
        if ($marks >= 90) {
            echo "Grade: A";
        } elseif ($marks >= 70) {
            echo "Grade: B";
        } elseif ($marks >= 50) {
            echo "Grade: C";
        } elseif ($marks >= 35) {
            echo "Grade: D";
        } elseif ($marks < 35) {
            echo "Grade: Fail";
        } else {
            echo "Invalid input.";
        }
        echo "</div>";
    }
    ?>
</div>

</body>
</html>