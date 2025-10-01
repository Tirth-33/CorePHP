<?php
$db = new DatabaseHandler("localhost", "root", "", "testapp ");

// Run a sample query
$db->query("SELECT * FROM users");

// Destructor will be called automatically when script ends or object is unset


class DatabaseHandler {
    private $conn;

    public function __construct($host, $user, $pass, $dbname) {
        // Create a new MySQLi connection
        $this->conn = new mysqli($host, $user, $pass, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        echo "Connected to database successfully.<br>";
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            echo "Query error: " . $this->conn->error . "<br>";
            return false;
        }
    }

    public function __destruct() {
        // Cleanup: Close the database connection
        if ($this->conn) {
            $this->conn->close();
            echo "Database connection closed.<br>";
        }
    }
}

?>