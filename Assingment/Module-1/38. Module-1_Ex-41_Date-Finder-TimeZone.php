<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Date Finder with Time Zone</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        select {
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

<div class="container">
    <h2>Date Finder with Time Zone</h2>
    <form method="post">
        <select name="timezone" required>
            <option value="">-- Select Time Zone --</option>
            <option value="Asia/Kolkata">India (Asia/Kolkata)</option>
            <option value="America/New_York">USA (America/New_York)</option>
            <option value="Europe/London">UK (Europe/London)</option>
            <option value="Asia/Tokyo">Japan (Asia/Tokyo)</option>
            <option value="Australia/Sydney">Australia (Australia/Sydney)</option>
            <option value="Asia/Dubai">UAE (Asia/Dubai)</option>
            <option value="America/Sao_Paulo">Brazil (America/Sao_Paulo)</option>
        </select>
        <input type="submit" name="check" value="Check Day">
    </form>

    <?php
    if (isset($_POST['check'])) {
        $timezone = $_POST['timezone'];
        date_default_timezone_set($timezone);
        $day = date('l');
        echo "<div class='result'>Today in <strong>$timezone</strong> is: <strong>$day</strong><br>";
        if ($day === 'Sunday') {
            echo "🎉 Happy Sunday!</div>";
        } else {
            echo "Have a great $day!</div>";
        }
    }
    ?>
</div>

</body>
</html>