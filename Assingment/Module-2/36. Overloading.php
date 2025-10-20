<?php
class Calculator {
    public function calculate() {
        $numArgs = func_num_args();
        $args = func_get_args();

        if ($numArgs < 2) {
            throw new Exception("At least two arguments are required.");
        }

        // Default operation: addition
        $operation = 'add';
        if (is_string($args[$numArgs - 1])) {
            $operation = strtolower($args[$numArgs - 1]);
            array_pop($args); // Remove operation from arguments
        }

        switch ($operation) {
            case 'add':
                return array_sum($args);

            case 'subtract':
                $result = $args[0];
                for ($i = 1; $i < count($args); $i++) {
                    $result -= $args[$i];
                }
                return $result;

            case 'multiply':
                $result = 1;
                foreach ($args as $val) {
                    $result *= $val;
                }
                return $result;

            default:
                throw new Exception("Unsupported operation: $operation");
        }
    }
}

// Example usage
$calc = new Calculator();

echo "Addition (10 + 20 + 30): " . $calc->calculate(10, 20, 30) . "<br>";
echo "Subtraction (100 - 30 - 20): " . $calc->calculate(100, 30, 20, 'subtract') . "<br>";
echo "Multiplication (2 × 3 × 4): " . $calc->calculate(2, 3, 4, 'multiply') . "<br>";
?>
