<?php
date_default_timezone_set("Asia/Kolkata");

$days = $months = $hours = $minutes = $seconds = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $birthdate = $_POST["birthdate"];

    if (!empty($birthdate)) {
        $today = new DateTime();
        $birthMonthDay = date("m-d", strtotime($birthdate));
        $currentYear = (int)$today->format("Y");

        $birthdayThisYear = new DateTime("$currentYear-$birthMonthDay");

        // If birthday has passed this year, use next year
        if ($birthdayThisYear < $today) {
            $birthdayNext = new DateTime(($currentYear + 1) . "-$birthMonthDay");
        } else {
            $birthdayNext = $birthdayThisYear;
        }

        $interval = $today->diff($birthdayNext);

        $days = $interval->days;
        $months = $interval->m;
        $hours = $days * 24;
        $minutes = $hours * 60;
        $seconds = $minutes * 60;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Next Birthday Countdown</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        input[type="date"] { padding: 8px; font-size: 16px; }
        input[type="submit"] { padding: 8px 16px; font-size: 16px; margin-top: 10px; }
        .result { margin-top: 30px; font-size: 18px; }
    </style>
</head>
<body>

<h2>🎉 Time Until Your Next Birthday</h2>

<form method="post">
    <label for="birthdate">Enter your birth date:</label><br><br>
    <input type="date" name="birthdate" required><br><br>
    <input type="submit" value="Calculate">
</form>

<?php if ($days !== null): ?>
<div class="result">
    <p><strong>Days:</strong> <?= $days ?></p>
    <p><strong>Months:</strong> <?= $months ?></p>
    <p><strong>Hours:</strong> <?= $hours ?></p>
    <p><strong>Minutes:</strong> <?= $minutes ?></p>
    <p><strong>Seconds:</strong> <?= $seconds ?></p>
</div>
<?php endif; ?>

</body>
</html>