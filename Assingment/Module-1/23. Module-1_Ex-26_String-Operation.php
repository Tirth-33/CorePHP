<?php
// Original strings
$firstName = "Hardi";
$lastName = "Chauhan";

// 🔗 1. Concatenation
$fullName = $firstName . " " . $lastName;
echo "Full Name: " . $fullName . "<br><hr>";

// ✂️ 2. Substring Extraction
$shortName = substr($fullName, 0, 5); // Extract first 5 characters
echo "Short Name (first 5 chars): " . $shortName . "<br><hr>";

// 📏 3. String Length
$length = strlen($fullName);
echo "Length of Full Name: " . $length . "\n";
?>