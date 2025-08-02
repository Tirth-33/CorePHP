<!DOCTYPE html>
<html>
<head>
    <style>
        .chessboard 
        {
            width: 320px;
            height: 320px;
            border: 2px solid #333;
            display: flex;
            flex-wrap: wrap;
        }
        .square 
        {
            width: 40px;
            height: 40px;
        }
        .black 
        {
            background-color: #000;
        }
        .white 
        {
            background-color: #fff;
        }
    </style>
</head>
<body>

<div class="chessboard">
<?php
for ($row = 0; $row < 8; $row++) 
{
    for ($col = 0; $col < 8; $col++) 
    {
        $color = ($row + $col) % 2 == 0 ? "white" : "black";
        echo "<div class='square $color'></div>";
    }
}
?>
</div>

</body>
</html>