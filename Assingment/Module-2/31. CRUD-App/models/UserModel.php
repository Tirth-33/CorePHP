<?php
class UserModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllUsers() {
        return $this->conn->query("SELECT * FROM users1");
    }

    public function insertUser($name, $email) {
        $stmt = $this->conn->prepare("INSERT INTO users1 (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        return $stmt->execute();
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users1 WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateUser($id, $name, $email) {
        $stmt = $this->conn->prepare("UPDATE users1 SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }

    public function deleteUser($id) {
        $stmt = $this->conn->prepare("DELETE FROM users1 WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}