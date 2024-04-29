<?php
// Database connection parameters
//print_r($_GET);
$servername = "database-test.cbaa242mwb6t.us-east-1.rds.amazonaws.com";
$dbUsername = "myuser"; // Replace with your database username
$dbPassword = "mypassword"; // Replace with your database password
$database = "325_app";

// Retrieve username from request
$username = isset($_GET['username']) ? $_GET['username']: '';

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Prepare SQL statement to check if the username exists in the database
$sql = "SELECT * FROM isPicked WHERE username = '$username'";

// Execute SQL statement
$result = $conn->query($sql);

// Check if the username exists in the database
if ($result->num_rows > 0) {
    // Username exists
    echo "true";
} else {
    // Username does not exist
    echo "false";
}

// Close connection
$conn->close();
?>
