<?php
$servername = "127.0.0.1";
$username = "ws_user";
$password = "ws_user_123";
$dbname = "mysqldb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//print_r($_POST);
if(isset($_POST["username"]) && isset($_POST["password"])) {
    // Get username and password from the request
    $usernam = $_POST["username"];
    $passwor = $_POST["password"];
    
    // Debugging: Print received username and password
    //echo "Received Username: " . $usernam . "<br>";
    //echo "Received Password: " . $passwor . "<br>";
}
// SQL query to check if username and password exist in the database
$sql = "SELECT * FROM dasher_db WHERE email='$usernam' AND pwd='$passwor'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Username and password match, login successful
    echo "success";
} else {
    // Username or password incorrect, login failed
    echo "failure";
}
//
// Close connection
$conn->close();
?>
