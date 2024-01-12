<?php
// Assuming you have a MySQL database, you need to provide the database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Hotel";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the email from the query parameter
$email = $_GET["email"];

// Delete the information from the database
$sql = "DELETE FROM managers WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
    echo "Information deleted successfully.";
} else {
    echo "Error deleting information: " . $conn->error;
}

// Close the database connection
$conn->close();
?>