<?php
function moveZerosToEnd($array) 
{
    $nonZero = [];
    $zeroCount = 0;

    // Separate non-zero elements and count zeros
    foreach ($array as $value) 
    {
        if ($value === 0 || $value === 0.0 || $value === "0") 
        {
            $zeroCount++;
        } 
        else 
        {
            $nonZero[] = $value;
        }
    }

    // Add zeros to the end
    for ($i = 0; $i < $zeroCount; $i++) 
    {
        $nonZero[] = 0;
    }

    return $nonZero;
}

// Example array
$originalArray = [4, 0, 5, 0, 3, 0, 2, 1];

// Call the function
$result = moveZerosToEnd($originalArray);

// Display the result
echo "Original Array: ";
print_r($originalArray);
echo "<br>Modified Array: ";
print_r($result);
?>
