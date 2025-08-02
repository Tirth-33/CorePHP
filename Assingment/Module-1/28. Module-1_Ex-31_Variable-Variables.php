<?php
// Step 1: Define a regular variable
$fruit = "Apple";

// Step 2: Create a variable variable
$$fruit = "Red"; // Now we have a variable named $apple with the value "red"

// Output both variables
echo "The Value of \$fruit is: $fruit<br>";        // Outputs: apple
echo "The Value of \$$fruit is: " . $$fruit . "<br>"; // Outputs: red
echo "Or directly: The Color of Apple is: $Apple<br>"; // Also outputs: red
?>