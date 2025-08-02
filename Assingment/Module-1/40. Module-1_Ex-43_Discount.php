<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Discount Calculator</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .discount-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<div class="discount-box">
    <h2>Discount Calculator</h2>
    <form method="post">
        <input type="number" name="price" step="any" placeholder="Enter product price" required>
        <input type="submit" name="calculate" value="Calculate Discount">
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        $price = $_POST['price'];
        $discount = ($price > 500) ? ($price * 0.10) : 0;
        $finalPrice = $price - $discount;

        echo "<div class='result'>";
        echo "Original Price: ₹" . number_format($price, 2) . "<br>";
        echo "Discount: ₹" . number_format($discount, 2) . "<br>";
        echo "Final Price: ₹" . number_format($finalPrice, 2);
        echo "</div>";
    }
    ?>
</div>

</body>
</html>