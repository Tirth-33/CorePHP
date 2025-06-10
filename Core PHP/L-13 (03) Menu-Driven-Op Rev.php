<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Driven Operator</title>
    

</head>
<body>
    <form method="post">
    
        Enter Number-1 <input type = "text" name = "num1"><br><br>
        Enter Number-2 <input type = "text" name = "num2"><br><br>
        Enter Choice  <input type = "text" name = "choice"><br><br>
        <input type="submit">
    
    </form>

    <?php

    $choice = $_POST['choice'];
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
 
    switch($choice)
    {
        case "+" : echo  $num1+$num2. "<br>";
        break;

        case "-" : echo  $num1-$num2. "<br>";
        break;

        case "*" : echo  $num1*$num2. "<br>";
        break;

        case "/" : echo  $num1/$num2. "<br>";
        break;

        case "%" : echo  $num1%$num2. "<br>";
        break;

        default: echo "Please Enter + - * / %";

        
    }
    ?>
</body>
</html>