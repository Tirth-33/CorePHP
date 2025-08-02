<?php

 $conn = new mysqli('localhost','root','','csc-ajax-json');

    if($conn)
    {
        echo 'Connected...!';
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>
    
<select name="" id="country">
    <option hidden>--- Select Country ---</option>
    <?php

    $sql = "select * from country";
    $run = $conn->query($sql);

    while($fetch=$run->fetch_object())
    { ?>
        <option value="<?= $fetch->id ?>"><?= $fetch->name ?></option>
        <?php
    }
    ?>
    
</select>

<select name="state" id="">
    <option value="">State</option>
</select>
    

<select name="city" id="">
    <option value="">City</option>
</select>

<script>

    $('#country').change(function(){

        country_id = $(this).val()
        // alert(country_id)

        $.ajax({
            url:"getData.php",
            type:"POST",
            data:{
                type:"state",
                id:country_id
            },
            dataType:"json",
            success:function(res)
            {
                console.log(res)
            }
        })
    })
    </script>

</body>
</html>
