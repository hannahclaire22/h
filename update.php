<?php
// Get the form data
$id = $_POST['id'];
$Firstname = $_POST['Fname'];
$Lastname = $_POST['Lname'];
$Age = $_POST['Age'];
$Gender = $_POST['Gender'];
$Address = $_POST['Address'];
$EmailAddress = $_POST['EmailAddress'];

require 'config.php';

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

// Check if the id exists in the database
$idQuery = "SELECT id FROM form WHERE id = $id";
$result = $conn->query($idQuery);

if ($result->num_rows === 0) {
    echo '<script language="javascript">alert("id does not exist"); location.href="sidebar.php#registered";</script>';
} else {
    $sql = "UPDATE form 
            SET `Fname` = '$Firstname', 
                `Lname` = '$Lastname', 
                `Age` = '$Age', 
                `Gender` = '$Gender', 
                `Address` = '$Address', 
                `EmailAddress` = '$EmailAddress' 
            WHERE `id` = $id";

    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("The data has been updated"); location.href="sidebar.php#registered";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
echo "<script>window.history.replaceState(null, null, window.location.href);</script>";
?>


