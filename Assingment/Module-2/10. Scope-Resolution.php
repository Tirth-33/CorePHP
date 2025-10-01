<?php

class Calculator {
    // Static property
    public static $operationCount = 0;

    // Static method to add two numbers
    public static function add($a, $b) {
        self::$operationCount++; // Access static property using self::
        return $a + $b;
    }

    // Static method to multiply two numbers
    public static function multiply($a, $b) {
        self::$operationCount++;
        return $a * $b;
    }

    // Static method to divide two numbers
    public static function divide($a, $b) {
        self::$operationCount++;
        return $a / $b;
    }

    // Static method to get total operations
    public static function getOperationCount() {
        return self::$operationCount;
    }
}

// Accessing static methods and properties using ::
echo "Addition: " . Calculator::add(5, 3) . "<br>";         // Outputs: 8
echo "Multiplication: " . Calculator::multiply(4, 6) . "<br>"; // Outputs: 24
echo "Divide: " . Calculator::divide(24, 6) . "<br>"; // Outputs: 4
echo "Total operations: " . Calculator::getOperationCount() . "<br>"; // Outputs: 3

?>