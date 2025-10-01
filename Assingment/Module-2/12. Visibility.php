<?php

class UserAccount {
    // Public property
    public $username;

    // Protected property
    protected $email;

    // Private property
    private $password;

    // Constructor
    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    // Public method
    public function displayUsername() {
        echo "Username: $this->username<br>";
    }

    // Protected method
    protected function displayEmail() {
        echo "Email: $this->email<br>";
    }

    // Private method
    private function displayPassword() {
        echo "Password: $this->password<br><hr>";
    }

    // Public method to access protected and private methods internally
    public function showAccountDetails() {
        $this->displayUsername();       // ✅ Allowed
        $this->displayEmail();          // ✅ Allowed
        $this->displayPassword();       // ✅ Allowed
    }
}

// Subclass to demonstrate protected access
class AdminAccount extends UserAccount {
    public function showAdminDetails() {
        echo "Admin Username: $this->username<br><hr>"; // ✅ Public property
        echo "Admin Email: $this->email<br><hr>";       // ✅ Protected property

        // echo "Admin Password: $this->password\n"; // ❌ Private property - not accessible

        $this->displayUsername();       // ✅ Public method
        $this->displayEmail();          // ✅ Protected method

        // $this->displayPassword();     // ❌ Private method - not accessible
    }
}

// Instantiate the class
$user = new UserAccount("Sandhya_Panchal", "sandhya@nw18.com", "sandhya123");

// Access public property and method
echo $user->username . "<br><hr>";           // ✅ Public property
$user->displayUsername();              // ✅ Public method

// Access protected and private members directly — will cause errors
// echo $user->email;                  // ❌ Protected property
// echo $user->password;               // ❌ Private property
// $user->displayEmail();              // ❌ Protected method
// $user->displayPassword();           // ❌ Private method

// Access protected/private via public method
$user->showAccountDetails();           // ✅ All internal access allowed

// Subclass access
$admin = new AdminAccount("admin_tirth", "tirth@nw18.com", "admintirth");
$admin->showAdminDetails();            // ✅ Public and protected access

?>