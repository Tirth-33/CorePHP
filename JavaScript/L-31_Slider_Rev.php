<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider</title>
</head>
<body>
    <style>
        .xyz
        {
            animation: bus 1s;
        }

        @keyframes bus
        {
            from{transform: scale(1);}
            to{transform: scale(1.5);}
        }

        div
        {
            overflow: hidden;
        }
    </style>
</body>
<div>
    <img src="IMG_20190126_095509.jpg" alt="" width="50%" height="500px">
    <img src="IMG_20191011_180106.jpg" alt="" width="50%" height="500px">
    <img src="IMG_20191025_202329.jpg" alt="" width="50%" height="500px">
    <img src="IMG_20200601_142300.jpg" alt="" width="50%" height="500px">
</div>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint cupiditate fuga minus quae doloribus! Quidem omnis harum, aspernatur veniam repellat fugit maxime exercitationem laudantium doloremque delectus! Quisquam illum tempora voluptatem.
</p>
<script>
    let img_arr = document.getElementsByTagName('img');
    index = 0;
    function slider()
    {
        for(i=0;i<img_arr.length;i++)
    {
        img_arr[i].style.display = "none"
    }
    img_arr[index].style.display = "block";
    img_arr[index].className = "xyz"
    index++;

    if(index>=img_arr.length)
    {
        index = 0;
    }
    setTimeout(slider, 2000)
    }

    slider()

    console.log(img_arr)
</script>
</html>