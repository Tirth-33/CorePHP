<?php

require_once 'CategoryController.php';

// Get the action from URL parameter
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// Create controller instance
$controller = new CategoryController();

// Route to appropriate method based on action
switch ($action) {
    case 'index':
        $controller->index();
        break;
    
    case 'create':
        $controller->create();
        break;
    
    case 'store':
        $controller->store();
        break;
    
    case 'show':
        if ($id) {
            $controller->show($id);
        } else {
            header('Location: index.php?action=index');
        }
        break;
    
    case 'edit':
        if ($id) {
            $controller->edit($id);
        } else {
            header('Location: index.php?action=index');
        }
        break;
    
    case 'update':
        if ($id) {
            $controller->update($id);
        } else {
            header('Location: index.php?action=index');
        }
        break;
    
    case 'destroy':
        if ($id) {
            $controller->destroy($id);
        } else {
            header('Location: index.php?action=index');
        }
        break;
    
    default:
        $controller->index();
        break;
}