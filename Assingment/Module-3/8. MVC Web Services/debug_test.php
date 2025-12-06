<?php
echo "<h2>Debug Test</h2>";

// Check if PHP is working
echo "PHP Version: " . phpversion() . "<br>";

// Test simple_products.php directly
echo "<h3>Testing simple_products.php:</h3>";
$url = 'http://localhost/Revision/Assingment/Module-3/8.%20MVC%20Web%20Services/simple_products.php';
$response = file_get_contents($url);
echo "Response: <pre>" . htmlspecialchars($response) . "</pre>";

// Test simple_auth.php with POST
echo "<h3>Testing simple_auth.php:</h3>";
$authUrl = 'http://localhost/Revision/Assingment/Module-3/8.%20MVC%20Web%20Services/simple_auth.php';
$postData = json_encode(['action' => 'login', 'email' => 'admin@example.com', 'password' => 'password']);

$context = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/json',
        'content' => $postData
    ]
]);

$authResponse = file_get_contents($authUrl, false, $context);
echo "Auth Response: <pre>" . htmlspecialchars($authResponse) . "</pre>";
?>

<h3>Direct Links:</h3>
<a href="simple_products.php" target="_blank">Test simple_products.php</a><br>
<a href="working_test.html" target="_blank">Test Interface</a>