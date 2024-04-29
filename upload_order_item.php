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

// Retrieve username and food item from request
if(isset($_POST['username']) && isset($_POST['foodItem'])){
    $username = $_POST['username'];
    $foodItem = $_POST['foodItem'];
} else {
    // Handle case where username or foodItem is not provided
    die("Error: Username or food item not provided");
}

// Prepare SQL statement to insert order item into the database
$sql = "INSERT INTO orderItems (username, food_item) VALUES ('$username', '$foodItem')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Order item uploaded successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
