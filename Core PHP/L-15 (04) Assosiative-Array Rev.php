<?php

$student = ["Name"=>"Tirth","Course"=>"PHP","Mobile"=>9898252526];

$a = array(13,24);

echo $a[0]."<br>";
echo $student["Course"]."<hr>";

foreach($student as $Val)
{
    echo $Val."<br>";
}
    echo "<hr>";

foreach($student as $K => $Val)
{
    echo $K. " => " .$Val."<br>";
}
    echo "<hr>";

?>