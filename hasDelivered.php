<?php

// Database connection parameters
$servername = "database-test.cbaa242mwb6t.us-east-1.rds.amazonaws.com";
$dbusername = "myuser";
$dbpassword = "mypassword";
$database = "325_app";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the required fields are set
if(isset($_POST['username'])) {
    // Retrieve POST data
    $username = $_POST['username'];
} else {
    echo "Error: One or more required fields are missing";
}
    // Prepare SQL statement to insert into the isPicked table
    $sql = "INSERT INTO hasDelivered (username) VALUES ('$username')";
    $result = $conn->query($sql);
    // Execute SQL statement
    if ($result === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


// Close connection
$conn->close();
?>
