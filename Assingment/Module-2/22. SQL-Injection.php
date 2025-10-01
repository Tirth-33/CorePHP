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


$username = $_POST['FirstName'];
$password = $_POST['Password'];

// $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$query = "SELECT * FROM users WHERE FirstName = '' OR '1'='1' AND Password = 'anything'";
$result = mysqli_query($connection, $query);

// username: ' OR '1'='1
// password: anything


// $username = $_POST['FirstName'];
// $password = $_POST['Password'];

// $stmt = $connection->prepare("SELECT * FROM users WHERE FirstName = ? AND Password = ?");
// $stmt->bind_param("ss", $username, $password);
// $stmt->execute();
// $result = $stmt->get_result();


// $username = $_POST['FirstName'];
// $password = $_POST['Password'];

// $stmt = $pdo->prepare("SELECT * FROM users WHERE FirstName = :FirstName AND Password = :Password");
// $stmt->bindParam(':FirstName', $username);
// $stmt->bindParam(':Password', $password);
// $stmt->execute();
// $result = $stmt->fetchAll();

?>
