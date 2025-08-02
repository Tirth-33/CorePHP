<?php

// 1. If Statement

$age = 25;

if ($age > 18) 
{
    echo "You are an Adult.<hr>";
}

// 2. If-else Statement

if ($age < 18) 
{
    echo "You are an Adult.<hr>";
} 
else 
{
    echo "You are a Minor.<hr>";
}

// 3. If-elseif-else Statement

if ($age < 13) 
{
    echo "Child <hr>";
} 
elseif ($age < 20) 
{
    echo "Teenager <hr>";
}
else 
{
    echo "Adult <hr>";
}

// 4. Switch Statement

$role = "admin";

switch ($role) 
{
    case "admin":
        echo "Welcome, Admin!";
        break;
    case "user":
        echo "Hello, User.";
        break;
    default:
        echo "Unknown role.";
}

// 5. If Condition and If-Else If

$number = 10; // You can change this to test other numbers

if ($number % 2 == 0) 
{
    echo "$number is even.";
} 
else 
{
    echo "$number is odd.";
}
?>