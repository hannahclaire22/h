<?php

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //SMTP configuration

    $smtp_username = "guapzpito@gmail.com";
    $smtp_password = "csttdvolnlevgcok"; 
    $smtp_host = "smtp.gmail.com";
    $smtp_port="587";

    //Create a new PHPMailer instance

    $mail = new PHPMailer(true);

    //SMTP configuration

    $mail->isSMTP(); 
    $mail->Host = $smtp_host;
    $mail->SMTPAuth = true;
    $mail->Username= $smtp_username; 
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = $smtp_port;

    //Email Content

    $mail->setFrom($smtp_username, "Kyle");
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
        $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
    }

    try{
        $mail->send();
        echo "<script>alert('Email sent successfully.'); window.location.href = 'sidebar.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send email: ".$mail->ErrorInfo."'); window.location.href = 'sidebar.php#dynamic';</script>";
    }

}
?>