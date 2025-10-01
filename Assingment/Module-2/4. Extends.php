<?php
// Parent class
class Vehicle {
    public $brand;
    public $color;

    public function __construct($brand, $color) {
        $this->brand = $brand;
        $this->color = $color;
    }

    public function startEngine() {
        echo "The engine of the $this->brand vehicle is starting...<br><hr>";
    }

    public function stopEngine() {
        echo "The engine of the $this->brand vehicle is stopping...<br><hr>";
    }

    public function displayInfo() {
        echo "Brand: $this->brand, Color: $this->color<br><hr>";
    }
}

// Child class
class Car extends Vehicle {
    public $model;
    public $year;

    public function __construct($brand, $color, $model, $year) {
        // Call parent constructor
        parent::__construct($brand, $color);
        $this->model = $model;
        $this->year  = $year;
    }

    // Override displayInfo method
    public function displayInfo() {
        parent::displayInfo(); // Call parent method
        echo "Model: $this->model, Year: $this->year<br><hr>";
    }

    public function drive() {
        echo "Driving the $this->year $this->brand $this->model...<br><hr>";
    }
}

// Instantiate a Car object
$myCar = new Car("Honda", "Red", "Civic", 2022);

// Demonstrate inherited and overridden behavior
$myCar->startEngine();     // Inherited from Vehicle
$myCar->drive();           // Defined in Car
$myCar->displayInfo();     // Overridden in Car
$myCar->stopEngine();      // Inherited from Vehicle
?>