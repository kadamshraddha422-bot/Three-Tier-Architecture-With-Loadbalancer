<?php
// Database connection settings
$servername = "rds end point";
$username = "root";        // Change this if you have a different DB username
$password = "rutika123";            // Change this if your DB has a password
$dbname = "facebook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize form data
$name = $conn->real_escape_string($_POST['name']);
$city = $conn->real_escape_string($_POST['city']);

// Insert into database
$sql = "INSERT INTO users (name, city) VALUES ('$name', '$city')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>