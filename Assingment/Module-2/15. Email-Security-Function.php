<?php
function prepareEmail(string $rawEmail): ?string {
    // Step 1: Sanitize input
    $sanitizedEmail = filter_var($rawEmail, FILTER_SANITIZE_EMAIL);

    // Step 2: Validate format
    if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
        return $sanitizedEmail;
    }

    // Step 3: Return null if invalid
    return null;
}


$userInput = $_POST['email'] ?? '';

$cleanEmail = prepareEmail($userInput);

if ($cleanEmail) {
    // Proceed with sending email
    echo "Valid email: $cleanEmail";
    // mail($cleanEmail, $subject, $message); // Example
} else {
    echo "Invalid email format.";
}
