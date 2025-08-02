<?php
// 1. Right-Angled Triangle of Stars
$n = 5;
for ($i = 1; $i <= $n; $i++) 
{
    echo str_repeat("*", $i) . "<br>";
}
    echo "<hr>";
    
// 2. Number Pyramid
$o = 5;
for ($i = 1; $i <= $o; $i++) 
{
    for ($j = 1; $j <= $i; $j++) 
    {
        echo $j . " ";
    }
    echo "<br>";
}
    echo "<hr>";

// 3. Inverted Triangle

$p = 5;
for ($i = $p; $i >= 1; $i--) 
{
    echo str_repeat("*", $i) . "<br>";
}
    echo "<hr>";

// 4. Hollow Square Pattern

$n = 5; // Size of the square

for ($i = 1; $i <= $n; $i++) 
{
    for ($j = 1; $j <= $n; $j++) 
    {
        // Print * at borders
        if ($i == 1 || $i == $n || $j == 1 || $j == $n) 
        {
            echo "* ";
        } 
        else 
        {
            echo "&nbsp;&nbsp;&nbsp"; // Space for hollow part
        }
    }
    echo "<br>";
}
    echo "<hr>";


// 5. Diamond Pattern

$n = 5;
// Upper triangle
for ($i = 1; $i <= $n; $i++) 
{
    for ($j = $i; $j < $n; $j++) 
    {
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $i; $k++) 
    {
        echo "* ";
    }
    echo "<br>";
}
// Lower triangle
for ($i = $n - 1; $i >= 1; $i--) 
{
    for ($j = $n; $j > $i; $j--) 
    {
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $i; $k++) 
    {
        echo "* ";
    }
    echo "<br>";
}


?>



