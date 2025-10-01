<?php
require_once "config/database.php";
require_once "models/UserModel.php";
require_once "controllers/UserController.php";

$db = (new Database())->connect();
$model = new UserModel($db);
$controller = new UserController($model);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'add':
        include "views/insert.php";
        break;
    case 'insert':
        $controller->insert($_POST);
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'update':
        $controller->update($_POST);
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    default:
        $controller->index();
}