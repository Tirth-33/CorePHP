<?php
class Car {
    public $make;
    public $model;
    public $year;

    // Constructor to initialize properties
    public function __construct($make, $model, $year) {
        $this->make  = $make;
        $this->model = $model;
        $this->year  = $year;
    }

    // Method to display car details
    public function displayDetails() {
        echo "Make: $this->make, Model: $this->model, Year: $this->year<br><hr>";
    }
}

// Instantiating multiple Car objects
$car1 = new Car("Toyota", "Camry", 2021);
$car2 = new Car("Ford", "Mustang", 2022);
$car3 = new Car("Tesla", "Model 3", 2023);

// Accessing properties directly
echo "Car 1 Make: " . $car1->make . "<br><hr>";
echo "Car 2 Model: " . $car2->model . "<br><hr>";
echo "Car 3 Year: " . $car3->year . "<br><hr>";

// Using method to display full details
$car1->displayDetails();
$car2->displayDetails();
$car3->displayDetails();
?>