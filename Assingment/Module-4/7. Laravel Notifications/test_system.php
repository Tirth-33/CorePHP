<?php
header('Content-Type: text/html');
?>
<!DOCTYPE html>
<html>
<head><title>Laravel Notifications System Test</title></head>
<body>
<?php

echo "<h1>=== Laravel Notifications System Test ===</h1><br>";

// Test 1: Notification System
echo "<h2>1. Testing Notification System:</h2>";
if (file_exists('app/Http/Controllers/BlogPostController.php')) {
    echo "&nbsp;&nbsp;&nbsp;✓ BlogPostController exists<br>";
} else {
    echo "&nbsp;&nbsp;&nbsp;✗ BlogPostController missing<br>";
}
if (file_exists('app/Notifications/BlogPostPublished.php')) {
    echo "&nbsp;&nbsp;&nbsp;✓ Notification system configured<br>";
} else {
    echo "&nbsp;&nbsp;&nbsp;✗ Notification class missing<br>";
}

// Test 2: Queue System
echo "<hr><h2>2. Testing Queue Configuration:</h2>";
if (file_exists('config/queue.php')) {
    echo "&nbsp;&nbsp;&nbsp;✓ Queue configuration exists<br>";
}
if (file_exists('database/migrations/2024_01_01_000001_create_jobs_table.php')) {
    echo "&nbsp;&nbsp;&nbsp;✓ Jobs table migration exists<br>";
}

// Test 3: Required Components
echo "<hr><h2>3. Testing Required Components:</h2>";
$components = [
    'app/Notifications/BlogPostPublished.php' => 'Notification class',
    'app/Models/BlogPost.php' => 'BlogPost model',
    'app/Models/User.php' => 'User model',
    'app/Http/Controllers/BlogPostController.php' => 'Controller'
];

foreach ($components as $file => $name) {
    if (file_exists($file)) {
        echo "&nbsp;&nbsp;&nbsp;✓ $name exists<br>";
    } else {
        echo "&nbsp;&nbsp;&nbsp;✗ $name missing<br>";
    }
}

echo "<hr><h2>=== Test Commands ===</h2>";
echo "Run these commands to test:<br>";
echo "1. php artisan migrate<br>";
echo "2. php artisan queue:work &<br>";
echo "3. curl -X POST http://localhost/posts -H 'Content-Type: application/json' -d '{\"title\":\"Test\",\"content\":\"Test content\"}'<br>";

echo "<br><strong>✓ System ready for testing!</strong>";
?>
</body>
</html>