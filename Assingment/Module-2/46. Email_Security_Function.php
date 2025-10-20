<?php
function sanitizeAndValidateEmail($input) {
    // Remove illegal characters from email
    $sanitizedEmail = filter_var($input, FILTER_SANITIZE_EMAIL);

    // Validate email
    if (!filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email address.");
    }

    return $sanitizedEmail;
}

// Example usage:
try {
    $email = sanitizeAndValidateEmail("user@@example.com");
    echo "Valid email: $email";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}