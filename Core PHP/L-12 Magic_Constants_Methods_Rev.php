<?php

echo __LINE__ . "<br><hr>";

echo __FILE__ . "<br><hr>";

echo __DIR__ . "<br><hr>";

$p=1;

if (isset($_REQUEST['sub']))
{
    echo isset($_REQUEST['sub'])."2328"."<br>";
    echo $_REQUEST['nm'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lec-12 Magic_Constants_Methods_Rev</title>
</head>
<body>
    <form>
        <input type = "text" name = "nm" value = "Gaurav@301090">
        <input type = "submit" name = "sub">
    </form>
</body>
</html>