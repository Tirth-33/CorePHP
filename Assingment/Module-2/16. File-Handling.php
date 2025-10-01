<?php
// Define the path to your text file
$filename = "11. Trait.php";

// Check if the file exists
if (file_exists($filename)) {
    // Read the file content
    $content = file_get_contents($filename);

    // Display the content on the web page
    echo "<h2>File Content:</h2>";
    echo "<pre>" . htmlspecialchars($content) . "</pre>";
} else {
    echo "<p style='color:red;'>Error: File not found.</p>";
}
?>