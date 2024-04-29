<?php
//print_r($_GET);

// Database connection parameters
$servername = "database-test.cbaa242mwb6t.us-east-1.rds.amazonaws.com";
$dbusername = "myuser";
$password = "mypassword";
$database = "325_app";

// Create connection
$conn = new mysqli($servername, $dbusername, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username from GET parameter
if(isset($_GET['username'])){
    $username = $_GET['username'];
} else {
    die("Error: Username parameter is missing");
}

// Prepare SQL statement to select menu items for the given username
$sql = "SELECT food_item FROM orderItems WHERE username = '$username'";

// Execute SQL statement
$result = $conn->query($sql);

if ($result === FALSE) {
    die("Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Output data of each row
    $menuItems = [];
    while($row = $result->fetch_assoc()) {
        $menuItems[] = $row["food_item"];
    }
    echo implode(",", $menuItems);
} else {
    echo "No menu items found for username: $username";
}

// Close connection
$conn->close();
?>
