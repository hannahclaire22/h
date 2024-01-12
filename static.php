<?php 

// Email information
$to = "guapzpito2@gmail.com";
$subject = "Test email from PHP";
$message = "This is a test email sent from PHP using Gmail SMTP server.";

// SMTP configuration

$smtp_username = "guapzpito@gmail.com";
$smtp_password = "pizeqwrphbnsofcd"; 
$smtp_host = "smtp.gmail.com";
$smtp_port="587";

// Create a new PHPMailer instance

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer();

// SMTP configuration

$mail->isSMTP(); 
$mail->Host = $smtp_host;
$mail->SMTPAuth = true;
$mail->Username= $smtp_username; 
$mail->Password = $smtp_password;
$mail->SMTPSecure = 'tls';
$mail->Port = $smtp_port;

// Email content

$mail->setFrom($smtp_username, "Kyle");
$mail->addAddress($to); 
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Send email.
    if(!$mail->send()) {
        echo "<script>alert('Failed to send email: ".$mail->ErrorInfo."'); window.location.href = 'sidebar.php';</script>";
    } else {
        echo "<script>alert('Email sent successfully.'); window.location.href = 'sidebar.php#static';</script>";
    }
}
?>