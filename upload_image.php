<?php
// Database connection parameters
$servername = "your_database_host";
$username = "your_database_username";
$password = "your_database_password";
$database = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive POST data
$username = $_POST['username'];
$image = $_FILES['image']['tmp_name'];

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO user_images (username, image) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $image);

// Execute SQL statement
if ($stmt->execute()) {
    echo "Image uploaded successfully";
} else {
    echo "Error uploading image: " . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
