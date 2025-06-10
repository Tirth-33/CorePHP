<?php
// Example-1
for ($a=1;$a<=5;$a++)
{
    for ($b=1;$b<=5;$b++)
    {
        echo "*";
    }
    echo "<br>";
}
    echo "<hr>";

// Example-2

for ($a=1;$a<=5;$a++)
{
    for ($b=1;$b<=5;$b++)
    {
          echo $b. " ";
    }
     echo "<br>";
}
    echo "<hr>";

// Example-3

for ($a=1;$a<=5;$a++)
{
    for ($b=1;$b<=5;$b++)
    {
          echo $a. " ";
    }
     echo "<br>";
}
    echo "<hr>";

// Example-4

for ($row=1;$row<=5;$row++)
{
    for ($col=1;$col<=$row;$col++)
    {
          echo $col. " ";
    }
     echo "<br>";
}
    echo "<hr>";

// Example-5

for ($row=1;$row<=5;$row++)
{
    for ($col=1;$col<=$row;$col++)
    {
          echo $row. " ";
    }
     echo "<br>";
}
    echo "<hr>";

// Example-6
$c=1;
for ($row=1;$row<=4;$row++)
{
    for ($col=1;$col<=$row;$col++)
    {
          echo $c++. " ";
    }
     echo "<br>";
}
    echo "<hr>";

// Example-7

for ($row=1;$row<=5;$row++)
{
    for ($col=1;$col<=$row;$col++)
    {
        if($row%2==0)
        {
            echo "C"." ";
        }
        /*else
        {
            echo "D"." ";
        } */
          
    }
     echo "<br>";
}
    echo "<hr>";

// Example-8

for ($row=5;$row>=1;$row--)
{
    for ($col=1;$col<=$row;$col++)
    {
        if($row%2==0)
        {
            echo "E"." ";
        }
        else
        {
            echo "F"." ";
        }
          
    }
     echo "<br>";
}
    echo "<hr>";

?>
