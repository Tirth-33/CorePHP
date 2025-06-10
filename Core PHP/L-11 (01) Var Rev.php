<?php
    $num=15;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>
<?php 
    $name = "Hardi";
?>
<body>
    <h2>Variables in PHP</h2>
    <h3>
        <?php
        $num = 45;
        echo $num;
        ?>
    </h3>

    <input type = "text" value = "<?php echo $name?>">

    <a href = "<?php echo $name?>"> Link </a>

    <?php
    $bool = true;
    $res = (!$bool) ? "Noes" : "Yaes"; // ! using for not
    echo $res . "<br><hr>";

    // Lec-12 Reference Variable Revision

    $b = "Jay";
    $Jay = 35;
    $$b = 135;
    //$$a = 260;

    //echo $a. " " .$$b. "<br>";
    
    echo $b. " " .$Jay. " " .$$b. "<br>";
    ?>
</body>
</html>