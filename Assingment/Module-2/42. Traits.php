<?php
// Define the Logger trait
trait Logger {
    public function logActivity($message) {
        echo "[LOG] " . $message . "<br>";
    }
}

// Define the Notifier trait
trait Notifier {
    public function sendNotification($recipient, $message) {
        echo "Sending notification to $recipient: $message<br>";
    }
}

// Use both traits in the User class
class User {
    use Logger, Notifier;

    private $name;

    public function __construct($name) {
        $this->name = $name;
        $this->logActivity("User '$name' created.");
    }

    public function performAction($action) {
        $this->logActivity("User '$this->name' performed action: $action");
        $this->sendNotification($this->name, "You just performed: $action");
    }
}

// Test the User class
$user1 = new User("Alice");
$user1->performAction("Login");

$user2 = new User("Bob");
$user2->performAction("Upload File");
?>