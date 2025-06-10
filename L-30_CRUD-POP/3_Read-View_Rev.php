<?php

include('1_DB_Rev.php');

$sql = "select * from employees";

$run = mysqli_query($conn, $sql);

// $fetch = mysqli_fetch_array($run);

// echo $fetch['Eid'], $fetch['Ename'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read-View</title>
</head>
<body>
    <button><a href="2_Create-Insert_Rev.php">Create</a></button>
    <table border="3" cellpadding="5" align="center">
        <tr>
            <th colspan = "7">Employee Details</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php

        while ($fetch = mysqli_fetch_assoc($run))
        {
            // echo $fetch['Eid'], $fetch['Ename'];
        ?>
            <tr>
                <td><?php echo $fetch['Eid'] ?></td>
                <td><?php echo $fetch['Ename'] ?></td>
                <td><?php echo $fetch['Eemail'] ?></td>
                <td><?php echo $fetch['Egender'] ?></td>
                <td><?php echo $fetch['Ehobbies'] ?></td>
                <td>
                    <img src="images/<?php echo $fetch['Eimage'] ?>" alt="" height="100">
                    
                </td>
                <td>
                <a href="4_View-Single_Rev.php ?id= <?php echo $fetch['Eid'] ?>"><button>View</button></a>
                <a href="5_Update-Edit_Rev.php ?id= <?php echo $fetch['Eid'] ?>"><button>Edit</button></a>
                <a href="6_Delete_Rev.php ?id= <?php echo $fetch['Eid'] ?>"><button>Delete</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>