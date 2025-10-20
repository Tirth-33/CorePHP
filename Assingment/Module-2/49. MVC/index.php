<?php
require_once __DIR__ . '/controllers/UserController.php';

$controller = new UserController();
$userId = isset($_GET['id']) ? (int)$_GET['id'] : 1; // Default to user 1
$controller->show($userId);