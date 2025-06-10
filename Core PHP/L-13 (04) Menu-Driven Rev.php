<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Driver Operator Type-2</title>
</head>
<body>
    <form method = "post">
        Enter Number 1: <input type = "text" name = "name1"><br><br>
        Enter Number 2: <input type = "text" name = "name2"><br><br>

        <input type = "Submit" value = "+" name="plus">
        <input type = "Submit" value = "-" name ="minus">
        <input type = "Submit" value = "/" name ="divide">
        <input type = "Submit" value = "*" name = "sub">
        <input type = "Submit" value = "%" name ="module">
    </form>

    <?php

$num1 = $_POST["name1"];
$num2 = $_POST["name2"];

if(isset($_POST['plus'])) 
{
    echo $num1+$num2;
}
else if(isset($_POST['minus'])) 
{
    echo $num1-$num2;
}
else if(isset($_POST['divide'])) 
{
    echo $num1/$num2;
}
else if(isset($_POST['sub'])) 
{
    echo $num1*$num2;
}
else if(isset($_POST['module'])) 
{
    echo $num1%$num2;
}
else
{
    echo "Please Enter Number";
}

?>
</body>
</html>

