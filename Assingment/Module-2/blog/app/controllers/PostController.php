<?php
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Comment.php';

class PostController
{
    protected $model;
    protected $commentModel;

    public function __construct()
    {
        $this->model = new Post();
        $this->commentModel = new Comment();
    }

    protected function render($view, $data = [])
    {
        extract($data, EXTR_SKIP);
        include __DIR__ . '/../../views/layout.php';
    }

    public function index()
    {
        $posts = $this->model->all();
        $this->render('posts/index.php', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->model->find($id);
        if (!$post) { http_response_code(404); echo "Post not found"; return; }
        $comments = $this->commentModel->allForPost($id);
        $this->render('posts/show.php', compact('post','comments'));
    }

    public function create()
    {
        $this->render('posts/create.php');
    }

    public function store()
    {
        $title = trim($_POST['title'] ?? '');
        $body  = trim($_POST['body'] ?? '');
        if ($title === '' || $body === '') {
            $error = 'Title and body are required.';
            $this->render('posts/create.php', compact('error', 'title', 'body'));
            return;
        }
        $this->model->create(['title'=>$title, 'body'=>$body]);
        header('Location: index.php');
    }

    public function edit($id)
    {
        $post = $this->model->find($id);
        if (!$post) { http_response_code(404); echo "Post not found"; return; }
        $this->render('posts/edit.php', compact('post'));
    }

    public function update($id)
    {
        $title = trim($_POST['title'] ?? '');
        $body  = trim($_POST['body'] ?? '');
        if ($title === '' || $body === '') {
            $error = 'Title and body are required.';
            $post = $this->model->find($id);
            $this->render('posts/edit.php', compact('error', 'post'));
            return;
        }
        $this->model->update($id, ['title'=>$title,'body'=>$body]);
        header('Location: index.php?action=show&id=' . $id);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: index.php');
    }

    // --- Comments: insert, edit, update, delete ---

    public function storeComment($postId)
    {
        $author = trim($_POST['author'] ?? '');
        $body = trim($_POST['body'] ?? '');
        if ($author === '' || $body === '') {
            // simple feedback via query param (alternatively render with error)
            header('Location: index.php?action=show&id=' . $postId . '&error=Comment+author+and+body+required');
            return;
        }
        $this->commentModel->create(['post_id'=>$postId, 'author'=>$author, 'body'=>$body]);
        header('Location: index.php?action=show&id=' . $postId);
    }

    public function editComment($id)
    {
        $comment = $this->commentModel->find($id);
        if (!$comment) { http_response_code(404); echo "Comment not found"; return; }
        $this->render('comments/edit.php', compact('comment'));
    }

    public function updateComment($id)
    {
        $author = trim($_POST['author'] ?? '');
        $body = trim($_POST['body'] ?? '');
        $comment = $this->commentModel->find($id);
        if (!$comment) { http_response_code(404); echo "Comment not found"; return; }

        if ($author === '' || $body === '') {
            $error = 'Author and comment body are required.';
            $this->render('comments/edit.php', compact('error', 'comment'));
            return;
        }

        $this->commentModel->update($id, ['author'=>$author, 'body'=>$body]);
        header('Location: index.php?action=show&id=' . $comment['post_id']);
    }

    public function deleteComment($id)
    {
        $comment = $this->commentModel->find($id);
        if ($comment) {
            $postId = $comment['post_id'];
            $this->commentModel->delete($id);
            header('Location: index.php?action=show&id=' . $postId);
            return;
        }
        header('Location: index.php');
    }
}