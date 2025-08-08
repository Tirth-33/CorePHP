<?php
// Simulate a condition or use a query parameter
$responseType = $_GET['type'] ?? 'json'; // 'text' or 'json'

// Set appropriate Content-Type header
if ($responseType === 'json') {
    header('Content-Type: application/json');

    // Sample JSON data
    $data = [
        "status" => "success",
        "message" => "This is a JSON response",
        "timestamp" => date("c")
    ];

    // Output JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    header('Content-Type: text/plain');

    // Output plain text
    echo "This is a plain text response.\n";
    echo "Generated at: " . date("Y-m-d H:i:s") . "\n";
}