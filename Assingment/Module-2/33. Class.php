<?php

class Book {
    private $title;
    private $author;
    private $price;

    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    // Getters
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPrice() {
        return $this->price;
    }

    // Setters
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setPrice($price) {
        if ($price >= 0) {
            $this->price = $price;
        }
    }

    // Method to apply discount and return new price
    public function applyDiscount($percentage) {
        if ($percentage > 0 && $percentage <= 100) {
            $discountAmount = ($this->price * $percentage) / 100;
            return $this->price - $discountAmount;
        }
        return $this->price; // No discount applied
    }
}

$book = new Book("Atomic Habits", "James Clear", 500);
echo "Original Price: ₹" . $book->getPrice() . "<br><hr>";
echo "Discounted Price (20%): ₹" . $book->applyDiscount(20) . "\n";