<?php
class Account {
    public $username;           // Public: accessible anywhere
    private $password;          // Private: accessible only within this class
    protected $accountBalance;  // Protected: accessible in this class and subclasses

    public function __construct($username, $password, $balance) {
        $this->username = $username;
        $this->password = $password;
        $this->accountBalance = $balance;
    }

    // Public method to display account info
    public function displayInfo() {
        echo "Username: $this->username<br>";
        // Accessing private property within the same class
        echo "Password: $this->password<br>";
        echo "Balance: ₹$this->accountBalance<br>";
    }
}

// Derived class
class PremiumAccount extends Account {
    public function showBalance() {
        // Accessing protected property from parent class
        echo "Premium Account Balance for $this->username: ₹$this->accountBalance<br>";
    }

    // Attempting to access private property will cause an error
    // public function showPassword() {
    //     echo "Password: $this->password"; // ❌ Not allowed
    // }
}

// Test the classes
$acc = new PremiumAccount("hardi_chauhan", "secure123", 5000);
$acc->displayInfo();       // Accessing public method
$acc->showBalance();       // Accessing protected property via subclass method

// Direct access examples
echo $acc->username . "<br>";        // ✅ Public property
// echo $acc->password . "\n";     // ❌ Private property - will cause error
// echo $acc->accountBalance . "\n"; // ❌ Protected property - will cause error
?>