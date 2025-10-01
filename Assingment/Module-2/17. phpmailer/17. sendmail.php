<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="send">Send Mail</button>
    </form>
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['send'])) {
    sendmail();
}

function sendmail()
{
    $mail = new PHPMailer(true);
    $otp = rand(100000, 999999); // Better range for 6-digit OTP

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tirthchauhan.33@gmail.com';
        $mail->Password = 'enuoslydjsxloybw';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('tirthchauhan.33@gmail.com', 'Tirth Chauhan');
        $mail->addAddress('tirthchauhan@yandex.com', 'S.T.Chauhan');
        $mail->addCC('cpchauhan2503@gmail.com', 'C.P.Chauhan');
        $mail->addBCC('bestchoiceinsuranc139@gmail.com', 'Tirth P.C');

        $mail->isHTML(true);
        $mail->Subject = 'Advanced PHPMailer Test';
        $mail->Body = "<h2>Hello!</h2><p>This email includes CC, BCC, and multiple attachments.</p><p>Your OTP is: <strong>$otp</strong></p>";
        $mail->AltBody = 'Hello! This email includes CC, BCC, and multiple attachments.';

        $mail->send();
        echo 'Message has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>