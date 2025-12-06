<?php
// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

$upload_dir = 'uploads/';

if (!isset($_GET['file']) || empty($_GET['file'])) {
    http_response_code(400);
    die('File parameter required');
}

$requested_file = $_GET['file'];

// Database connection to get stored filename
$host = 'localhost';
$dbname = 'file_uploads';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Find file in database
    $stmt = $pdo->prepare("SELECT stored_name, file_type FROM uploaded_files WHERE original_name = ?");
    $stmt->execute([$requested_file]);
    $file_info = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$file_info) {
        http_response_code(404);
        die('File not found in database');
    }
    
    $stored_filename = $file_info['stored_name'];
    $file_type = $file_info['file_type'];
    
} catch(PDOException $e) {
    http_response_code(500);
    die('Database error');
}

$file_path = $upload_dir . $stored_filename;

// Security: Prevent path traversal
$real_upload_dir = realpath($upload_dir);
$real_file_path = realpath($file_path);

if (!$real_file_path || strpos($real_file_path, $real_upload_dir) !== 0) {
    http_response_code(403);
    die('Access denied');
}

// Check if file exists
if (!file_exists($file_path)) {
    http_response_code(404);
    die('File not found on disk');
}

// Get file info
$file_size = filesize($file_path);

// Set appropriate headers for download
header('Content-Type: ' . $file_type);
header('Content-Disposition: attachment; filename="' . $requested_file . '"');
header('Content-Length: ' . $file_size);
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');

// Output file
readfile($file_path);
exit();
?>