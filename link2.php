<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Corrected the username
$password = "Kavi@1140";
$dbname = "my_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the POST variables are set
if(isset($_POST['customer_name'], $_POST['email'], $_POST['service'], $_POST['date'], $_POST['special_request'])){
    // Get user inputs
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $special_request = $_POST['special_request'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO Customerff (name, email, service, date, request) VALUES ('$customer_name', '$email', '$service', '$date', '$special_request')";

    if ($conn->query($sql) === TRUE) {
        echo "Data added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "One or more form fields are not set.";
}

// Close the database connection
$conn->close();
?>
