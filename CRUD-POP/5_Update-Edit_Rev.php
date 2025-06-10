<?php

include ('1_DB_Rev.php');

$id = $_GET['id'];

$sql = "select * from employees where Eid = $id";

$run = mysqli_query($conn,$sql);

$fetch = mysqli_fetch_assoc($run);

if(isset($_POST['update']))
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

    if($_FILES['eimage']['size'] > 0)
    {
        $sql = "update employees set Ename = '$name', Eemail = '$email', Egender = '$gender', Ehobbies = '$hb', Eimage = '$image' where Eid = $id";
        
        // echo $sql;
        // exit(); 
    }

    else
    {
        $sql = "update employees set Ename = '$name', Eemail = '$email', Egender = '$gender', Ehobbies = '$hb' where Eid = $id";
    }

    $run = mysqli_query($conn,$sql);
    
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
    <title>Update-Edit</title>
    <style>
        label
        {
            display: block;
            margin: 9px 0;
        }
        input[type="submit"]
        {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form action="" method = "post" enctype = "multipart/form-data">
    <div>
        <label for="">Name: </label>
        <input type="text" name="ename" id="" value= "<?php echo $fetch['Ename'] ?>">
    </div>
    <div>
        <label for="">Email: </label>
        <input type="email" name="email" id="" value= "<?php echo $fetch['Eemail'] ?>">
    </div>
    <div>
        <label for="">Gender: </label>
        <input type="radio" name="egender" id="" value="Male"
        <?php
        if ($fetch['Egender'] == 'Male')
        {
            echo "checked";
        }
        ?>
        > Male
        <input type="radio" name="egender" id="" value="Female"
        <?php
        if ($fetch['Egender'] == 'Female')
        {
            echo "checked";
        }
        ?>
        > Female
    </div>
    <div>
        <label for="">Hobbies: </label>
        <?php
        $hby = $fetch['Ehobbies'];
        $hby_arr = explode(',', $hby);

        // echo $hby_arr;
        ?>
        <input type="checkbox" name="chk[]" 
        <?php
        if(in_array('Cricket',$hby_arr))
        {
            echo "checked";
        }
        ?> id="" value = "Cricket"> Cricket
        <input type="checkbox" name="chk[]"
        <?php
        if(in_array('Vollyball',$hby_arr))
        {
            echo "checked";
        }
        ?> id="" value = "Vollyball"> Vollyball
        <input type="checkbox" name="chk[]"
        <?php
        if(in_array('Carrom',$hby_arr))
        {
            echo "checked";
        }
        ?> id="" value = "Carrom"> Carrom
        <input type="checkbox" name="chk[]"
        <?php
        if(in_array('Chess',$hby_arr))
        {
            echo "checked";
        }
        ?> id="" value = "Chess"> Chess
    </div>
    <div>
        <label for="">Upload Image: </label>
        <input type="file" name="eimage" id="">
        <img src="images/<?php echo $fetch['Eimage'] ?>" height="150" alt="">
    </div>
    <div>
        <input type="submit" name="update" id="">
    </div>
    </form>
</body>
</html>