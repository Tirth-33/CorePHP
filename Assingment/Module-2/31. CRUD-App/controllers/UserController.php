<?php
class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $users = $this->model->getAllUsers();
        include "views/list.php";
    }

    public function insert($data) {
        $this->model->insertUser($data['name'], $data['email']);
        header("Location: index.php");
    }

    public function edit($id) {
        $user = $this->model->getUserById($id);
        include "views/update.php";
    }

    public function update($data) {
        $this->model->updateUser($data['id'], $data['name'], $data['email']);
        header("Location: index.php");
    }

    public function delete($id) {
        $this->model->deleteUser($id);
        header("Location: index.php");
    }
}