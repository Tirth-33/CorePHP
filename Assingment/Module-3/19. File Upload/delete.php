<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);
$filename = $input['filename'] ?? '';

if (empty($filename)) {
    http_response_code(400);
    echo json_encode(['error' => 'Filename required']);
    exit();
}

$upload_dir = 'uploads/';

// Database connection
$host = 'localhost';
$dbname = 'file_uploads';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Find file in database
    $stmt = $pdo->prepare("SELECT stored_name FROM uploaded_files WHERE original_name = ?");
    $stmt->execute([$filename]);
    $file_info = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$file_info) {
        http_response_code(404);
        echo json_encode(['error' => 'File not found in database']);
        exit();
    }
    
    $stored_filename = $file_info['stored_name'];
    $file_path = $upload_dir . $stored_filename;
    
    // Security: Prevent path traversal
    $real_upload_dir = realpath($upload_dir);
    $real_file_path = realpath($file_path);
    
    if ($real_file_path && strpos($real_file_path, $real_upload_dir) === 0) {
        // Delete file from disk
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
    
    // Delete from database
    $stmt = $pdo->prepare("DELETE FROM uploaded_files WHERE original_name = ?");
    $stmt->execute([$filename]);
    
    echo json_encode(['success' => true, 'message' => 'File deleted successfully']);
    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Delete failed']);
}
?>