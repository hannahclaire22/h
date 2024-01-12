<?php
// Include the config.php file for the database connection
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetching the email entered in the forgot_password.php form
    $email = $_POST['email'];

    // Checking if the email exists in the login table
    $sql = "SELECT * FROM login WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email exists, send reset link
        // Generate a unique token, store it in the database, and send the email
        $ticket = bin2hex(random_bytes(32));

        // Storing the token and associated email in the database
        $sql = "INSERT INTO forgot_password (email, ticket, used) VALUES ('$email', '$ticket', 0)";
        $conn->query($sql);

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Enable verbose debug output
            $mail->SMTPDebug = 0;  // Set it to 2 for detailed debug information

            // Set mailer to use SMTP
            $mail->isSMTP();

            // Specify the SMTP server credentials
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            $mail->Username = 'guapzpito@gmail.com';
            $mail->Password = 'csttdvolnlevgcok';

            // Set the "From" address and name
            $mail->setFrom('guapzpito@gmail.com', 'Your Name');

            // Set the "To" address and name
            $mail->addAddress($email);

            // Set email subject and body
            $mail->Subject = 'Reset Your Password';
            $mail->Body = "Click the following link to reset your password:\n\n";
            $mail->Body .= "http://twoman.epizy.com/reset_password.php?ticket=$ticket";

            // Send the email
            $mail->send();

            echo '<script>alert("An email with a password reset link has been sent to your email address.");</script>';
        } catch (Exception $e) {
            echo '<script>alert("Email could not be sent. Error: '.$mail->ErrorInfo.'");</script>';
        }
    } else {
        // Email does not exist in the login table
        echo '<script>alert("Email not found. Please enter a valid email address.");</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="logo.PNG" type="image/icon">
    <link rel="stylesheet" href="css/form.css">
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <div id="container">
    <h2>Forgot Password</h2>
    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input id="input" type="email" name="email" placeholder="Enter your email" required>
        <button id="submit" type="submit">Send Reset Link</button>
    </form>
    </div>
</body>
</html>
