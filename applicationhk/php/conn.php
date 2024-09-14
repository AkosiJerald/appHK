<?php
$host = "localhost";
//Here, use the details for your own database and user
$username = "id21994398_jerald";
$password = "@Jerald04";
$database = "id21994398_dbhk";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>