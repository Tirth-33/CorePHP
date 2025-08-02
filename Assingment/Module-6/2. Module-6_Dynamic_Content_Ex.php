<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Content</title>
</head>
<body>
    <?php
        $hour = date("H");

        if ($hour < 12) 
        {
            echo "Good Morning!";
        } elseif ($hour < 18) 
        {
            echo "Good Afternoon!";
        } else 
        {
            echo "Good Evening!";
        }
    ?>
</body>
</html>