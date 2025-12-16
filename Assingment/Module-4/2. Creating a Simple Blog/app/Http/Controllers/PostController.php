<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController
{
    public function __construct() {
        global $pdo;
        Post::setPdo($pdo);
    }

    public function index()
    {
        $posts = Post::all();
        echo view('posts/index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        echo view('posts/show', ['post' => $post]);
    }

    public function create()
    {
        echo view('posts/create');
    }

    public function store()
    {
        if ($_POST['title'] && $_POST['content']) {
            Post::create($_POST);
            header('Location: index.php');
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        echo view('posts/edit', ['post' => $post]);
    }

    public function update($id)
    {
        if ($_POST['title'] && $_POST['content']) {
            Post::update($id, $_POST);
            header('Location: index.php?method=show&id=' . $id);
        }
    }

    public function destroy($id)
    {
        Post::delete($id);
        header('Location: index.php');
    }
}