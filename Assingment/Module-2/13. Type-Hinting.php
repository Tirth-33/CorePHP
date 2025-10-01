<?php
class DataProcessor {
    public function process(int|float|string $value): string {
        if (is_int($value)) {
            return "Processed integer: " . ($value * 2);
        } elseif (is_float($value)) {
            return "Processed float: " . number_format($value, 2);
        } elseif (is_string($value)) {
            return "Processed string: " . strtoupper($value);
        } else {
            return "Unsupported type";
        }
    }
}

$processor = new DataProcessor();

echo $processor->process(100);        // Output: Processed integer: 20
echo "<br>";
echo $processor->process(300.1415);    // Output: Processed float: 3.14
echo "<br>";
echo $processor->process("harmesh");   // Output: Processed string: HELLO