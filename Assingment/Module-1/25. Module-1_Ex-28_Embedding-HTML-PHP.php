<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        table 
        {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td 
        {
            border: 1px solid #999;
            padding: 8px 12px;
            text-align: left;
        }
        th 
        {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Student Details</h2>

<?php
// Sample user data stored in an array
$users = 
[
    ["name" => "Tirth", "email" => "tirthchauhan@yandex.com", "age" => 33],
    ["name" => "Savan", "email" => "savanprajapati@gmail.com", "age" => 28],
    ["name" => "Divyesh", "email" => "divyeshahir@gmail.com", "age" => 22],
];

// Start the table
echo "<table>";
echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";

// Loop through users and create rows
foreach ($users as $user) 
{
    echo "<tr>";
    echo "<td>{$user['name']}</td>";
    echo "<td>{$user['email']}</td>";
    echo "<td>{$user['age']}</td>";
    echo "</tr>";
}

// End the table
echo "</table>";
?>

</body>
</html>