<?php

function testReturn()
{
    $a=5;
    echo $a."<br>";
    return $a;
}

echo testReturn()."<br>";

testReturn();

function testReturn1($b,$c)
{
    echo $b."<br>";
    return $b+$c;
}

echo testReturn1(24,15)."<br>";
?>