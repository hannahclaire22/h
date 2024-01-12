<?php
// Include the config.php file for the database connection
require_once 'config.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Fetching the email and password from the form
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Checking if the passwords match
if ($password === $confirm_password) {
    // Hash the password using SHA3-256 algorithm
    $hashedPassword = hash('sha3-256', $password);

    // Updating the hashed password in the login table
    $sql = "UPDATE login SET password='$hashedPassword' WHERE email='$email'";
    $conn->query($sql);

    // Deleting the token from the forgot_password table
    $sql = "UPDATE forgot_password SET used = 1 WHERE email = '$email'";
    $conn->query($sql);


    echo '<script>alert("Password reset successful. You can now login with your new password.");location.href="index.php";</script>';
} else {
    // Passwords do not match
    echo '<script>alert("Passwords do not match. Please try again.");location.href="reset_password.php?ticket='.$ticket.'";</script>';
}
?>
