<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../17. phpmailer/vendor/autoload.php';

function sendWelcomeEmail($userEmail, $userName) {
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email address.");
    }

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tirthchauhan.33@gmail.com';
        $mail->Password = 'rlutojpcnwwxozpc';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('tirthchauhan.33@gmail.com', 'Tirth Chauhan');
        $mail->addAddress($userEmail, $userName);

        //Content
        $mail->Subject = 'Welcome to Our Service!';
        $mail->Body    = "Hello $userName,\n\nThank you for registering with us.\n\nBest regards,\nTeam";

        $mail->send();
        echo "Welcome email sent successfully!";
    } catch (Exception $e) {
        echo "Failed to send welcome email. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Example usage:
try {
    sendWelcomeEmail("tirthchauhan@yandex.com", "John Doe");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
