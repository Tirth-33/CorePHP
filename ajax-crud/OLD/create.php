<?php

include 'config.php';

header('Content-type:application/josn');

$name = $_POST['name'];
$email = $_POST['email'];
$sql = "insert into users (name, email) values ('Tirth', 'tirthchauhan.33@gmail.com')";

echo json_encode(['success'=>"xyz"]);
?>