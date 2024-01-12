<?php
// Get the ID from the request parameter
$id = $_GET['id'];

// Perform database query to fetch user data based on the ID
require 'config.php';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM form WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $userData = $result->fetch_assoc();
  echo json_encode($userData);
} else {
  echo json_encode(null);
}

$conn->close();
?>
