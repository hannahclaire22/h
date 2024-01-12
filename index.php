<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the hashed password from the database based on the username
    $query = "SELECT * FROM login WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verify the password using the hash function (SHA3-256)
        if (hash('sha3-256', $password) === $hashed_password) {
            $_SESSION['username'] = $username;
            header('Location: sidebar.php');
            exit();
        }
    }

    echo '<script>alert("Invalid username or password");</script>';
}

if (isset($_SESSION['username'])) {
    header('Location: sidebar.php');
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="logo.PNG" type="image/icon">
    <link rel="stylesheet" href="css/form.css">
    <style>
    </style>
</head>
<body>
    <div id="container">
    <form id="form" method="post" action="">
        <h2>Login</h2>
        <input id="input" type="text" placeholder="Username" name="username" required><br>
        <input id="input" type="password" placeholder="Password" name="password" required><br>
        <input id="submit" type="submit" value="Login">
        <a href="forgot_password.php">Forgot Password?</a><br>
        <a href="register.html">Register</a>
    </form>
    </div>
</body>
</html>
