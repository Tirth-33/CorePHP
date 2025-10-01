<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function index() {
        $users = $this->model->getAll();
        include __DIR__ . '/../views/user_list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST['name'], $_POST['email']);
            header("Location: index.php");
        } else {
            include __DIR__ . '/../views/user_form.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST['name'], $_POST['email']);
            header("Location: index.php");
        } else {
            $user = $this->model->get($id);
            include __DIR__ . '/../views/user_form.php';
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php");
    }
}