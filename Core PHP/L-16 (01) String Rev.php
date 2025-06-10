<?php

// String is Collection of Characters

$str = "Hello Hanuman";

echo $str."<br><hr>";

echo $str[10]."<br><hr>"; // 10 Number of Character Which is in $str is Output

$vowels = array ("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");

$onlyconsonants = str_replace ($vowels, "$", "Hello Hardi Chauhan");

echo $onlyconsonants."<br><hr>";

$test = "Raman";

$test1 = str_replace($test,"","Samay Raina");

echo $test1;
?>