<?php
// Install PHPMailer via Composer first: composer require phpmailer/phpmailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
        $mail->Username = 'tirthchauhan.33@email.com';
        $mail->Password = 'jpoxvuacszztuqcc';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('tirthchauhan.33@email.com', 'Tirth Chauhan');
        $mail->addAddress($userEmail, $userName);

        //Content
        $mail->Subject = 'Welcome to Our Service!';
        $mail->Body    = "Hello $userName,\n\nThank you for registering with us.\n\nBest regards,\nTeam";

        $mail->send();
    } catch (Exception $e) {
        throw new Exception("Failed to send welcome email. Mailer Error: {$mail->ErrorInfo}");
    }
}

