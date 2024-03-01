<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "g2f_connect";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
