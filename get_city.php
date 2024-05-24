<?php
// Database connection setup (Replace with your database credentials)
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'my_db';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the name with ID 10
$id = 21; // Change this to the desired ID
$sql = "SELECT city FROM serviceprovider WHERE idsp = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['city'];
    echo $name;
} else {
    echo "Name not found";
}

// Close the database connection
$conn->close();
?>
