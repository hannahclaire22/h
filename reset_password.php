<?php
// Include the config.php file for the database connection
require_once 'config.php';

// Fetching the token from the URL
$ticket = $_GET['ticket'];

$sql = "SELECT email FROM forgot_password WHERE ticket='$ticket' AND used = 0 AND TIMESTAMPDIFF(HOUR, created_at, NOW()) <= 1";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    
    // Password reset form
    echo '
        <html>
        <head>
            <title>Reset Password</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="logo.PNG" type="image/icon">
            <link rel="stylesheet" href="css/form.css">
        </head>
        <body>
        <div id="container">
        <h2>Reset Password</h2>';
    echo '<form id="form" method="post" action="update_password.php">';
    echo '<input id="input" type="hidden" name="email" value="'.$email.'">';
    echo '<input id="input" type="password" name="password" placeholder="Enter your new password" required><br>';
    echo '<input id="input" type="password" name="confirm_password" placeholder="Confirm your new password" required><br>';
    echo '<button id="submit" type="submit">Reset Password</button>';
    echo '</form>';
    echo '
        </div>
        </body>
        </html>';

} else {
    // Invalid token
    echo '<script>alert("Invalid ticket.");</script>';
}
?>
