<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    
    if (empty($_POST['name']) || strlen($_POST['name']) < 2) {
        $errors['name'] = 'Name is required (min 2 characters)';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Valid email is required';
    }
    if (empty($_POST['subject']) || strlen($_POST['subject']) < 5) {
        $errors['subject'] = 'Subject is required (min 5 characters)';
    }
    if (empty($_POST['message']) || strlen($_POST['message']) < 10) {
        $errors['message'] = 'Message is required (min 10 characters)';
    }
    
    if (empty($errors)) {
        // Save submission to file
        $submission = [
            'date' => date('Y-m-d H:i:s'),
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'message' => $_POST['message']
        ];
        
        $data = json_encode($submission) . "\n";
        file_put_contents('submissions.txt', $data, FILE_APPEND | LOCK_EX);
        
        $_SESSION['success'] = 'Your inquiry has been submitted successfully!';
        $_SESSION['old'] = [];
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
    }
    
    header('Location: index.php');
    exit;
}

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? '';
unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['success']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <style>
        .container { max-width: 600px; margin: 50px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .error { color: red; font-size: 14px; margin-top: 5px; }
        .success { color: green; padding: 10px; background: #d4edda; border-radius: 4px; margin-bottom: 20px; }
        .btn { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        <p><a href="view-submissions.php">View All Submissions</a></p>
        
        <?php if($success): ?>
            <div class="success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($old['name'] ?? '') ?>">
                <?php if(isset($errors['name'])): ?>
                    <div class="error"><?= htmlspecialchars($errors['name']) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
                <?php if(isset($errors['email'])): ?>
                    <div class="error"><?= htmlspecialchars($errors['email']) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($old['subject'] ?? '') ?>">
                <?php if(isset($errors['subject'])): ?>
                    <div class="error"><?= htmlspecialchars($errors['subject']) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5"><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
                <?php if(isset($errors['message'])): ?>
                    <div class="error"><?= htmlspecialchars($errors['message']) ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn">Submit Inquiry</button>
        </form>
    </div>
</body>
</html>