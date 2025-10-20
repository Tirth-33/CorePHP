<?php
class DynamicObject {
    private $data = [];

    // Magic method to set property dynamically
    public function __set($name, $value) {
        echo "🔧 Setting '{$name}' to '{$value}'<br>";
        $this->data[$name] = $value;
    }

    // Magic method to get property dynamically
    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            echo "🔍 Getting value of '{$name}'<br>";
            return $this->data[$name];
        } else {
            echo "⚠️ Property '{$name}' not found.<br>";
            return null;
        }
    }

    // Optional: display all dynamic properties
    public function showAll() {
        echo "📦 Current Properties:<br>";
        foreach ($this->data as $key => $value) {
            echo " - {$key} : {$value}<br>";
        }
    }
}

// Example usage
$obj = new DynamicObject();
$obj->name = "Tirth";
$obj->age = 25;
$obj->language = "PHP";

echo "👤 Name      : " . $obj->name . "<br>";
echo "📅 Age       : " . $obj->age . "<br>";
echo "💻 Language  : " . $obj->language . "<br>";

$obj->showAll();
?>