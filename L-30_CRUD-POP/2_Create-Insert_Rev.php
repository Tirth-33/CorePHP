<?php

include ('1_DB_Rev.php');

if(isset($_POST['create']))
{
    $name = $_POST['ename'];
    $email = $_POST['email'];
    $gender = $_POST['egender'];
    $hobbies = $_POST['chk'];
    $image = $_FILES['eimage']['name'];

    $dup_image = $_FILES['eimage']['tmp_name'];

    move_uploaded_file($dup_image,'images/'.$image);

    $hb = "";

    foreach($hobbies as $hby)
    {
        $hb = $hb. $hby. ",";
    }
    
    // echo $name, $email, $gender, $hb, $image;

    $sql = "insert into employees (Ename, Eemail, Egender, Ehobbies, Eimage) values ('$name', '$email', '$gender', '$hb', '$image')";
    // echo $sql;

    // exit();

    $run = mysqli_query($conn, $sql);

    if($run)
    {
        header('location:3_Read-View_Rev.php');
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
            margin: 9px 0;
        }
        input[type='submit']
        {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name: </label>
            <input type="text" name="ename" id="">
        </div>
            <label for="">Email: </label>
            <input type="email" name="email" id="">
        <div>
            <label for="">Gender: </label>
            <input type="radio" name="egender" value="Male" id=""> Male
            <input type="radio" name="egender" value="Female" id=""> Female
        </div>
        <div>
            <label for="">Hobbies: </label>
            <input type="checkbox" name="chk[]" value="Cricket" id=""> Cricket
            <input type="checkbox" name="chk[]" value="Vollyball" id=""> Vollyball
            <input type="checkbox" name="chk[]" value="Carrom" id=""> Carrom
            <input type="checkbox" name="chk[]" value="Chess" id=""> Chess
        </div>
        <div>
            <label for="">Upload Image: </label>
            <input type="file" name="eimage" id="">
        </div>
        <div>
            <input type="submit" name="create" id="">
        </div>
    </form>
</body>
</html>