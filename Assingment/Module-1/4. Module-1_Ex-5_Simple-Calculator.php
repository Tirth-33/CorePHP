<?php
// Input values (you can replace these with form inputs or user prompts)
$num1 = 22;
$num2 = 5;
$operator = "-";

if ($operator == "+") 
{
    $result = $num1 + $num2;
    echo "Result: $num1 + $num2 = $result";
} 
elseif ($operator == "-") 
{
    $result = $num1 - $num2;
    echo "Result: $num1 - $num2 = $result";
} 
elseif ($operator == "*") 
{
    $result = $num1 * $num2;
    echo "Result: $num1 * $num2 = $result";
} 
elseif ($operator == "/") 
{
    if ($num2 != 0) 
    {
        $result = $num1 / $num2;
        echo "Result: $num1 / $num2 = $result";
    } 
    else 
    {
        echo "Error: Division by zero is not allowed.";
    }
} 
else 
{
    echo "Invalid operator.";
}
?>