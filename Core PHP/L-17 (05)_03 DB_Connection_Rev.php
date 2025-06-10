<?php

// POP Way DB Connection

// mysqli_connect('host/server', 'username', 'password', 'dbname', 'portnumebr if changed');

$conn = mysqli_connect('localhost','root','','crud_pop');
if ($conn) 
{
    echo "Connected to DB...!";
}
?>