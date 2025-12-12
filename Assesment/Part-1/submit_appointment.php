<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $preferred_date = $_POST['preferred_date'];
    $preferred_time = $_POST['preferred_time'];
    
    $errors = [];
    
    // Validation
    if (empty($name) || strlen($name) < 2) {
        $errors[] = "Name must be at least 2 characters";
    }
    
    if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        $errors[] = "Phone must be 10-15 digits";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($department)) {
        $errors[] = "Department is required";
    }
    
    if (empty($preferred_date) || strtotime($preferred_date) < strtotime(date('Y-m-d'))) {
        $errors[] = "Date must be today or future";
    }
    
    if (empty($preferred_time)) {
        $errors[] = "Time is required";
    }
    
    if (empty($errors)) {
        try {
            $sql = "INSERT INTO appointments (name, phone, email, department, preferred_date, preferred_time) 
                    VALUES (:name, :phone, :email, :department, :preferred_date, :preferred_time)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':phone' => $phone,
                ':email' => $email,
                ':department' => $department,
                ':preferred_date' => $preferred_date,
                ':preferred_time' => $preferred_time
            ]);
            
            header("Location: appointments.php?success=1");
            exit;
        } catch(PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
    
    // Display errors
    echo "<!DOCTYPE html><html><head><link rel='stylesheet' href='style.css'></head><body>";
    echo "<div class='container'><div class='message error'>";
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    echo "</div><a href='index.html'>Go Back</a></div></body></html>";
}
?>
