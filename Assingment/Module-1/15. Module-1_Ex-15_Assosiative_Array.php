
<?php
// Array of associative arrays for multiple users
$users = array
(
    array
    (
        "name"  => "Sandhya Panchal",
        "email" => "sandhya@nw18.com",
        "age"   => 42
    ),
    array
    (
        "name"  => "Pinkal Gurjar",
        "email" => "pinkal.p@gmail.com",
        "age"   => 38
    ),
    array
    (
        "name"  => "Sara Tendulkar",
        "email" => "sara.t@yahoo.com",
        "age"   => 31
    )
);

// Display user details
foreach ($users as $index => $user) 
{
    echo "<strong>User " . ($index + 1) . ":</strong><br>";
    echo "Name: " . $user["name"] . "<br>";
    echo "Email: " . $user["email"] . "<br>";
    echo "Age: " . $user["age"] . "<br><br>";
}
?>
