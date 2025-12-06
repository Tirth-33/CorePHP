<?php
// Simple MVC Router
session_start();

// Include required files
require_once 'models/Comment.php';
require_once 'controllers/CommentController.php';

// Get action from URL
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// Initialize controller
$controller = new CommentController();

// Route requests
switch($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
}
?>