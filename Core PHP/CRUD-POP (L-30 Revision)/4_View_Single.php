<?php

include ('1_DB.php');

$id = $_GET['id'];

$sql = "select * from student_registration where ID = $id";
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
    <h2>Id: <?php echo $fetch['ID'] ?></h2>
    <h2>Name: <?php echo $fetch['UName'] ?></h2>
    <h2>Email: <?php echo $fetch['UEmail'] ?></h2>
    <h2>Gender: <?php echo $fetch['UGender'] ?></h2>
    <h2>Hobbies: <?php echo $fetch['UHobbies'] ?></h2>
    <h2>Image: <img src="Images/<?php echo $fetch['UImage'] ?>" alt="" height="300"></h2>
    <!-- <img src="images/IMG_20210912_090700.jpg" alt="Profile Image"> -->   
</body>
</html>


