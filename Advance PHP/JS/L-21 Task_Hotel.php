<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Deals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
/*.custom-img 
{
    height: 200px;
    width: 300px;
    object-fit: cover;
}*/
</style>
<div class="container mt-5">
    <h1 class="text-center mb-4">Last-Minute Hotel Deals</h1>
    <div class="row">
        <?php
        $hotels = [
            ["Name" => "ibis New Delhi Aerocity - An Accor Brand", 
            "Location" => "Aerocity", 
            "Rating" => 7.0, 
            "Price" => 5410, 
            "image" => "https://cf.bstatic.com/xdata/images/hotel/square600/552294301.webp?k=258e16380763d56c0807c5a731a0b01c87192789e1c373e0722a8afa82cdd25d&o="],
            ["Name" => "Novotel New Delhi Aerocity",
            "Location" => "Aerocity",
            "Rating" => 7.8, 
            "Price" => 8500, 
            "image" => "https://cf.bstatic.com/xdata/images/hotel/square600/582569791.webp?k=9dfa70e9c4a5fc1a82c7b7d037045b5fcb176dd357e564fd817043779a567cdf&o="],
            ["Name" => "Aloft New Delhi Aerocity", 
            "Location" => "Aerocity", 
            "Rating" => 8.4, 
            "Price" => 8800, 
            "image" => "https://cf.bstatic.com/xdata/images/hotel/square600/643216464.webp?k=07fe3d72dc9f0085d68a13c813da8fcf85dc7af373ce7b0e9ba1799149b4145d&o="],
            ["Name" => "The Ashok", 
            "Location" => "Chanakyapuri", 
            "Rating" => 5.9, 
            "Price" => 9000, 
            "image" => "https://cf.bstatic.com/xdata/images/hotel/square600/44025013.webp?k=577d5b5d2a9e9a31d20048a99cb10e8a631d73a7a71573d7e1dd0c60c4df6b76&o="],
            ["Name" => "Pullman New Delhi Aerocity", 
            "Location" => "Aerocity", 
            "Rating" => 8.2, 
            "Price" => 10900, 
            "image" => "https://cf.bstatic.com/xdata/images/hotel/square600/545170671.webp?k=3e60a14d14b46c7c994ade61192149c21506ba6a0681dfadd23f55d3f9e45219&o="],
            ["Name" => "Hotel International Inn - Near Delhi Airport", 
            "Location" => "Mahipalpur", 
            "Rating" => 7.7, 
            "Price" => 3749, 
            "image" => "https://cf.bstatic.com/xdata/images/hotel/square600/523298468.webp?k=56cabb9f7a38130001bd507f271a7debc591e607a6aec7190c9adc2b220afe82&o="]
        ];

        forEach ($hotels as $hotel) 
        {
            echo "
            <div class='col-md-4 mb-3'>
                <div class='card h-100'>
                    <img src='{$hotel['image']}' class='card-img-top custom-img' alt='{$hotel['Name']}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$hotel['Name']}</h5>
                        <p class='card-text'>
                            <strong>Location:</strong> {$hotel['Location']}<br>
                            <strong>Rating:</strong> {$hotel['Rating']}<br>
                            <strong>Price:</strong> {$hotel['Price']} Rs For Tonight
                            <p>This is a <strong>Very Important</strong> Message.</p>

                        </p>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    
</script>
</body>
</html>

