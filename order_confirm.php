<?php
// Retrieve username from request
$usernameParam = $_GET['username'];

// Database connection parameters
$servername = "database-test.cbaa242mwb6t.us-east-1.rds.amazonaws.com";
$dbUsername = "myuser"; // Rename the variable to avoid conflict
$dbPassword = "mypassword";
$database = "325_app";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Prepare SQL statement
$sql = "INSERT INTO isPicked (username) VALUES ('$usernameParam')"; // Explicitly specify the column name

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
