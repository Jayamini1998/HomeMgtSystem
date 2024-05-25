<!DOCTYPE html>
<html>
<head>
    <title>Service Provider Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .profile-details {
            margin-top: 30px;
        }
        .profile-details p {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profile</h1>
        <?php
        // Establish a database connection (Replace with your own credentials)
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = '';
        $dbName = 'my_db';

        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the user ID from the URL parameter
        $userId = $_GET['user_id'];

        // Query the database to fetch the user's profile details
        $sql = "SELECT * FROM serviceprovider WHERE idsp = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Display the user's profile details
            echo "<div class='profile-details'>";
            echo "<p><strong>ID:            </strong> " . $row['idsp'] . "</p>";
            echo "<p><strong>Name          :</strong> " . $row['name'] . "</p>";
            echo "<p><strong>Contact Number:</strong> " . $row['contactNo'] . "</p>";
            echo "<p><strong>Email         :</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Address Line 1:</strong> " . $row['addressLine1'] . "</p>";
            echo "<p><strong>Address Line 2:</strong> " . $row['addressLine2'] . "</p>";
            echo "<p><strong>City          :</strong> " . $row['city'] . "</p>";
            echo "<p><strong>Description   :</strong> " . $row['addDescription'] . "</p>";
            echo "<p><strong>Profession    :</strong> " . $row['profession'] . "</p>";
            // Add more fields as needed
            echo "</div>";
        } else {
            echo "<p>User not found</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
