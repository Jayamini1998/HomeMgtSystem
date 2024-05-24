<?php

// Get data from the form
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$adder1 = $_POST['adder1'];
$adder2 = $_POST['adder2'];
$city = $_POST['city'];
$descr = $_POST['descr'];
$password = $_POST["password"];
$profession = $_POST['profession'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Create a connection
$conn = new mysqli('localhost', 'root', '', 'my_db');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO serviceProvider (name, contactNo, email, addressLine1, addressLine2, city, addDescription, password, profession) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $contact, $email, $adder1, $adder2, $city, $descr, $hashed_password, $profession);
    
    if ($stmt->execute()) {
        echo "Submit successful...";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
