<?php

namespace App\Models;

class Post
{
    private static $pdo;
    
    public static function setPdo($pdo) {
        self::$pdo = $pdo;
    }
    
    public static function all() {
        $stmt = self::$pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public static function find($id) {
        $stmt = self::$pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    
    public static function create($data) {
        $stmt = self::$pdo->prepare("INSERT INTO posts (title, content, created_at) VALUES (?, ?, NOW())");
        return $stmt->execute([$data['title'], $data['content']]);
    }
    
    public static function update($id, $data) {
        $stmt = self::$pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$data['title'], $data['content'], $id]);
    }
    
    public static function delete($id) {
        $stmt = self::$pdo->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}