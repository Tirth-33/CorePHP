<?php

include('1_DB.php');

if(isset($_POST['create']))
{
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $gender = $_POST['ugender'];
    $hobbies = $_POST['chk'];
    $image = $_FILES['uimage']['name'];
    
    $dup_image = $_FILES['uimage']['tmp_name'];

    
    move_uploaded_file($dup_image,'images/'.$image);

    $hobby = "";
    foreach($hobbies as $hby)
    {
        $hobby = $hobby. $hby. ",";
    }
    // echo $name, $email, $gender, $hobby;

    $sql = "insert into student_registration (UName,UEmail,UGender,UHobbies,UImage) values ('$name', '$email', '$gender','$hobby','$image')";
    // echo $sql;
    // exit();

    $run = mysqli_query($conn,$sql);
    if ($run)
    {
        header('location:3_Read_View.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create-Insert</title>
    <style>
        label
        {
            display: block;
            margin: 9px, 0;
        }

        input[type="submit"]
        {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name :</label>
            <input type="text" name="uname" id="">
        </div>

        <div>
            <label for="">Email :</label>
            <input type="email" name="uemail" id="">
        </div>
        
        <div>
            <label for="">Gender :</label>
            <input type="radio" name="ugender" value="Male"> Male
            <input type="radio" name="ugender" value="Female"> Female
        </div>
        
        <div>
            <label for="">Hobbies :</label>
            <input type="checkbox" name="chk[]" value="cricket"> Cricket
            <input type="checkbox" name="chk[]" value="reading"> Reading
            <input type="checkbox" name="chk[]" value="music"> Music
            <input type="checkbox" name="chk[]" value="chess"> Chess
        </div>
        
        <div>
            <label for="">Upload an Image :</label>
            <input type="file" name="uimage" id="">
        </div>
        
        <div>
            <input type="submit" name="create" id="">
        </div>
    </form>
</body>
</html>