<?php

// Trait for logging messages
trait Logger {
    public function log($message) {
        echo "[LOG]: $message<br>";
    }
}

// Trait for sending notifications
trait Notifier {
    public function notify($recipient, $message) {
        echo "Sending notification to $recipient: $message<br>";
    }
}

// Class that uses both traits
class TaskManager {
    use Logger, Notifier;

    public function createTask($taskName, $assignedTo) {
        $this->log("Creating task: $taskName");
        $this->notify($assignedTo, "You have been assigned a new task: $taskName");
    }
}

// Test the class
$manager = new TaskManager();
$manager->createTask("Finish report", "John");

?>