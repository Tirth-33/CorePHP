<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = __DIR__ . '/uploads/';
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    $maxSize = 5 * 1024 * 1024; // 5MB

    // Ensure upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $file = $_FILES['fileUpload'] ?? null;

    if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
        $message = "Upload failed. Error code: " . ($file['error'] ?? 'No file');
    } elseif ($file['size'] > $maxSize) {
        $message = "File exceeds maximum size of 5MB.";
    } else {
        // Validate MIME type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mimeType, $allowedTypes)) {
            $message = "Invalid file type.";
        } else {
            // Sanitize and generate unique filename
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $safeName = uniqid('upload_', true) . '.' . $extension;
            $destination = $uploadDir . $safeName;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $message = "✅ File uploaded successfully as: " . htmlspecialchars($safeName);
            } else {
                $message = "Failed to move uploaded file.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>
    <?php if (isset($message)) echo "<p><strong>$message</strong></p>"; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="fileUpload">Choose a file:</label>
        <input type="file" name="fileUpload" id="fileUpload" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>