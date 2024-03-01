<?php
// Include database connection
include_once 'db_connect.php';

// Fetch farmers data
$sql = "SELECT * FROM users"; // Adjust the table name if different
$result = mysqli_query($conn, $sql);
$farmers = [];

while($row = mysqli_fetch_assoc($result)) {
    $farmers[] = $row;
}

// Close connection
mysqli_close($conn);

// Output the data in JSON format
header('Content-Type: application/json');
echo json_encode($farmers);
?>
