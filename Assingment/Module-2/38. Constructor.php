<?php
class Student {
    public $name;
    public $age;
    public $grade;

    // Constructor to initialize properties
    public function __construct($name, $age, $grade) {
        $this->name  = $name;
        $this->age   = $age;
        $this->grade = $grade;
    }

    // Method to display student details
    public function displayDetails() {
        echo "🎓 Student Name : {$this->name}<br>";
        echo "📅 Age          : {$this->age}<br>";
        echo "🏆 Grade        : {$this->grade}<br>";
        echo "-----------------------------<br>";
    }
}

// Example usage
$student1 = new Student("Ripan Shah", 36, "A");
$student2 = new Student("Kunal Patel", 27, "B+");

$student1->displayDetails();
$student2->displayDetails();
?>