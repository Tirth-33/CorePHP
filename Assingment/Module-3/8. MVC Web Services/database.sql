-- Create database
CREATE DATABASE IF NOT EXISTS mvc_webservices;
USE mvc_webservices;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample users
INSERT INTO users (username, email, password) VALUES
('admin', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'), -- password: password
('user1', 'user1@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'); -- password: password

-- Insert sample products
INSERT INTO products (name, description, price, category) VALUES
('Laptop', 'High-performance laptop', 75000.00, 'Electronics'),
('Smartphone', 'Latest Android phone', 35000.00, 'Electronics'),
('Headphones', 'Wireless headphones', 8500.00, 'Electronics'),
('T-Shirt', 'Cotton t-shirt', 899.00, 'Clothing'),
('Jeans', 'Denim jeans', 2499.00, 'Clothing');