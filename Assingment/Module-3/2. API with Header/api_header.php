<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$headers = getallheaders();
$customHeader = isset($headers['X-Custom-Header']) ? $headers['X-Custom-Header'] : null;

if ($customHeader) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Custom header received',
        'header_value' => $customHeader,
        'all_headers' => $headers
    ]);
} else {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'X-Custom-Header not found',
        'received_headers' => array_keys($headers)
    ]);
}
?>