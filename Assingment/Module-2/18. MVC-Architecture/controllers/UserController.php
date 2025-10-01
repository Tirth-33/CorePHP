<?php
// require_once './models/UserModel.php';
// require_once './views/userView.php';

include './models/UserModel.php';
include './views/userView.php';
class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function showUser() {
        $user = $this->model->getUser();
        displayUser($user);
    }
}