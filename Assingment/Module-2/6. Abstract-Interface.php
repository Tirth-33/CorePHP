<?php
interface VehicleInterface {
    public function start();
    public function stop();
}
?>

<?php
class Bike implements VehicleInterface {
    public function start() {
        echo "Bike started with a kick.<br>";
    }

    public function stop() {
        echo "Bike stopped using hand brakes.<br>";
    }
}
?>

<?php
class Car implements VehicleInterface {
    public function start() {
        echo "Car started with a key ignition.<br>";
    }

    public function stop() {
        echo "Car stopped using hydraulic brakes.<br>";
    }
}
?>

<?php
class Airplane implements VehicleInterface {
    public function start() {
        echo "Airplane engines started.<br>";
    }

    public function stop() {
        echo "Airplane landed and engines shut down.<br>";
    }
}
?>

<?php
$vehicles = [new Bike(), new Car(), new Airplane()];

foreach ($vehicles as $vehicle) {
    $vehicle->start();
    $vehicle->stop();
    echo "----------------------<br>";
}
?>