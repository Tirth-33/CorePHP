<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Month Display</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .month-box {
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
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
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
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<div class="month-box">
    <h2>Month Finder</h2>
    <form method="post">
        <input type="number" name="month" min="1" max="12" placeholder="Enter month number (1-12)" required>
        <input type="submit" name="submit" value="Show Month">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $month = $_POST['month'];
        $monthName = "";

        switch ($month) {
            case 1: $monthName = "January"; break;
            case 2: $monthName = "February"; break;
            case 3: $monthName = "March"; break;
            case 4: $monthName = "April"; break;
            case 5: $monthName = "May"; break;
            case 6: $monthName = "June"; break;
            case 7: $monthName = "July"; break;
            case 8: $monthName = "August"; break;
            case 9: $monthName = "September"; break;
            case 10: $monthName = "October"; break;
            case 11: $monthName = "November"; break;
            case 12: $monthName = "December"; break;
            default: $monthName = "Invalid month number";
        }

        echo "<div class='result'>Month: <strong>$monthName</strong></div>";
    }
    ?>
</div>

</body>
</html>