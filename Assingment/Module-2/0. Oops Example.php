<?php

// 1. 🛡️ Encapsulation
class BankAccount {
    private $balance = 0;

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

// 2. 🧬 Inheritance
class Animal {
    public function speak() {
        echo "Animal sound";
    }
}

class Dog extends Animal {
    public function speak() {
        echo "Bark";
    }
}

// 3. 🌀 Polymorphism
interface Shape {
    public function area();
}

class Circle implements Shape {
    public function area() {
        return "Area of Circle";
    }
}

class Square implements Shape {
    public function area() {
        return "Area of Square";
    }
}

// 4. 🧩 Abstraction

abstract class Vehicle {
    abstract public function startEngine();
}

class Car extends Vehicle {
    public function startEngine() {
        echo "Car engine started";
    }
}


?>