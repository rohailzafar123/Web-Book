<?php

 include 'connection.php';

//sql to create table for list
$sql = "CREATE TABLE data (
id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
date_posted VARCHAR(30) NOT NULL,
time_posted TIME NOT NULL,
sensor_id TEXT NOT NULL,
result TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table data created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


?>