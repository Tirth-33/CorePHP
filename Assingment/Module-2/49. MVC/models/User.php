<?php
class User {
    public $id;
    public $name;
    public $email;

    public function __construct($id, $name, $email) {
        $this->id    = $id;
        $this->name  = $name;
        $this->email = $email;
    }

    // Simulate fetching user from DB
    public static function getUserById($id) {
        // Dummy data for demonstration
        $users = [
            1 => new User(1, "Jay", "jay.shah@bcci.com"),
            2 => new User(2, "Rakesh", "rakesh.kadam@uco.com"),
        ];
        return $users[$id] ?? null;
    }
}