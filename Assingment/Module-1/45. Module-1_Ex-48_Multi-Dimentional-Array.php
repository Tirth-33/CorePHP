<?php
// Define the multi-dimensional array
$products = [
    ["name" => "Laptop", "price" => 55000, "stock" => 10],
    ["name" => "Smartphone", "price" => 25000, "stock" => 25],
    ["name" => "Headphones", "price" => 1500, "stock" => 50],
    ["name" => "Monitor", "price" => 12000, "stock" => 15],
    ["name" => "Keyboard", "price" => 800, "stock" => 40]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Product Inventory</h2>

<table>
    <tr>
        <th>Product Name</th>
        <th>Price (₹)</th>
        <th>Stock</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= htmlspecialchars($product["name"]) ?></td>
        <td><?= number_format($product["price"]) ?></td>
        <td><?= $product["stock"] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>