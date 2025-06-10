<?php
if (6<4)
{
    echo "Condition-1<br><hr>";
}
else if (0>6) 
{
    echo "Condition-2<br><hr>";
}
else
{
    echo "Final Statment<hr>";
}

$x=15;
$y=50;
$z=110;

if ($x>$y && $x>$z)
{
    echo $x."<br>";
}
else if ($y>$z)
{
    echo $y."<br>";
}
else
{
    echo $z."<hr>";
}

$a=40;
$b=300;
$c=25;

if ($a>$b)
{
    if($a>$c)
    {
        echo $a."<br>";
    }
    else
    {
        echo $c."<br>";
    }
}
else if ($b>$c)
{
    echo $b."<br>";
}
else
{
    echo $c."<br>";
}

?>