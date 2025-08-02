<!DOCTYPE html>
<html>
<head>
    <title>File Upload Example</title>
</head>
<body>
    <h1>Upload a File</h1>
    <!-- Form to upload file -->
    <form action="" method="post" enctype="multipart/form-data">
        <label for="uploadedFile">Choose a file:</label>
        <input type="file" name="uploadedFile" id="uploadedFile">
        <input type="submit" value="Upload File">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
            echo "<h2>File Details:</h2>";
            echo "<ul>";
            echo "<li><strong>Name:</strong> " . htmlspecialchars($_FILES['uploadedFile']['name']) . "</li>";
            echo "<li><strong>Type:</strong> " . $_FILES['uploadedFile']['type'] . "</li>";
            echo "<li><strong>Size:</strong> " . $_FILES['uploadedFile']['size'] . " bytes</li>";
            echo "<li><strong>Temporary Location:</strong> " . $_FILES['uploadedFile']['tmp_name'] . "</li>";
            echo "</ul>";
        } else {
            echo "<p style='color:red;'>File upload failed. Please try again.</p>";
        }
    }
    ?>
</body>
</html>