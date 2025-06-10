<?php

$arr = [13,24,15];

// Exmaple-1

echo sizeof($arr);

echo "<hr>";

// Example-2

echo $a[0].$a[1]." ".$a[2];

// echo implode(" ",$a); // implode(seperator,arrayVar) :: Convert Array to String

echo "<hr>";

// Example-3

echo $a[0]."<br>";
echo $a[1]."<br>";
echo $a[2]."<br>";

echo "<hr>";

// Example-4

for($b=0;$b<sizeof($arr);$b++)
{
    echo $b. "<br>";

    echo $arr[$b]. "<br>";

}

echo "<hr>";

// Example-5

$c=0;
while($c<sizeof($arr))
{
    echo $arr[$c]. "<br>";
    $c++;
}

echo "<hr>";

// Example-6

$d=0;
do
{
    echo $arr[$d]. "<br>";
    $d++; 
} while($d<sizeof($arr));

echo "<hr>";

// Example-7

foreach($arr as $abc)
{
    echo $abc. "<br>";
}

echo "<hr>";

// Example-8

foreach($arr as $Hardi)
{
    echo "<h3>" .$Hardi. "</h3>" . "<br>";
}

echo "<hr>";

// Example-9

foreach($arr as $k => $v)
{
    echo $k. " => " .$v. "<br>";
}

echo "<hr>";
?>