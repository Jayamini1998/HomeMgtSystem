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

// Get the email address for Service Provider 4 (assuming ID 10)
$sql = "SELECT email FROM serviceprovider WHERE idsp = 0021";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    echo $email;
}

// Close the database connection
$conn->close();
?>
