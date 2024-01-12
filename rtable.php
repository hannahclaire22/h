
<?php
// database connection parameters
require 'config.php';

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// search functionality
if (isset($_POST['search'])) {
    $search_column = $_POST['column'];
    $search_value = $_POST['searchname'];

    // query to select data from the table based on search criteria
    $sql = "SELECT * FROM form WHERE $search_column LIKE '%$search_value%'";

    // execute the query
    $result = $conn->query($sql);

    // display the data in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Gender</th><th>Address</th><th>Email Address</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Fname"] . "</td><td>" . $row["Lname"] . "</td><td>" . $row["Age"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["EmailAddress"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No data found.";
    }
} 
if (isset($_POST['showAll']))  {
    // query to select all data from the table
    $sql = "SELECT * FROM form";

    // execute the query
    $result = $conn->query($sql);

    // display the data in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Gender</th><th>Address</th><th>Email Address</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Fname"] . "</td><td>" . $row["Lname"] . "</td><td>" . $row["Age"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["EmailAddress"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No data found.";
    }
}
echo "<script>window.history.replaceState(null, null, window.location.href);</script>";
// close connection
$conn->close();
?>