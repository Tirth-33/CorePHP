<?php
class Comment {
    private $pdo;
    
    public function __construct() {
        $this->connect();
        $this->createTable();
    }
    
    private function connect() {
        $host = 'localhost';
        $dbname = 'mvc_comments';
        $username = 'root';
        $password = '';
        
        try {
            $this->pdo = new PDO("mysql:host=$host", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Create database if not exists
            $this->pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
            $this->pdo->exec("USE $dbname");
            
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    private function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS comments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            comment TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        $this->pdo->exec($sql);
        
        // Insert sample data if table is empty
        $count = $this->pdo->query("SELECT COUNT(*) FROM comments")->fetchColumn();
        if ($count == 0) {
            $this->insertSampleData();
        }
    }
    
    private function insertSampleData() {
        $sampleComments = [
            ['John Doe', 'john@example.com', 'Great article! Very informative and well written.'],
            ['Jane Smith', 'jane@example.com', 'Thanks for sharing this. It helped me understand the concept better.'],
            ['Mike Johnson', 'mike@example.com', 'I have a question about the implementation. Could you provide more details?']
        ];
        
        $stmt = $this->pdo->prepare("INSERT INTO comments (name, email, comment) VALUES (?, ?, ?)");
        
        foreach ($sampleComments as $comment) {
            $stmt->execute($comment);
        }
    }
    
    // Get all comments
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM comments ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Get single comment by ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Insert new comment
    public function insert($name, $email, $comment) {
        $stmt = $this->pdo->prepare("INSERT INTO comments (name, email, comment) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $comment]);
    }
    
    // Update existing comment
    public function update($id, $name, $email, $comment) {
        $stmt = $this->pdo->prepare("UPDATE comments SET name = ?, email = ?, comment = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $comment, $id]);
    }
    
    // Delete comment
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    // Get comments count
    public function getCount() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM comments");
        return $stmt->fetchColumn();
    }
}
?>