<?php

for ($p=1;$p<=15;$p++)
{
    if ($p==6)
    {
        break;
    }
    echo $p."<br>";
}
    echo "<hr>";


for ($p=1; $p<=15;$p++) 
{
    if ($p>=11) 
    {
        echo $p . "<br>";
    }
}
echo "<hr>";

for ($p=1;$p<=9;$p++)
{
    if ($p==2 || $p==4 || $p==6 || $p==8)
    {
        continue;
    }
    echo $p. "<br>";
}
echo "<hr>";

$y=10;
$z=20;

$y = $y + $z; // 10 + 20 = 30
$z = $y - $z; // 30 - 20 = 10
$y = $y - $z; // 30 - 10 = 20

echo $y."<br>";
echo $z."<br>";


?>

