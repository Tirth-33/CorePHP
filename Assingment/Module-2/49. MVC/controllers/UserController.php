<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    public function show($id) {
        $user = User::getUserById($id);
        include __DIR__ . '/../views/user_view.php';
    }
}