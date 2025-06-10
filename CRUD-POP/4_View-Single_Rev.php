<?php

include ('1_DB_Rev.php');

$id = $_GET['id'];

// echo $id;
// exit();

$sql = "select * from employees where Eid=$id";
$run = mysqli_query($conn,$sql);
$fetch = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View-Single</title>
</head>
<body>
    <h2>Id: <?php echo $fetch['Eid'] ?></h2>
    <h2>Name: <?php echo $fetch['Ename'] ?></h2>
    <h2>Email: <?php echo $fetch['Eemail'] ?></h2>
    <h2>Gender: <?php echo $fetch['Egender'] ?></h2>
    <h2>Hobbies: <?php echo $fetch['Ehobbies'] ?></h2>
    <h2>Image: <img src="images/<?php echo $fetch['Eimage'] ?>" alt="" height="400"></h2>
    <button><a href="3_Read-View_Rev.php">Back</a></button>
</body>
</html>