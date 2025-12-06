<?php
class CommentController {
    private $commentModel;
    
    public function __construct() {
        $this->commentModel = new Comment();
    }
    
    // Display all comments
    public function index() {
        $comments = $this->commentModel->getAll();
        $totalComments = $this->commentModel->getCount();
        
        include 'views/comments/index.php';
    }
    
    // Show create comment form
    public function create() {
        include 'views/comments/create.php';
    }
    
    // Store new comment
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $comment = trim($_POST['comment'] ?? '');
            
            // Validation
            $errors = [];
            
            if (empty($name)) {
                $errors[] = 'Name is required';
            }
            
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Valid email is required';
            }
            
            if (empty($comment)) {
                $errors[] = 'Comment is required';
            }
            
            if (empty($errors)) {
                if ($this->commentModel->insert($name, $email, $comment)) {
                    $_SESSION['success'] = 'Comment added successfully!';
                    header('Location: index.php');
                    exit();
                } else {
                    $errors[] = 'Failed to save comment';
                }
            }
            
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header('Location: index.php?action=create');
            exit();
        }
    }
    
    // Show edit comment form
    public function edit($id) {
        if (!$id) {
            $_SESSION['error'] = 'Comment ID is required';
            header('Location: index.php');
            exit();
        }
        
        $comment = $this->commentModel->getById($id);
        
        if (!$comment) {
            $_SESSION['error'] = 'Comment not found';
            header('Location: index.php');
            exit();
        }
        
        include 'views/comments/edit.php';
    }
    
    // Update existing comment
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $comment = trim($_POST['comment'] ?? '');
            
            // Validation
            $errors = [];
            
            if (empty($name)) {
                $errors[] = 'Name is required';
            }
            
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Valid email is required';
            }
            
            if (empty($comment)) {
                $errors[] = 'Comment is required';
            }
            
            if (empty($errors)) {
                if ($this->commentModel->update($id, $name, $email, $comment)) {
                    $_SESSION['success'] = 'Comment updated successfully!';
                    header('Location: index.php');
                    exit();
                } else {
                    $errors[] = 'Failed to update comment';
                }
            }
            
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header('Location: index.php?action=edit&id=' . $id);
            exit();
        }
    }
    
    // Delete comment
    public function delete($id) {
        if (!$id) {
            $_SESSION['error'] = 'Comment ID is required';
            header('Location: index.php');
            exit();
        }
        
        if ($this->commentModel->delete($id)) {
            $_SESSION['success'] = 'Comment deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete comment';
        }
        
        header('Location: index.php');
        exit();
    }
}
?>