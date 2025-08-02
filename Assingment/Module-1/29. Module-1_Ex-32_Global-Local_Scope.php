<?php
// Global variable
$counter = 14;

function incrementCounter() 
{
    // Local variable
    $localMessage = "Incrementing the Global Counter...";

    echo "$localMessage<br>";

    // Accessing global variable inside the function
    global $counter;
    $counter++;  // Modify the global counter
}

function showCounter() 
{
    // Access global variable again
    global $counter;
    echo "The Value of the Global Counter is: $counter<br>";
}

// Call functions
incrementCounter();
showCounter();
?>