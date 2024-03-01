<?php
// Include database connection
include_once 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, age, gender, county, subcounty, ward, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Sanitize and bind parameters
    $name = htmlspecialchars($_POST['name']);
    $age = (int)$_POST['age'];
    $gender = htmlspecialchars($_POST['gender']);
    $county = htmlspecialchars($_POST['county']);
    $subcounty = htmlspecialchars($_POST['subcounty']);
    $ward = htmlspecialchars($_POST['ward']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt->bind_param("sissssss", $name, $age, $gender, $county, $subcounty, $ward, $username, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
