<?php
echo "<h2>Direct API Test</h2>";

// Test 1: Database Connection
echo "<h3>1. Testing Database Connection</h3>";
try {
    require_once 'config/database.php';
    $db = new Database();
    $pdo = $db->connect();
    echo "✅ Database connection successful<br>";
} catch (Exception $e) {
    echo "❌ Database error: " . $e->getMessage() . "<br>";
}

// Test 2: User Model
echo "<h3>2. Testing User Model</h3>";
try {
    require_once 'models/User.php';
    $user = new User();
    echo "✅ User model loaded<br>";
    
    // Test login
    $result = $user->login('admin@example.com', 'password');
    if ($result) {
        echo "✅ Login test successful<br>";
        echo "User: " . $result['username'] . "<br>";
    } else {
        echo "❌ Login test failed<br>";
    }
} catch (Exception $e) {
    echo "❌ User model error: " . $e->getMessage() . "<br>";
}

// Test 3: Product Model
echo "<h3>3. Testing Product Model</h3>";
try {
    require_once 'models/Product.php';
    $product = new Product();
    echo "✅ Product model loaded<br>";
    
    $products = $product->getAllProducts();
    echo "✅ Found " . count($products) . " products<br>";
    
    if (!empty($products)) {
        echo "First product: " . $products[0]['name'] . "<br>";
    }
} catch (Exception $e) {
    echo "❌ Product model error: " . $e->getMessage() . "<br>";
}

// Test 4: API Endpoints
echo "<h3>4. Testing API Endpoints</h3>";

// Test auth API
echo "<strong>Auth API Test:</strong><br>";
$authUrl = 'http://localhost/Revision/Assingment/Module-3/8.%20MVC%20Web%20Services/api/auth.php';
$loginData = json_encode(['action' => 'login', 'email' => 'admin@example.com', 'password' => 'password']);

$ch = curl_init($authUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $loginData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$authResponse = curl_exec($ch);
curl_close($ch);

if ($authResponse) {
    echo "✅ Auth API response: " . $authResponse . "<br>";
} else {
    echo "❌ Auth API failed<br>";
}

// Test products API
echo "<strong>Products API Test:</strong><br>";
$productsUrl = 'http://localhost/Revision/Assingment/Module-3/8.%20MVC%20Web%20Services/api/products.php';
$productsResponse = file_get_contents($productsUrl);

if ($productsResponse) {
    echo "✅ Products API response: " . substr($productsResponse, 0, 100) . "...<br>";
} else {
    echo "❌ Products API failed<br>";
}
?>

<hr>
<h3>Manual Test Links:</h3>
<a href="api/products.php" target="_blank">Test Products API</a><br>
<a href="test_api.html" target="_blank">Test Interface</a><br>

<h3>Quick cURL Tests:</h3>
<pre>
# Test login
curl -X POST http://localhost/Revision/Assingment/Module-3/8.%20MVC%20Web%20Services/api/auth.php \
-H "Content-Type: application/json" \
-d '{"action":"login","email":"admin@example.com","password":"password"}'

# Test products
curl http://localhost/Revision/Assingment/Module-3/8.%20MVC%20Web%20Services/api/products.php
</pre>