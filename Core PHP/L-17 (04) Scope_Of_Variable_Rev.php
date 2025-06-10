<?php

$a=3; // Global but Cannot be Accesible in Function

if($a)
{
    echo $a."<br>";;
}

for ($b=0;$b<5;$b++)
{

}
echo $b."<br>";

$c=100;
function getZ()
{
    global $c; // First Way
    echo $GLOBALS['c']."<br>"; // Second Way
    echo $c."<br>";
    
}
getZ();
?>