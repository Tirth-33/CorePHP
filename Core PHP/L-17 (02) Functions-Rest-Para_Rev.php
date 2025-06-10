<?php

function addition(...$x)
{
    $sum=0;
    
    // echo "Sum =>".$x[1]."<br>";

    for($a=0;$a<sizeof($x);$a++)
    {
        $sum = $sum + $x[$a];        
    }
    echo "Sum =>".$sum."<br>";
}

addition(45,65);
addition(45,65,85);
addition(45,65,75,90.45);
addition(45,6,755,8.65,100);

?>