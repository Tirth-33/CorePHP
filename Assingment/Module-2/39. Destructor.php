<?php
class DatabaseConnection {
    private $conn;

    // Constructor: Establish connection
    public function __construct($host, $username, $password, $dbname) {
        $this->conn = new mysqli($host, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("❌ Connection failed: " . $this->conn->connect_error);
        }
        echo "✅ Connected to database '{$dbname}' successfully.<br>";
    }

    // Sample method to run a query
    public function runQuery($sql) {
        $result = $this->conn->query($sql);
        if ($result) {
            echo "📄 Query executed successfully.<br>";
        } else {
            echo "⚠️ Error executing query: " . $this->conn->error . "<br>";
        }
    }

    // Destructor: Close connection
    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
            echo "🔒 Database connection closed.<br>";
        }
    }
}

// Example usage
$db = new DatabaseConnection("localhost", "root", "", "school");
$db->runQuery("SELECT * FROM students"); // Replace with your actual table
?>