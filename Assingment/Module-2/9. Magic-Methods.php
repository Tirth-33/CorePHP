<?php
class DynamicProfile {
    private $data = [];

    // Handle reading inaccessible or undefined properties
    public function __get($property) {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        } else {
            echo "Notice: Property '$property' does not exist.<br>";
            return null;
        }
    }

    // Handle writing to inaccessible or undefined properties
    public function __set($property, $value) {
        $this->data[$property] = $value;
        echo "Property '$property' set to '$value'.<br>";
    }

    // Optional: Check if a property is set
    public function __isset($property) {
        return isset($this->data[$property]);
    }

    // Optional: Unset a property
    public function __unset($property) {
        unset($this->data[$property]);
        echo "Property '$property' has been unset.<br>";
    }
}

$profile = new DynamicProfile();

// Dynamically set properties
$profile->name = "Tirth";
$profile->role = "Developer";

// Access properties
echo "Name: " . $profile->name . "<br>";      // Outputs: Tirth
echo "Role: " . $profile->role . "<br>";      // Outputs: Developer

// Access undefined property
echo $profile->email;                         // Notice: Property 'email' does not exist.

// Check if a property is set
if (isset($profile->name)) {
    echo "Name is set.<br>";
}

// Unset a property
unset($profile->role);

?>