<!-- Inline PHP Code -->
<!DOCTYPE html>
<html>
<head>
    <title>PHP in HTML</title>
</head>
<body>

    <h1>Welcome!</h1>
    <p>
        <?php
            echo "Today is ". date ("l, F jS Y");
        ?>
    </p>
</body>
</html>

<!-- PHP Blocks -->
<?php
    $name = "Sagar";
    $greeting = "Hello, $name!";
?>
<html>
<body>
    <h2><?php echo $greeting ?></h2>
</body>
</html>

<!-- PHP-Only Sections -->
<?php
    echo "<html>";
    echo "<body>";
    echo "<h1>Hello World</h1>";
    echo "</body>";
    echo "</html>";
?>

