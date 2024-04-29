<?php
    // Database connection parameters
$servername = "database-test.cbaa242mwb6t.us-east-1.rds.amazonaws.com";
$dbUsername = "myuser"; // Replace with your database username
$dbPassword = "mypassword"; // Replace with your database password
$database = "325_app";
    
    // Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $database);
    
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
    // Retrieve POST data
    $username = $_POST['username'];
    $dhall = $_POST['dc_food'];
    $dropoff = $_POST['loco'];
// Check if all required keys are set in $_POST
if(isset($_POST['username'], $_POST['dc_food'], $_POST['loco'])) {
    // Retrieve POST data
    $username = $_POST['username'];
    $dhall = $_POST['dc_food'];
    $dropoff = $_POST['loco'];
}
    
    // Prepare SQL statement to insert order into the database
    $sql = "INSERT INTO list_of_orders (username, dininghall, dropoff) VALUES ('$username', '$dhall', '$dropoff')";
    
    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Order inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
?>
