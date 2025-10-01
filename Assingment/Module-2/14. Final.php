<?php
final class SecureLogger {
    public function log(string $message): void {
        echo "Log entry: $message";
    }
}

class CustomLogger extends SecureLogger {
    public function log(string $message): void {
        echo "Custom log: $message";
    }
}

