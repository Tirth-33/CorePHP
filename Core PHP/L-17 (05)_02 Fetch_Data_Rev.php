<?php
    include 'Lec-17 (05)_03 DB_Connection_Rev.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch-Data</title>
</head>
<body>
    <a href="Lec-17 (05)_01 Crud_Pop_Rev.php">Crud Page</a>
    <table border = "1" cellpadding = "6px" align = "center">
        <thead>
            <tr>
                <th colspan="5">User Details</th>
            </tr>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "select * from users";
            $run = mysqli_query ($conn, $sql);
            while ($fetch = mysqli_fetch_array($run))
            //echo $fetch[1];
            {

            
            ?>
            <tr>
                <td><?php echo $fetch['ID'] ?></td>
                <td><?php echo $fetch['Name'] ?></td>
                <td><?php echo $fetch['Email'] ?></td>
                <td><?php echo $fetch['Phone'] ?></td>
                <td>
                    <a href="Lec-17 (05)_04 View_Rev.php/?ID=<?php echo $fetch['ID'] ?>">View</a>
                    <button><a href="Lec-17 (05)_05 Edit_Rev.php/?ID=<?php echo $fetch['ID'] ?>">Edit</a></button>
                    <a href="Lec-17 (05)_06 Delete_Rev.php/?ID=<?php echo $fetch['ID'] ?>">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>    
    </table>
</body>
</html>