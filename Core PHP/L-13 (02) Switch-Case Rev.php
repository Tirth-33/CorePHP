<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Case Revision</title>
</head>
<body>
    <form method="post">
        Enter Choice: <input type="text" name="nm">
        <input type="submit">
    </form>
</body>
</html>

<?php

$a = $_POST['nm'];

Switch ($a)
{
    Case 1: echo "Case1" ;
    break;

    Case 2: echo "Case2";
    break;

    Case "Hi": echo "Case Hi";
    break;

    Case "+" : echo "Case +";
    break;

    default: echo "Error";
}
?>