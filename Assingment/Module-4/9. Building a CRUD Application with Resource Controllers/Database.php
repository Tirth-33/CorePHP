<?php

class Database
{
    private $host = 'localhost';
    private $dbname = 'blog_db';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct()
    {
        try {
            // First connect without database to create it
            $pdo = new PDO("mysql:host={$this->host}", $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Create database if it doesn't exist
            $pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->dbname}");
            
            // Now connect to the specific database
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->createTable();
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    private function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->pdo->exec($sql);
    }

    public function getAllCategories()
    {
        $stmt = $this->pdo->query("SELECT * FROM categories ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createCategory($category)
    {
        $stmt = $this->pdo->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
        return $stmt->execute([$category->getName(), $category->getDescription()]);
    }

    public function updateCategory($id, $name, $description)
    {
        $stmt = $this->pdo->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $id]);
    }

    public function deleteCategory($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }
}