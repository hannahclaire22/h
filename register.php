<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Check if the username or email already exists in the database
    $checkQuery = "SELECT * FROM login WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Username or email already exists
        echo '<script>alert("Username or email already exists");location.href="register.html";</script>';
        exit;
    }

    // Validate password length
    if (strlen($password) < 8) {
        echo '<script>alert("Password must be at least 8 characters long");location.href="register.html";</script>';
        exit;
    }

    // Hash the password using SHA3-256
    $hashed_password = hash('sha3-256', $password);

    // Proceed with registration if the username, email, and password length are valid
    $sql = "INSERT INTO login (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("You are now registered");location.href="index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
