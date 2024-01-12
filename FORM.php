<?php
// Get the form data
$Firstname = $_POST['Fname'];
$Lastname = $_POST['Lname'];
$Age = $_POST['Age'];
$Gender = $_POST['Gender'];
$Address = $_POST['Address'];
$EmailAddress = $_POST['EmailAddress'];

require 'config.php';

// Check if the connection was successful
if (!$conn) {
die("Connection failed: ". mysqli_connect_error());
}

// Prepare the SQL statement to insert the user data
$sql = "INSERT INTO form (Fname, Lname, Age, Gender, Address, EmailAddress) VALUES ( '$Firstname','$Lastname', '$Age', '$Gender', '$Address', '$EmailAddress')";
// Execute the SQL statement
if (mysqli_query($conn, $sql)) {

	echo '<script lnanguage="javascript"> alert ("Your data has been submitted");location.href="sidebar.php#biodata";</script>';
	
	
}
 else {
     echo "Error: ". $sql . "<br>". mysqli_error($conn);

 }

// Close the database connection
mysqli_close($conn);
 

?>