<!-- <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendConfirmationEmail($email, $username) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tirthchauhan.33@gmail.com';
        $mail->Password   = 'ykacrvajfvbktcxp'; // App password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('tirthchauhan.33@gmail.com', 'Tirth');
        $mail->addAddress($email, $username);

        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Our Platform';
        $mail->Body    = "<h3>Hello $username!</h3><p>Thank you for registering with us.</p>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Email error: " . $mail->ErrorInfo);
        return false;
    }
}
?> -->