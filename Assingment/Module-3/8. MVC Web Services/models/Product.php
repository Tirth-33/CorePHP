<?php
require_once __DIR__ . '/../config/database.php';

class Product {
    private $db;
    
    public function __construct() {
        $this->db = (new Database())->connect();
    }
    
    public function getAllProducts() {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY name");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createProduct($name, $description, $price, $category) {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, category) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $category]);
    }
    
    public function updateProduct($id, $name, $description, $price, $category) {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, description = ?, price = ?, category = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $price, $category, $id]);
    }
    
    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>