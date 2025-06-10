<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "crud_pop";
    protected $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
}

class Crud extends Database 
{
    public function create($data) 
    {
        $sql = "INSERT INTO registration (Name, Age) VALUES ('{$data['Name']}', '{$data['Age']}')";
        return $this->connection->query($sql);
    }

    public function read() {
        $sql = "SELECT * FROM registration";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE registration SET Name = '{$data['Name']}' WHERE id = $id";
        return $this->connection->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM registration WHERE id = $id";
        return $this->connection->query($sql);
    }
}

$crud = new Crud();

// Create
$crud->create(['Name' => 'Example', 'Age' => 'Data']);

// Read
$data = $crud->read();
print_r($data);

// Update
$crud->update(1, ['Name' => 'Updated Example']);

// Delete
$crud->delete(1);
?>
