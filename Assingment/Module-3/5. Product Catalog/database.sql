-- Create database
CREATE DATABASE IF NOT EXISTS product_catalog;
USE product_catalog;

-- Create products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    category VARCHAR(100),
    image_url VARCHAR(500),
    stock_quantity INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO products (name, description, price, category, image_url, stock_quantity) VALUES
('Laptop', 'High-performance laptop with 16GB RAM', 75000.00, 'Electronics', 'images/laptop.jpg', 25),
('Smartphone', 'Latest Android smartphone with 128GB storage', 35000.00, 'Electronics', 'images/smartphone.jpg', 50),
('Headphones', 'Wireless Bluetooth headphones with noise cancellation', 8500.00, 'Electronics', 'images/headphones.jpg', 100),
('T-Shirt', 'Cotton casual t-shirt available in multiple colors', 899.00, 'Clothing', 'images/tshirt.jpg', 200),
('Jeans', 'Premium denim jeans with comfortable fit', 2499.00, 'Clothing', 'images/jeans.jpg', 75),
('Coffee Mug', 'Ceramic coffee mug with elegant design', 299.00, 'Home', 'images/mug.jpg', 150);