<?php
// Simple front controller / router
require_once __DIR__ . '/app/controllers/PostController.php';

$action = $_GET['action'] ?? 'index';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

$ctrl = new PostController();

switch ($action) {
    case 'index': $ctrl->index(); break;
    case 'show':  $ctrl->show($id); break;
    case 'create': $ctrl->create(); break;
    case 'store': $ctrl->store(); break;
    case 'edit': $ctrl->edit($id); break;
    case 'update': $ctrl->update($id); break;
    case 'delete': $ctrl->delete($id); break;

    // comments
    case 'comment_store':
        $postId = isset($_POST['post_id']) ? (int)$_POST['post_id'] : $id;
        $ctrl->storeComment($postId);
        break;
    case 'comment_edit': $ctrl->editComment($id); break;
    case 'comment_update': $ctrl->updateComment($id); break;
    case 'comment_delete': $ctrl->deleteComment($id); break;

    default: http_response_code(404); echo "Not found"; break;
}