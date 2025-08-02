<?php
// Define user functions for operations
function add($a, $b) {
    return $a + $b;
}

function subtract($a, $b) {
    return $a - $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    if ($b == 0) {
        return "Cannot divide by zero.";
    }
    return $a / $b;
}

// Sample usage
$num1 = 15;
$num2 = 3;

echo "Addition: " . add($num1, $num2) . "<br>";
echo "Subtraction: " . subtract($num1, $num2) . "<br>";
echo "Multiplication: " . multiply($num1, $num2) . "<br>";
echo "Division: " . divide($num1, $num2);
?>