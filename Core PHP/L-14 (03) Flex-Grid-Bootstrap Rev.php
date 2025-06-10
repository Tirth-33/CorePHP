<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14.Flex Grid Bootstap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        *
        {
            box-sizing: border-box;
        }
        h1
        {
            text-align: center;
        }
        .c1
        {
            background: lightblue;
            padding: 25px;
        }
        .r1
        {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
        }
        .col
        {
            height: 180px;
            width: 180px;
            border: 2px solid;
        }
        .r2
        {
            display: grid;
            justify-content: center;
            gap: 25px;
            grid-template-columns: repeat(auto-fit, 180px);
            grid-template-rows: 180px;
        }
    </style>
</head>
<body>
    <h1> Flex Card </h1>
    <div class="c1">
        <div class="r1">
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
            <div class="col">
                <img src="https://hdh.cloud/media/best-free-images-sites.jpg" alt="" width="100%">
            </div>
        </div>
    </div>
    <h1> Grid Card </h1>
    <div class="c1">
        <div class="r2">
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
            <div class="col1">
                <img src="https://live.staticflickr.com/7775/28872423390_4c731a9e03_b.jpg" alt="" width="100%">
            </div>
        </div>
    </div>
    <h1> Bootstrap Card </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
            <div class="col-xl-2">
                <img src="https://th.bing.com/th/id/OIP.NAqjMzgXvgk3VYqK5pAuDwHaE8?rs=1&pid=ImgDetMain" alt="" width="100%">
            </div>
        </div>
    </div>
</body>
</html>