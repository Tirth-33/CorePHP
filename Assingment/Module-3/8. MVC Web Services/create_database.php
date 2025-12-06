<?php
// Create database and tables automatically
try {
    // Connect without database first
    $pdo = new PDO("mysql:host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS mvc_webservices");
    echo "✅ Database 'mvc_webservices' created<br>";
    
    // Use the database
    $pdo->exec("USE mvc_webservices");
    
    // Create users table
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "✅ Users table created<br>";
    
    // Create products table
    $pdo->exec("CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(10,2) NOT NULL,
        category VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "✅ Products table created<br>";
    
    // Insert sample users
    $pdo->exec("INSERT IGNORE INTO users (username, email, password) VALUES
        ('admin', 'admin@example.com', '" . password_hash('password', PASSWORD_DEFAULT) . "'),
        ('user1', 'user1@example.com', '" . password_hash('password', PASSWORD_DEFAULT) . "')");
    echo "✅ Sample users inserted<br>";
    
    // Insert sample products
    $pdo->exec("INSERT IGNORE INTO products (name, description, price, category) VALUES
        ('Laptop', 'High-performance laptop', 75000.00, 'Electronics'),
        ('Smartphone', 'Latest Android phone', 35000.00, 'Electronics'),
        ('Headphones', 'Wireless headphones', 8500.00, 'Electronics'),
        ('T-Shirt', 'Cotton t-shirt', 899.00, 'Clothing'),
        ('Jeans', 'Denim jeans', 2499.00, 'Clothing')");
    echo "✅ Sample products inserted<br>";
    
    echo "<br><h3>✅ Database setup complete!</h3>";
    echo "<p><a href='final_test.html'>Test the APIs now</a></p>";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>