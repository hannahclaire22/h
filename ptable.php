<?php
    require 'config.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Select data from a table
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    // Display data in a table
    if ($result->num_rows > 0) {
        echo"<style>
                body  {
                    margin:0px;
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                    color:white;
                }

                th, td {
                    padding: 8px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }

                th {
                    background-color: #e8e8e8;
                    color:black;
                }
            </style>";
        echo "<table><tr><th>ID</th><th>Product Name</th><th>Quantiy</th><th>Price</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["quantity"]."</td><td>".$row["price"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
?>