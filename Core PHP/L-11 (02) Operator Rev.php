<?php

$x=30;
$y=15;

echo "Sum = " . $x+$y . "<br>";
echo "Sub = " . $x-$y . "<br>";
echo "Mul = " . $x*$y . "<br>";
echo "Div = " . $x/$y . "<br>";
echo "Mod = " . $x%$y . "<br>";
echo "Mix = " . (2+3%3-7*2/2+3) . "<br><hr>";

$p = 1;
$q = 10;

echo $q . "<br>"; // 10
echo $q-- . "<br>"; // 10
echo ++$q . "<br>"; // 10
echo $q-- . "<br>"; // 10
echo $q . "<br>"; // 9
echo ++$q . "<br>"; // 10
echo $q-- . "<br>"; // 10
echo $q . "<br><hr>"; // 9

$num = 21;
$num*= 5; // $num = $num (21)* 5  
echo $num . "<br><hr>";

$a = 1;
$b = "1";

echo ($a <= $b) . "<br>" ; // true = 1
echo ($a < $b) . "<br>" ; // false = 0 "Wont Dispaly"
echo ($a == $b) . "<br>" ; // 1 // Checks Values Only
echo ($a != $b) . "<br>" ; // 0
echo ($a > $b) . "<br>" ; // 0
echo ($a >= $b) . "<br>" ; // 1
echo ($a === $b) . "<br>" ; // Check Values along with Datatype
echo ($a !== $b) ."123"."<br><hr>";

$a1=1;
$a2=2;

echo ($a1<$a2 && $a1==$a2) . "Chandu";
echo ($a1<$a2 || $a1==$a2) . "Champion" . "<br><hr>";

$t=25;

echo $t."<br>"; // 25
echo --$t."<br>"; // 24
echo $t++."<br>"; // 24
echo $t--."<br>"; // 25
echo ++$t."<br>"; // 25
echo $t++."<br>"; // 25
echo --$t."<br>"; // 25
echo $t++."<br>"; // 25
echo $t."<br>"; // 26



?>