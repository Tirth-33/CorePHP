<?php

include ('1_DB_Rev.php');

$id = $_GET['id'];

$sql = "delete from employees where Eid = $id";

$run = mysqli_query($conn,$sql);

if($run)
{
    header('location:3_Read-View_Rev.php');
}

?>
