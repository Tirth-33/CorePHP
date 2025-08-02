<!-- Get the current day of the week -->

<?php

$today = date("l"); // "l" (lowercase L) returns the full day name

echo "Today is $today."; // Print the current day

// Check if it's Sunday
if ($today === "Sunday") 
{
    echo " Happy Sunday.";
}
?>