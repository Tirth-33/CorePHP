<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update-Edit Data</title>
</head>
<body>
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
<form action="">
    <div>
        <label for="">Name: </label>
        <input type="text" name="UName" value="<?php echo $fetch['UName'] ?>">
    </div>

    <div>
        <label for="">Email: </label>
        <input type="email" name="UEmail" value="<?php echo $fetch['UEmail'] ?>">
    </div>
    
    <div>
        <label for="">Gender: </label>
        <input type="radio" name="UGender" value="Male"
        
        <?php
            if($fetch['UGender']=='Male')
            {
                echo "Checked";
            }
        ?>
        > Male

        <input type="radio" name="UGender" value="Female"
        
        <?php
            if($fetch['UGender']=='Female')
            {
                echo "Checked";
            }
        ?>
        > Female
    </div>

    <div>
        <label for="">Hobbies: </label>
        <?php
        
        $hby = $fetch['UHobbies'];
        $hby_arr = explode(',',$hby);

        ?>
        
        <input type="checkbox" name="chk[]"
        <?php
        if(in_array('Cricket',$hby_arr))
        {
            echo "Checked";
        }
        ?> 
        value="Cricket"> Cricket

        <input type="checkbox" name="chk[]"
        <?php
        if(in_array('Reading',$hby_arr))
        {
            echo "Checked";
        }
        ?> 
        value="Reading"> Reading

        <input type="checkbox" name="chk[]"
        <?php
        if(in_array('Music',$hby_arr))
        {
            echo "Checked";
        }
        ?> 
        value="Music"> Music

        <input type="checkbox" name="chk[]"
        <?php
        if(in_array('Chess',$hby_arr))
        {
            echo "Checked";
        }
        ?> 
        value="Chess"> Chess
    </div>

    <div>
        <label for="">Upload an Image: </label>
        <input type="file" name="uimage" id="">
        <img src="Images/<?php echo $fetch['UImage'] ?>" alt="">
    </div>
    <div>
        <input type="submit" name="update" id="">
    </div>
</form>
    
</body>
</html>