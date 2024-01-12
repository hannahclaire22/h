
<?php
// database connection parameters
require 'config.php';

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete query
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // prevent SQL injection attacks using prepared statements
    $stmt = $conn->prepare("DELETE FROM form WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('Location:sidebar.php#registered');
    } else {
        echo "<script>alert('invalid: " . $conn->error . "'); location.href='sidebar.php#registered';</script>";
    }

    $stmt->close();
}
    echo "<script>window.history.replaceState(null, null, window.location.href);</script>";
?>