<?php
class Car {
    // Properties
    public $make;
    public $model;
    public $year;

    // Constructor
    public function __construct($make, $model, $year) {
        $this->make  = $make ;
        $this->model = $model;
        $this->year  = $year;
    }

    // Method to display car details
    public function displayDetails() {
        echo "Car Details: <br><hr>";
        echo "Make: " . $this->make . "<br><hr>";
        echo "Model: " . $this->model . "<br><hr>";
        echo "Year: " . $this->year . "<br><hr>";
    }
}

// Example usage
$myCar = new Car("Toyota", "Corolla", 2020);
$myCar->displayDetails();
?>