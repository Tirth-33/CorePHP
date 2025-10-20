<?php
// Base class
class Employee {
    public $name;
    public $salary;

    public function __construct($name, $salary) {
        $this->name   = $name;
        $this->salary = $salary;
    }

    public function displayDetails() {
        echo "👤 Name   : {$this->name}<br>";
        echo "💼 Salary : ₹{$this->salary}<br>";
    }
}

// Subclass for full-time employees
class FullTimeEmployee extends Employee {
    public function calculateBonus() {
        // Full-time bonus: 20% of salary
        return round($this->salary * 0.20, 2);
    }
}

// Subclass for part-time employees
class PartTimeEmployee extends Employee {
    public function calculateBonus() {
        // Part-time bonus: 10% of salary
        return round($this->salary * 0.10, 2);
    }
}

// Example usage
$emp1 = new FullTimeEmployee("Shrenik Mehta", 60000);
$emp2 = new PartTimeEmployee("Vishwas Patel", 25000);

echo "📌 Full-Time Employee:<br>";
$emp1->displayDetails();
echo "🎁 Bonus : ₹" . $emp1->calculateBonus() . "<br>";
echo "<br><hr>";

echo "📌 Part-Time Employee:<br>";
$emp2->displayDetails();
echo "🎁 Bonus : ₹" . $emp2->calculateBonus() . "<br>";
echo "<br><hr>";
?>

