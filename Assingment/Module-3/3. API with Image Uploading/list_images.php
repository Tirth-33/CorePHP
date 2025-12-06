<?php
header("Content-Type: application/json");

$uploadsDir = 'uploads/';
$images = [];

if (is_dir($uploadsDir)) {
    $files = scandir($uploadsDir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..' && in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])) {
            $images[] = [
                'filename' => $file,
                'url' => 'http://localhost/Revision/Assingment/Module-3/3.%20API%20with%20Image%20Uploading/' . $uploadsDir . $file,
                'size' => filesize($uploadsDir . $file)
            ];
        }
    }
}

echo json_encode([
    'success' => true,
    'count' => count($images),
    'images' => $images
]);
?>