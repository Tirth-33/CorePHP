<?php

$arr = [[10,20,30],[40,50,60],[70,80,90]];

foreach($arr as $val)
{
    foreach($val as $val2)
    {
        echo $val2. " ";
    }

    echo "<br>";
}
?>
