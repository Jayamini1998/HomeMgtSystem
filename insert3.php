<?php

// Function to fetch the hashed password from the database based on the user's email
function fetch_hashed_password_from_database($email) {
    // Create a database connection
    $conn = new mysqli("localhost", "root", "", "my_db");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a SQL query to retrieve the hashed password
    $stmt = $conn->prepare("SELECT password FROM serviceprovider WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Close the database connection
    $stmt->close();
    $conn->close();

    return $hashed_password;
}

$email = $_POST["email"];
$password = $_POST["password"]; // Get the user's password from the login form

// Retrieve the hashed password from the database
$hashed_password_from_db = fetch_hashed_password_from_database($email); // Implement this function to retrieve the hashed password

// Verify the entered password against the hashed password from the database
if (password_verify($password, $hashed_password_from_db)) {
    // Password is correct, start a session and store user data
    session_start();
    $_SESSION["email"] = $email;

    // Redirect to a user dashboard or another page after successful login
    header("Location: Electrical Services.html"); // Replace "dashboard.php" with the desired page
    exit();
} else {
    // Password is incorrect, display an error message
    echo "Incorrect password. Please try again.";
}
?>
