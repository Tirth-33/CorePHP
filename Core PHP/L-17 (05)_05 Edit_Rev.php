<?php
    include 'Lec-17 (05)_03 DB_Connection_Rev.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    
<h2>Edit Details</h2>
<a href="/Revision/Lec-17 (05)_02 Fetch_Data_Rev.php">User Details</a>
<?php
$id = $_GET['ID'];
// echo $id;
$sql = "Select * from users where id='$id'";
$run = mysqli_query($conn, $sql);

$fetch = mysqli_fetch_array($run);

if(isset($_POST['editbtn']))
{
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];

    $sql = "update users set Name ='$name', Email='$email', Phone='$phone' where id='$id'";
    $run = mysqli_query($conn, $sql);
    if($run)
    {
        echo "Record Updated...!";
        header("location:/Revision/Lec-17 (05)_02 Fetch_Data_Rev.php");
    }
}
?>

<form method ="post">
 ID:   <input type="text" readonly name="" id="" value="<?php echo $fetch['ID'] ?>"><br><br>    
 Name:   <input type="text" name="Name" value="<?php echo $fetch['Name'] ?>"><br><br>
 Email:   <input type="text" name="Email" value="<?php echo $fetch['Email'] ?>"><br><br>
 Phone:   <input type="text" name="Phone" value="<?php echo $fetch['Phone'] ?>"><br><br>

    <input type="Submit" value = "Edit" name="editbtn">
</form>
    
</body>
</html>