<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (!isset($_FILES['userfile']) || $_FILES['userfile']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload failed.');
        }

        $uploadedFile = $_FILES['userfile']['tmp_name'];
        $originalName = basename($_FILES['userfile']['name']);

        // Move the uploaded file to a safe location
        $destination = __DIR__ . '/uploads/' . $originalName;
        if (!is_dir(__DIR__ . '/uploads')) {
            mkdir(__DIR__ . '/uploads', 0777, true);
        }
        if (!move_uploaded_file($uploadedFile, $destination)) {
            throw new Exception('Failed to move uploaded file.');
        }

        // Read the file content
        $content = file_get_contents($destination);
        if ($content === false) {
            throw new Exception('Failed to read file content.');
        }

        echo "<h3>File uploaded and read successfully!</h3>";
        echo "<pre>" . htmlspecialchars($content) . "</pre>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!-- Simple HTML form for file upload -->
<form enctype="multipart/form-data" method="POST">
    <input type="file" name="userfile" required>
    <button type="submit">Upload and Read</button>
</form>