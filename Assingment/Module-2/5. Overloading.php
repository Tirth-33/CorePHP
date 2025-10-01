<?php
class Messenger {
    // Magic method to handle undefined method calls
    public function __call($name, $arguments) {
        if ($name === 'sendMessage') {
            $count = count($arguments);

            if ($count === 1) {
                echo "Sending message to: {$arguments[0]}<br><hr>";
            } elseif ($count === 2) {
                echo "Sending message to: {$arguments[0]} with subject: {$arguments[1]}<br><hr>";
            } elseif ($count === 3) {
                echo "Sending message to: {$arguments[0]} with subject: {$arguments[1]} and body: {$arguments[2]}<br><hr>";
            } else {
                echo "Invalid number of arguments for sendMessage<br><hr>";
            }
        } else {
            echo "Method '$name' does not exist.<br><hr>";
        }
    }
}

// Example usage
$msg = new Messenger();
$msg->sendMessage("Alice");
$msg->sendMessage("Bob", "Meeting Reminder");
$msg->sendMessage("Charlie", "Project Update", "Please review the attached files.");
$msg->sendMessage(); // Invalid case
?>