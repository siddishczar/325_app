<?php

$servername = "127.0.0.1";
$username = "ws_user";
$password = "ws_user_123";
$dbname = "mysqldb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if all required parameters are set
if(isset($_POST["username"], $_POST["password"], $_POST["fname"], $_POST["lname"], $_POST["pnum"])) {
    // Get parameters from the request
    $usernam = $_POST["username"];
    $passwor = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $pnum = $_POST["pnum"];
    
    // Check if username exists
    $sql = "SELECT * FROM dasher_db WHERE email='$usernam'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "username_exists";
    } else {
        // Check if password exists
        $sql = "SELECT * FROM dasher_db WHERE pwd='$passwor'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "password_exists";
        } else {
            // Check if phone number exists
            $sql = "SELECT * FROM dasher_db WHERE pnum='$pnum'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "phone_number_exists";
            } else {
                // Insert new user.
                $sql = "INSERT INTO dasher_db (fname, lname, email, pwd, pnum) VALUES ('$fname', '$lname', '$usernam', '$passwor', '$pnum')";
                if($conn->query($sql) === TRUE){
                    echo "success";
                } else {
                    echo "error_signup";
                }
            }    
        }
    }
} else {
    echo "incorrect_parameters";
}

// Close connection
$conn->close();

?>
