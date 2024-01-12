<?php
// Database connection parameters
require 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the "Show All Data" button is clicked
if (isset($_POST['showAll'])) {
    // Query to select all data from the table
    $sql = "SELECT * FROM form";
} else {
    // Check if the form is submitted and the search value is provided
    if (isset($_POST['search']) && !empty($_POST['search'])) {
        // Get the search value and sanitize it
        $searchValue = $_POST['search'];
        $searchValue = $conn->real_escape_string($searchValue);

        // Get the selected column and sanitize it
        $column = $_POST['column'];
        $column = $conn->real_escape_string($column);

        // Query to select data from the table based on the search criteria
        $sql = "SELECT * FROM form WHERE $column LIKE '%$searchValue%'";
    } else {
        // Query to select all data from the table
        $sql = "SELECT * FROM form";
    }
    header("location:sidebar.php#logic");
}

// Execute the query
$result = $conn->query($sql);

// Close connection
$conn->close();
?>
