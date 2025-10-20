<?php
// filepath: e:\xampp\htdocs\Revision\Assingment\Module-2\54. ServerSide_Validation.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// If using PHPMailer, require the autoload (adjust path as needed)
require_once __DIR__ . '/../17. phpmailer/vendor/autoload.php';

$errors = [];
$username = $email = $password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Username: 4-20 chars, letters, numbers, underscores only
    $username = trim($_POST['username']);
    if (!preg_match('/^[A-Za-z0-9_]{4,20}$/', $username)) {
        $errors[] = "Username must be 4-20 characters and contain only letters, numbers, or underscores.";
    }

    // Email: basic email pattern
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Password: at least 6 chars, at least one letter and one number
    $password = $_POST['password'];
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*()_+]{6,}$/', $password)) {
        $errors[] = "Password must be at least 6 characters and include at least one letter and one number.";
    }

    if (empty($errors)) {
        // Send confirmation email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tirthchauhan.33@gmail.com'; // your email
            $mail->Password = 'qdjggunzeztxcqsn'; // your app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('tirthchauhan.33@gmail.com', 'Registration System');
            $mail->addAddress($email, $username);

            $mail->Subject = 'Registration Confirmation';
            $mail->Body    = "Hello $username,\n\nThank you for registering!\n\nBest regards,\nTeam";

            $mail->send();
            echo "<span style='color:green;'>Registration successful! Confirmation email sent.</span>";
        } catch (Exception $e) {
            echo "<span style='color:red;'>Registration successful, but email could not be sent. Mailer Error: {$mail->ErrorInfo}</span>";
        }
        // Here you would also insert into DB if needed
    }
}
?>

<h3>Registration with Server-Side Validation & Email Confirmation</h3>
<?php
if (!empty($errors)) {
    echo "<ul style='color:red;'>";
    foreach ($errors as $err) {
        echo "<li>" . htmlspecialchars($err) . "</li>";
    }
    echo "</ul>";
}
?>
<form method="post">
    <label>Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required></label><br><br>
    <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Register</button>
</form>