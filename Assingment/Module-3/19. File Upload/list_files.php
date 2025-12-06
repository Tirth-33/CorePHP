<?php
header('Content-Type: application/json; charset=utf-8');

$upload_dir = 'uploads/';

// Database connection
$host = 'localhost';
$dbname = 'file_uploads';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode([]);
    exit();
}

try {
    // Get files from database
    $stmt = $pdo->query("SELECT original_name, stored_name, file_size, file_type, upload_time FROM uploaded_files ORDER BY upload_time DESC");
    $db_files = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $files = [];
    
    foreach ($db_files as $db_file) {
        $file_path = $upload_dir . $db_file['stored_name'];
        
        // Check if file still exists on disk
        if (file_exists($file_path)) {
            $files[] = [
                'name' => $db_file['original_name'],
                'stored_name' => $db_file['stored_name'],
                'size' => (int)$db_file['file_size'],
                'type' => $db_file['file_type'],
                'upload_time' => $db_file['upload_time']
            ];
        }
    }
    
    echo json_encode($files);
    
} catch(PDOException $e) {
    echo json_encode([]);
}
?>