<?php
// Simple secure image upload demo
// Limits and allowed types
$maxFileSize = 2 * 1024 * 1024; // 2 MB
$allowedMimes = [
    'image/jpeg' => 'jpg',
    'image/jpg'  => 'jpg',
    'image/png'  => 'png',
    'image/gif'  => 'gif',
    'image/webp' => 'webp'
];

$uploadDir = __DIR__ . '/uploads';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$messages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $messages[] = 'Upload error: ' . $file['error'];
    } elseif ($file['size'] > $maxFileSize) {
        $messages[] = 'File is too large. Max allowed is 2 MB.';
    } elseif (!is_uploaded_file($file['tmp_name'])) {
        $messages[] = 'Invalid upload.';
    } else {
        // Verify image using getimagesize (safer than trusting extension)
        $imgInfo = @getimagesize($file['tmp_name']);
        if ($imgInfo === false) {
            $messages[] = 'Uploaded file is not a valid image.';
        } else {
            $mime = $imgInfo['mime'] ?? '';
            if (!array_key_exists($mime, $allowedMimes)) {
                $messages[] = 'Image mime type not allowed.';
            } else {
                // Sanitize original filename and build unique name
                $origName = basename($file['name']);
                $origName = preg_replace('/[^A-Za-z0-9._-]/', '_', $origName);
                $ext = $allowedMimes[$mime];
                $newName = sprintf('%s_%s.%s', time(), bin2hex(random_bytes(6)), $ext);
                $destPath = $uploadDir . '/' . $newName;

                if (move_uploaded_file($file['tmp_name'], $destPath)) {
                    chmod($destPath, 0644);
                    $messages[] = 'Upload successful: ' . htmlspecialchars($newName);
                } else {
                    $messages[] = 'Failed to move uploaded file.';
                }
            }
        }
    }
}

// Get uploaded images list
$images = [];
foreach (glob($uploadDir . '/*') as $f) {
    if (is_file($f)) {
        $images[] = basename($f);
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Image Upload</title>
    <style>
        body { font-family: Arial, sans-serif; max-width:800px; margin:20px; }
        .messages { color: #c00; }
        .thumbs img { max-height:120px; margin:6px; border:1px solid #ddd; padding:4px; background:#fff; }
    </style>
</head>
<body>
    <h2>Upload an image (max 2 MB)</h2>

    <?php if (!empty($messages)): ?>
        <div class="messages">
            <?php foreach ($messages as $m): ?>
                <div><?php echo htmlspecialchars($m); ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data" autocomplete="off">
        <label>
            Choose image:
            <input type="file" name="image" accept="image/*" required>
        </label>
        <button type="submit">Upload</button>
    </form>

    <hr>
    <h3>Uploaded images</h3>
    <div class="thumbs">
        <?php if (empty($images)): ?>
            <p>No images uploaded yet.</p>
        <?php else: ?>
            <?php foreach ($images as $img): ?>
                <a href="<?php echo 'uploads/' . rawurlencode($img); ?>" target="_blank">
                    <img src="<?php echo 'uploads/' . rawurlencode($img); ?>" alt="<?php echo htmlspecialchars($img); ?>">
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <hr>
    <h4>Notes</h4>
    <ul>
        <li>Allowed types: JPG, PNG, GIF, WEBP. Checked via getimagesize() and MIME type.</li>
        <li>Max file size: 2 MB. Filenames sanitized and saved with a unique name.</li>
        <li>Uploads are stored in the "uploads" folder next to this script.</li>
    </ul>
</body>
</html>