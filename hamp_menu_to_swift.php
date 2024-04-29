<?php
//p simple code
$servername = "127.0.0.1";
$username = "ws_user";
$password = "ws_user_123";
$database = "mysqldb";

// make connection
$conn = new mysqli($servername, $username, $password, $database);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Gets the table, puts it into an array
$sql = "SELECT * FROM hamp_dc";
$result = $conn->query($sql);

$data = array();

//makes data sendable to the app
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "0 results";
}

//closes
$conn->close();
?>
