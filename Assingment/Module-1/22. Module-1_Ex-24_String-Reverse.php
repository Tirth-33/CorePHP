<?php
function reverseString($input) 
{
    $reversed = "";
    $length = 0;

    // Calculate string length without using strlen
    while (isset($input[$length])) 
    {
        $length++;
    }

    // Loop backward through the string
    for ($i = $length - 1; $i >= 0; $i--) 
    {
        $reversed .= $input[$i];
    }

    return $reversed;
}

// Example usage
$original = "Hello, world!";
$reversed = reverseString($original);
echo "Original: " . $original . "<br><hr>";
echo "Reversed: " . $reversed;
?>