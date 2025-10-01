<?php
// Recipient email address
$to = "bestchoiceinsuranc139@gmail.com";  // Replace with the actual email

// Email subject
$subject = "Test Email from PHP";

// Email message
$message = "Hello,\n\nThis is a test email sent using PHP's mail() function.\n\nRegards,\nTirth's Web App";

// Additional headers
$headers = "From: admin@yourdomain.com\r\n";
$headers .= "Reply-To: admin@yourdomain.com\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send the email
if (mail($to, $subject, $message, $headers)) {
    echo "<p style='color:green;'>✅ Test email sent successfully to $to</p>";
} else {
    echo "<p style='color:red;'>❌ Failed to send email. Check server configuration.</p>";
}
?>