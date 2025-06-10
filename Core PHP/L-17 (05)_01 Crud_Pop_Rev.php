<?php
    include 'Lec-17 (05)_03 DB_Connection_Rev.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud-Pop</title>
</head>
<body>
    <form method="post">
        Name: <input type="text" name="name"><br><br>
        E-Mail: <input type="text" name="email"><br><br>
        Phone: <input type="text" name="phone"><br><br>

        <input type="submit" value="Insert" name="insbtn"><br><br>
    </form>
    <?php
    if(isset($_POST['insbtn']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // echo "he'll'o";

        $sql = "insert into users (name,email,phone) VALUES ('$name','$email','$phone')";
        $run = mysqli_query ($conn, $sql);
        if($run)
        {
            echo "Record Inserted...!";
            header("location:Lec-17 (05)_02 Fetch_Data_Rev.php");
        }
    }
    ?>
</body>
</html>