<?php
// Define a simple Product class
class Product {
    public string $name;
    public float $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

// Define the Order class
class Order {
    // Method accepts an array of Product objects
    public function calculateTotal(array $products): float {
        $total = 0.0;

        foreach ($products as $product) {
            // Type check to ensure each item is a Product
            if ($product instanceof Product) {
                $total += $product->price;
            }
        }

        return $total;
    }
}

// Test the implementation
$product1 = new Product("Laptop", 75000.00);
$product2 = new Product("Mouse", 1200.50);
$product3 = new Product("Keyboard", 2500.75);

$order = new Order();
$totalAmount = $order->calculateTotal([$product1, $product2, $product3]);

echo "Total Order Amount: ₹" . number_format($totalAmount, 2);
?>