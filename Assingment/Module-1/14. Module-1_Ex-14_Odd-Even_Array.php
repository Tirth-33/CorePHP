<?php
$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);      

// Initialize counters
$evenCount = 0;
$oddCount = 0;

// Loop through the array
foreach ($array as $value) 
{
    if ($value % 2 == 0) 
    {
        $evenCount++;
    } 
    else 
    {
        $oddCount++;
    }
}

// Display the results
echo "Number of Even Elements: " . $evenCount . "<hr>";
echo "Number of Odd Elements: " . $oddCount . "<br>";

?>
