<?php
$host = 'localhost'; // or your host
$dbName = 'g2f_connect';
$username = 'root'; // your database username
$password = ''; // your database password

// Create connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you're storing images in a directory called 'uploads'
$targetDir = "./admin/uploads";
$targetFile = $targetDir . basename($_FILES["productImage"]["name"]);
move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile);

$name = $_POST['productName'];
$price = $_POST['productPrice'];
$description = $_POST['productDescription'];
$imageUrl = $targetFile;

$sql = "INSERT INTO products (name, price, description, image_url) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $price, $description, $imageUrl);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
