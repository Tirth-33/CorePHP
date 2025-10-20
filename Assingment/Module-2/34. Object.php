<?php
class Book {
    public $title;
    public $author;
    public $price;

    public function __construct($title, $author, $price) {
        $this->title  = $title;
        $this->author = $author;
        $this->price  = $price;
    }

    public function applyDiscount($percentage) {
        if ($percentage < 0 || $percentage > 100) {
            throw new Exception("Discount must be between 0 and 100.");
        }
        $discountAmount = ($this->price * $percentage) / 100;
        return round($this->price - $discountAmount, 2);
    }

    public function displayDetails($discount = 0) {
        $finalPrice = $discount > 0 ? $this->applyDiscount($discount) : $this->price;
        echo "📘 Title : {$this->title}<br>";
        echo "✍️ Author: {$this->author}<br>";
        echo "💰 Price : ₹{$this->price}<br>";
        if ($discount > 0) {
            echo "🔻 After {$discount}% Discount: ₹{$finalPrice}<br>";
        }
        echo "<br><hr>";
    }
}

// Creating multiple book instances
$book1 = new Book("Clean Code", "Robert C. Martin", 899);
$book2 = new Book("Atomic Habits", "James Clear", 499);
$book3 = new Book("Deep Work", "Cal Newport", 650);

// Displaying details with optional discount
$book1->displayDetails(15);
$book2->displayDetails(10);
$book3->displayDetails(); // No discount
?>