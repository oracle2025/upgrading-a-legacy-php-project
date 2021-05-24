<?php
$servername = "mysql1";
$database = "database";
$username = "root";
$password = "123456";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// check if db exists, if not create and init

mysqli_close($conn);

?>