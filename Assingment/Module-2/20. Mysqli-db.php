<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "male_fashion_mvc";

// Create connection
$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

echo "Connected successfully using mysqli!";
?>