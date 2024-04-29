<?php
function authenticateUser($username, $password) {
    // Database connection parameters
    $servername = "127.0.0.1";
    $dbusername = "ws_user";
    $dbpassword = "ws_user_123";
    $dbname = "mysqldb";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to select count of rows with provided username and password
    $sql = "SELECT COUNT(*) as count FROM customer_db WHERE username = '$username' AND pwd = '$password'";
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        $data="true";
    } else {
        $data = "false";
    }
    echo json_encode($data);

    // Close connection
    $conn->close();
}
?>
