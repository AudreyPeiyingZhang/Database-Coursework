<?php
$servername = "localhost"; // Change if using a remote server
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "auction"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
