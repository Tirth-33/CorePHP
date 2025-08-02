<?php
// Using echo to output a string
echo "1. Welcome to the Tops Technology!<br>";

// Using print to output a string
print "2. This Line Uses print instead of echo.<br>";

// Outputting numbers
$number = 92;
echo "3. The number is: $number<br>";
print "4. Another number: " . ($number + 8) . "<br>";

// Using var_dump to display variable types and values
$pi = 3.14159;
$is_active = true;
$user = ["name" => "Sandhya", "age" => 44];

echo "<h3>var_dump examples:</h3>";
var_dump($pi);          // Float value
echo ": Float Value<br>";
var_dump($is_active);   // Boolean
echo ": Boolean<br>";
var_dump($user);        // Array
echo ": Array<br>";

// You can even combine them in creative ways
echo "Let's Peek inside a Variable:<br>";
print_r($user);         // Similar to var_dump but cleaner for arrays
?>