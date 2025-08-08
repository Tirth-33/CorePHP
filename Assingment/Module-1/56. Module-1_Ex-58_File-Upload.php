<!DOCTYPE html>
<html>
<head>
    <title>File Upload & Download</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }
        .container {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="file"] {
            margin-bottom: 15px;
        }
        input[type="submit"], .download-btn {
            background-color: #007BFF;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .details {
            margin-top: 20px;
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 4px;
        }
        .details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload a File</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="uploadedFile" required>
            <br>
            <input type="submit" value="Upload">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploadedFile"])) {
            $file = $_FILES["uploadedFile"];
            $uploadDir = "uploads/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $filePath = $uploadDir . basename($file["name"]);

            if (move_uploaded_file($file["tmp_name"], $filePath)) {
                echo "<div class='details'>";
                echo "<p><strong>File Name:</strong> " . htmlspecialchars($file["name"]) . "</p>";
                echo "<p><strong>File Type:</strong> " . htmlspecialchars($file["type"]) . "</p>";
                echo "<p><strong>File Size:</strong> " . round($file["size"] / 1024, 2) . " KB</p>";
                echo "<a class='download-btn' href='$filePath' download>Download File</a>";
                echo "</div>";
            } else {
                echo "<p style='color:red;'>❌ File upload failed.</p>";
            }
        }
        ?>
    </div>
</body>
</html>