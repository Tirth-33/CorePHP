<?php
interface Borrowable {
    public function borrow($memberId);
    public function returnItem();
}

abstract class LibraryItem implements Borrowable {
    protected string $title;
    protected string $author;
    protected bool $isAvailable = true;

    public function __construct(string $title, string $author) {
        $this->title = $title;
        $this->author = $author;
    }

    abstract public function getDetails(): string;

    public function borrow($memberId) {
        if ($this->isAvailable) {
            $this->isAvailable = false;
            echo "Item borrowed by Member ID: $memberId <br><hr>";
        } else {
            echo "Item not available <br><hr>";
        }
    }

    public function returnItem() {
        $this->isAvailable = true;
        echo "Item returned <br><hr>";
    }
}

class Book extends LibraryItem {
    private string $genre;

    public function __construct(string $title, string $author, string $genre) {
        parent::__construct($title, $author);
        $this->genre = $genre;
    }

    public function getDetails(): string {
        return "{$this->title} by {$this->author} - Genre: {$this->genre}";
    }

    public function __toString(): string {
        return $this->getDetails();
    }
}

class Member {
    private int $id;
    private string $name;

    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getInfo(): string {
        return "Member {$this->name} (ID: {$this->id})";
    }
}

final class Library {
    private array $items = [];

    public function addItem(LibraryItem $item): void {
        $this->items[] = $item;
    }

    public function showItems(): void {
        foreach ($this->items as $item) {
            echo $item . "<br><hr>";
        }
    }
}

$book1 = new Book("1983", "Kapil Dev", "Encyclopedia");
$book2 = new Book("The Alchemist", "Paulo Coelho", "Fiction");

$member = new Member(420, "Divyesh");

$library = new Library();
$library->addItem($book1);
$library->addItem($book2);

echo $member->getInfo() . "<br><hr>";
$library->showItems();

$book1->borrow($member->getInfo());
$book1->returnItem();

?>