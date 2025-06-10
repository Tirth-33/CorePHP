<?php
    include 'Lec-17 (05)_03 DB_Connection_Rev.php';

    $id=$_GET['ID'];
    // echo $id;

    $sql = "select * from users where id='$id'";
    $run = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_array($run);
    // echo $fetch['ID'];

    $sql = "delete from users where id='$id'";
    $run = mysqli_query($conn, $sql);

    if($run)
    {
        header("location:/Revision/Lec-17 (05)_02 Fetch_Data_Rev.php");
    }
?>