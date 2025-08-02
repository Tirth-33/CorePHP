<?php
// Original variables
$intVal = 25;
$floatVal = 12.78;
$stringVal = "100";
$boolVal = true;

// Display original types and values
echo "<h2>Original Values</h2>";
echo "Integer: (" . gettype($intVal) . ") $intVal<br>";
echo "Float: (" . gettype($floatVal) . ") $floatVal<br>";
echo "String: (" . gettype($stringVal) . ") '$stringVal'<br>";
echo "Boolean: (" . gettype($boolVal) . ") " . ($boolVal ? 'true' : 'false') . "<br>";

// Type casting
$intToFloat = (float)$intVal;
$floatToInt = (int)$floatVal;
$stringToInt = (int)$stringVal;
$boolToString = (string)$boolVal;

// Display casted types and values
echo "<h2>Casted Values</h2>";
echo "Integer to Float: (" . gettype($intToFloat) . ") $intToFloat<br>";
echo "Float to Integer: (" . gettype($floatToInt) . ") $floatToInt<br>";
echo "String to Integer: (" . gettype($stringToInt) . ") $stringToInt<br>";
echo "Boolean to String: (" . gettype($boolToString) . ") '$boolToString'<br>";
?>