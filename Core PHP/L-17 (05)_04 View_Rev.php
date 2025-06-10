<?php
    include 'Lec-17 (05)_03 DB_Connection_Rev.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <h2>View Page</h2>
    <?php
        $id = $_GET['ID'];
        // echo $id;

        $sql = "select * from users where id='$id'";
        $run = mysqli_query($conn, $sql);
        $fetch = mysqli_fetch_array($run);
    ?>

    <h3><?php echo $fetch['ID'] ?></h3>
    <h3><?php echo $fetch['Name'] ?></h3>
    <h3><?php echo $fetch['Email'] ?></h3>
    <h3><?php echo $fetch['Phone'] ?></h3>

</body>
</html>