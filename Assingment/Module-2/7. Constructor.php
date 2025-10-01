<?php
class Book {
    public $title;
    public $author;
    public $year;

    // Constructor to initialize properties
    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    // Method to display book details
    public function displayDetails() {
        echo "Title: $this->title<br>";
        echo "Author: $this->author<br>";
        echo "Year: $this->year<br>";
    }
}

// Creating an object of the Book class
$book1 = new Book("The Pragmatic Programmer", "Andrew Hunt", 1999);
$book1->displayDetails();
?>