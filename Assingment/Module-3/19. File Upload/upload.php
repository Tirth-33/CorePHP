<?php
header('Content-Type: application/json; charset=utf-8');

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

// Configuration
$upload_dir = 'uploads/';
$max_file_size = 10 * 1024 * 1024; // 10MB
$allowed_types = [
    'application/pdf',
    'application/msword',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'image/jpeg',
    'image/jpg', 
    'image/png',
    'image/gif'
];

$allowed_extensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'gif'];

// Database connection for file logging
$host = 'localhost';
$dbname = 'file_uploads';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database and table if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS uploaded_files (
        id INT AUTO_INCREMENT PRIMARY KEY,
        original_name VARCHAR(255) NOT NULL,
        stored_name VARCHAR(255) NOT NULL,
        file_size INT NOT NULL,
        file_type VARCHAR(100) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        ip_address VARCHAR(45),
        user_agent TEXT
    )");
    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Create upload directory if it doesn't exist
if (!is_dir($upload_dir)) {
    if (!mkdir($upload_dir, 0755, true)) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to create upload directory']);
        exit();
    }
}

// Check if files were uploaded
if (!isset($_FILES['files']) || empty($_FILES['files']['name'][0])) {
    http_response_code(400);
    echo json_encode(['error' => 'No files uploaded']);
    exit();
}

$uploaded_files = [];
$errors = [];
$uploaded_count = 0;

// Process each uploaded file
for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
    $file_name = $_FILES['files']['name'][$i];
    $file_tmp = $_FILES['files']['tmp_name'][$i];
    $file_size = $_FILES['files']['size'][$i];
    $file_type = $_FILES['files']['type'][$i];
    $file_error = $_FILES['files']['error'][$i];
    
    // Skip empty files
    if (empty($file_name)) continue;
    
    // Check for upload errors
    if ($file_error !== UPLOAD_ERR_OK) {
        $errors[] = "Upload error for file '$file_name': " . getUploadErrorMessage($file_error);
        continue;
    }
    
    // Validate file size
    if ($file_size > $max_file_size) {
        $errors[] = "File '$file_name' is too large. Maximum size is " . formatBytes($max_file_size);
        continue;
    }
    
    // Get file extension
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    // Validate file extension
    if (!in_array($file_extension, $allowed_extensions)) {
        $errors[] = "File '$file_name' has invalid extension. Allowed: " . implode(', ', $allowed_extensions);
        continue;
    }
    
    // Validate MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detected_type = finfo_file($finfo, $file_tmp);
    finfo_close($finfo);
    
    if (!in_array($detected_type, $allowed_types)) {
        $errors[] = "File '$file_name' has invalid MIME type: $detected_type";
        continue;
    }
    
    // Generate secure filename
    $safe_filename = generateSafeFilename($file_name);
    $full_path = $upload_dir . $safe_filename;
    
    // Check if file already exists
    $counter = 1;
    $original_safe_filename = $safe_filename;
    while (file_exists($full_path)) {
        $name_without_ext = pathinfo($original_safe_filename, PATHINFO_FILENAME);
        $extension = pathinfo($original_safe_filename, PATHINFO_EXTENSION);
        $safe_filename = $name_without_ext . '_' . $counter . '.' . $extension;
        $full_path = $upload_dir . $safe_filename;
        $counter++;
    }
    
    // Move uploaded file
    if (move_uploaded_file($file_tmp, $full_path)) {
        // Set secure file permissions
        chmod($full_path, 0644);
        
        // Log file upload to database
        logFileUpload($pdo, $file_name, $safe_filename, $file_size, $detected_type);
        
        $uploaded_files[] = [
            'original_name' => $file_name,
            'stored_name' => $safe_filename,
            'size' => $file_size,
            'type' => $detected_type
        ];
        
        $uploaded_count++;
    } else {
        $errors[] = "Failed to save file '$file_name'";
    }
}

// Return response
if ($uploaded_count > 0) {
    $response = [
        'success' => true,
        'uploaded_count' => $uploaded_count,
        'files' => $uploaded_files
    ];
    
    if (!empty($errors)) {
        $response['warnings'] = $errors;
    }
    
    echo json_encode($response);
} else {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'No files were uploaded successfully',
        'details' => $errors
    ]);
}

function generateSafeFilename($filename) {
    // Remove path traversal attempts
    $filename = basename($filename);
    
    // Get file extension
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $name = pathinfo($filename, PATHINFO_FILENAME);
    
    // Sanitize filename
    $name = preg_replace('/[^a-zA-Z0-9._-]/', '_', $name);
    $name = preg_replace('/_{2,}/', '_', $name);
    $name = trim($name, '_');
    
    // Limit filename length
    if (strlen($name) > 100) {
        $name = substr($name, 0, 100);
    }
    
    // Add timestamp to ensure uniqueness
    $timestamp = date('Y-m-d_H-i-s');
    
    return $timestamp . '_' . $name . '.' . $extension;
}

function logFileUpload($pdo, $original_name, $stored_name, $file_size, $file_type) {
    try {
        $stmt = $pdo->prepare("INSERT INTO uploaded_files (original_name, stored_name, file_size, file_type, ip_address, user_agent) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $original_name,
            $stored_name,
            $file_size,
            $file_type,
            $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
        ]);
        return $pdo->lastInsertId();
    } catch(PDOException $e) {
        error_log("File logging error: " . $e->getMessage());
        return false;
    }
}

function getUploadErrorMessage($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'File exceeds upload_max_filesize directive';
        case UPLOAD_ERR_FORM_SIZE:
            return 'File exceeds MAX_FILE_SIZE directive';
        case UPLOAD_ERR_PARTIAL:
            return 'File was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    
    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }
    
    return round($bytes, $precision) . ' ' . $units[$i];
}
?>