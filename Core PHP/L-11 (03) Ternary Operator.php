<?php
    //$print = (1==1) ? "Salaam" : "Namaste";
    //$print = (1!=1) ? "Salaam" : "Namaste";
    $print = ((1!='1') || (1!=="1") && (1<=2) || (1<2)) ? "Karan" : "Arjun"; 
    // f || t && t || t
    // t && t || t
    // t || t
    // t : Answer
    echo $print . "<br><hr>";

    $a = 'd';
    $b = 'g';
    $c = 'a';

    $res = ($a<$b && $b>$c || $a>$c) ? "True" : "False";
    echo $res . "<br><hr>";

    $num1 = 130;
    $num2 = 150;
    $num3 = -45;

    $max = ($num1>$num2) ? $num1 : $num2;
    echo $max . "<br>";

    $min = (($num1<$num2 && $num1<$num3) ? $num1 : ($num2<$num3 ? $num2 : $num3));
    echo $min . "<br>";

    $max2 = ($num1>$num2) ? (($num1>$num3) ? $num1 : $num3) : (($num2>$num3) ? $num2 : $num3);
    echo $max2 . "<br>";

    $resnum = ($num2<0) ? "-ve" : "+ve";
    echo $resnum . "<br>";

    $check = ($num3%2 == 0) ? "Even" : "Odd";
    echo $check . "<br>";
?>