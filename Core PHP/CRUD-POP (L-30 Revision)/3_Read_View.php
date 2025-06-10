<?php

include ('1_DB.php');

$sql = "select * from student_registration";
$run = mysqli_query($conn,$sql);
/*if (!$run) 
{
    die("Query Failed: " . mysqli_error($conn));
}*/

//$fetch = mysqli_fetch_array($run);

//echo $fetch['ID'], $fetch['UName'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View-Page</title>
</head>
<body>

<button><a href="2_Create_Insert.php">Create</a></button>
  <table border = "4" cellpadding = "5" align = "center">
    <tr>
        <th colspan = "7">User Details</th>
    </tr>     
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Hobbies</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>  
  <?php
    while($fetch = mysqli_fetch_array($run))
    {
       // echo $fetch['ID'], $fetch['UName'];
 ?>
    
    <tr>
      <td><?php echo $fetch['ID'] ?></td>
      <td><?php echo $fetch['UName'] ?></td>
      <td><?php echo $fetch['UEmail'] ?></td>
      <td><?php echo $fetch['UGender'] ?></td>
      <td><?php echo $fetch['UHobbies'] ?></td>
      <td><img src="Images/<?php echo $fetch['UImage'] ?>" alt="" height="100"></td>
      
      <td>
        <a href="4_View_Single.php?id=<?php echo $fetch['ID'] ?>">View</a>
        <a href="5_Update_Edit.php?id=<?php echo $fetch['ID'] ?>">Edit</a>
        <a href="6_Delete.php?id=<?php echo $fetch['ID'] ?>">Delete</a>
      </td>
    </tr>
    
  <?php 
    }
  ?>
  
</table>
</body>
</html>