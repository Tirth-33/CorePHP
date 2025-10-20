<?php
// Abstraction & Interface
interface Borrowable {
    public function borrow(User $user);
    public function returnBook();
}

// Encapsulation & Inheritance
abstract class Person {
    protected $name;
    protected $id;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class User extends Person {
    private $borrowedBooks = [];

    public function borrowBook(Book $book) {
        if ($book->borrow($this)) {
            $this->borrowedBooks[] = $book;
            echo "{$this->name} borrowed '{$book->getTitle()}'<br>";
        } else {
            echo "Cannot borrow '{$book->getTitle()}'<br>";
        }
    }

    public function returnBook(Book $book) {
        if ($book->returnBook()) {
            $key = array_search($book, $this->borrowedBooks, true);
            if ($key !== false) {
                unset($this->borrowedBooks[$key]);
                echo "{$this->name} returned '{$book->getTitle()}'<br>";
            }
        }
    }
}

// Polymorphism & Encapsulation
class Book implements Borrowable {
    private $title;
    private $author;
    private $isBorrowed = false;
    private $borrowedBy = null;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function borrow(User $user) {
        if (!$this->isBorrowed) {
            $this->isBorrowed = true;
            $this->borrowedBy = $user;
            return true;
        }
        return false;
    }

    public function returnBook() {
        if ($this->isBorrowed) {
            $this->isBorrowed = false;
            $this->borrowedBy = null;
            return true;
        }
        return false;
    }

    // Implementing the missing method from Borrowable interface
    public function returnItem() {
        return $this->returnBook();
    }
}

// Transaction class (Composition)
class Transaction {
    private $user;
    private $book;
    private $date;
    private $type; // borrow or return

    public function __construct(User $user, Book $book, $type) {
        $this->user = $user;
        $this->book = $book;
        $this->type = $type;
        $this->date = date('Y-m-d H:i:s');
    }

    public function getInfo() {
        return "{$this->user->getName()} {$this->type} '{$this->book->getTitle()}' on {$this->date}";
    }
}

// Example usage
$user1 = new User(1, "Aakash");
$user2 = new User(2, "Brinjal");
$book1 = new Book("1984", "George Orwell");
$book2 = new Book("Brave New World", "Aldous Huxley");

$user1->borrowBook($book1); // Alice borrows 1984
$user2->borrowBook($book1); // Bob tries to borrow 1984 (already borrowed)
$user1->returnBook($book1); // Alice returns 1984
$user2->borrowBook($book1); // Bob borrows 1984

// Transactions
$transactions = [
    new Transaction($user1, $book1, "borrowed"),
    new Transaction($user1, $book1, "returned"),
    new Transaction($user2, $book1, "borrowed"),
];

echo "<h3>Transaction Log:</h3>";
foreach ($transactions as $t) {
    echo $t->getInfo() . "<br>";
}