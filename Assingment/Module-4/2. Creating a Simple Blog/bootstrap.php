<?php

// Database connection
try {
    $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Database connection failed. Please create the blog database first.');
}

// Simple autoloader
spl_autoload_register(function ($class) {
    $file = str_replace(['App\\', '\\'], ['app/', '/'], $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Helper functions
function view($template, $data = []) {
    extract($data);
    ob_start();
    include "resources/views/$template.php";
    $content = ob_get_clean();
    include "resources/views/layout.blade.php";
}

function route($name, $params = []) {
    $routes = [
        'posts.index' => 'index.php',
        'posts.show' => 'index.php?method=show&id=' . ($params['id'] ?? ''),
        'posts.create' => 'index.php?method=create',
        'posts.store' => 'index.php?method=store',
        'posts.edit' => 'index.php?method=edit&id=' . ($params['id'] ?? ''),
        'posts.update' => 'index.php?method=update&id=' . ($params['id'] ?? ''),
        'posts.destroy' => 'index.php?method=delete&id=' . ($params['id'] ?? '')
    ];
    return $routes[$name] ?? '#';
}