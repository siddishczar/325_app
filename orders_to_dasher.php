<?php
//p simple code
$servername = "database-test.cbaa242mwb6t.us-east-1.rds.amazonaws.com";
$username = "myuser";
$password = "mypassword";
$database = "325_app";

// make connection
$conn = new mysqli($servername, $username, $password, $database);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Gets the table, puts it into an array
$sql = "SELECT * FROM list_of_orders";
//$sql = "INSERT * woo_bk VALUES("test", "test")";
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