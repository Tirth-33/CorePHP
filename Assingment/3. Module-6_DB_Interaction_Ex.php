<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
<h1>Product List</h1>
    <ul>
        <?php
        // Simulated Database Query
        $products = ["Product A", "Product B", "Product C"];
        
        foreach ($products as $product) 
        {
            echo "<li>$product</li>";
        }
        ?>
    </ul>
</body>
</html>

