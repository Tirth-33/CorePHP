<?php
// Base class
class Animal {
    public function makeSound() {
        echo "Some generic animal sound<br>";
    }
}

// Final class — cannot be extended
class Dog extends Animal {
    public function makeSound() {
        echo "Woof! Woof!<br>";
    }
}

// ❌ Attempt to extend final class
// This will cause a fatal error: "Class Puppy may not inherit from final class Dog"
final class Puppy extends Dog {
    public function makeSound() {
        echo "Yip! Yip!<br>";
    }
}

// Test
$dog = new Dog();
$dog->makeSound();

// Uncommenting the lines below will trigger a fatal error
$puppy = new Puppy();
$puppy->makeSound();
?>