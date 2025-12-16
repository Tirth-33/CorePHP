<?php

// Simple contact form handler
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/contact' || $uri === '/') {
    if ($method === 'POST') {
        // Validation
        $errors = [];
        if (empty($_POST['name']) || strlen($_POST['name']) < 2) $errors['name'] = 'Name is required (min 2 chars)';
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Valid email is required';
        if (empty($_POST['subject']) || strlen($_POST['subject']) < 5) $errors['subject'] = 'Subject is required (min 5 chars)';
        if (empty($_POST['message']) || strlen($_POST['message']) < 10) $errors['message'] = 'Message is required (min 10 chars)';
        
        if (empty($errors)) {
            $_SESSION['success'] = 'Your inquiry has been submitted successfully!';
            $_SESSION['old'] = [];
        } else {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
        }
        header('Location: /contact');
        exit;
    }
    
    // Display form
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];
    $success = $_SESSION['success'] ?? '';
    unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['success']);
    
    include '../resources/views/contact.blade.php';
} else {
    http_response_code(404);
    echo '404 Not Found';
}