<?php

require_once 'bootstrap.php';

use App\Http\Controllers\PostController;

$controller = new PostController();
$method = $_GET['method'] ?? 'index';
$id = $_GET['id'] ?? null;

switch($method) {
    case 'show':
        $controller->show($id);
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
        $controller->destroy($id);
        break;
    default:
        $controller->index();
}