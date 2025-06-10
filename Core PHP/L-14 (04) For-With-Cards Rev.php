<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lec-14 For-With-Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container-fluid p-4">
        <div class="row">
            <?php
            for ($a=1;$a<=12;$a++)
            {
            ?>
            
            <div class="col-xl-2">
                <img src="https://wallpapercave.com/wp/wp2858551.jpg" alt="" class="w-100">
            </div>

            <?php
            }
            ?>            
        </div>
    </div>

    <div class="container-fluid p-4">
        <div class="row">
            <?php
            $b=1;
            while($b<=12)
            {
            ?>
            
            <div class="col-xl-2">
                <img src="https://img.freepik.com/premium-photo/iceland-waterfalls-sun-rising-from-back_1095879-428.jpg" alt="" class="w-100">
            </div>

            <?php
            $b++;
            } 
            ?>
        </div>
    </div>

    <div class="container-fluid p-4">
        <div class="row">

            <?php
            $c=1;
            do{
            ?>

            <div class="col-xl-2">
                <img src="https://www.pixelstalk.net/wp-content/uploads/2016/07/Wallpapers-pexels-photo.jpg" alt="" class="w-100">
            </div>

            <?php

            $c++;
            } while ($c<=12);

            ?>
        </div>
    </div>
</body>
</html>