<?php

// Get data from the form
$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$service = $_POST['service'];
$date = $_POST['date'];
$location = $_POST['location'];
$special_request = $_POST['special_request'];

// Create a connection
$conn = new mysqli('localhost', 'root', '', 'my_db');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO serviceCs (name, email, service, date, location, request) VALUES (?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssssss", $customer_name, $email, $service, $date, $location, $special_request);
    
    if ($stmt->execute()) {
        echo "Submit successful...";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
