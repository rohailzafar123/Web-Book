<?php
$servername = "localhost";
$username = "ionwebhook";
$password = "ionwebhook";
$database = "ion_webhookDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Server Connection
mysqli_connect("localhost", "ionwebhook","ionwebhook") or die(mysqli_error()); 

//Database Connection
mysqli_select_db($conn, "ion_webhookDB") or die("Cannot connect to database"); 

/*
// Create database
$sql = "CREATE DATABASE ion_webhookDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
*/

?>