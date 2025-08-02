<?php
// 1. Using print_r()
$array = array("Apple", "Banana", "Cherry");
echo "<pre>";
print_r($array);
echo "</pre>";

// 2. Using var_dump()

$array = array("Donkey", "Elephant", "Fish");
echo "<pre>";
var_dump($array);
echo "</pre>";

// 3. Using a foreach Loop

$array = array("Gaurav", "Hardi", "Indu");
foreach ($array as $value) 
{
    echo $value . "<br>";
}


?>
