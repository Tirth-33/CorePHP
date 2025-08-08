<?php
// Define two arrays
$array1 = ["Laptop", "Smartphone", "Monitor", "Keyboard"];
$array2 = ["Smartphone", "Tablet", "Monitor", "Mouse"];

// Merge the arrays
$mergedArray = array_merge($array1, $array2);

// Find the difference: items in $array1 that are not in $array2
$differenceArray = array_diff($array1, $array2);

// Display results
echo "<h3>Merged Array:</h3>";
echo "<pre>";
print_r($mergedArray);
echo "</pre>";

echo "<h3>Difference (Items in Array1 but not in Array2):</h3>";
echo "<pre>";
print_r($differenceArray);
echo "</pre>";
?>