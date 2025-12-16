-- Laravel Application Database Setup
-- Run these commands in MySQL/MariaDB

-- Create database
CREATE DATABASE IF NOT EXISTS laravel_production CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Create user for production
CREATE USER IF NOT EXISTS 'laravel_user'@'localhost' IDENTIFIED BY 'secure_random_password_here';

-- Grant privileges
GRANT ALL PRIVILEGES ON laravel_production.* TO 'laravel_user'@'localhost';

-- For shared hosting (if you have access to create users)
-- CREATE USER IF NOT EXISTS 'laravel_user'@'%' IDENTIFIED BY 'secure_random_password_here';
-- GRANT ALL PRIVILEGES ON laravel_production.* TO 'laravel_user'@'%';

-- Flush privileges
FLUSH PRIVILEGES;

-- Show databases to verify
SHOW DATABASES;

-- Show users to verify
SELECT User, Host FROM mysql.user WHERE User = 'laravel_user';