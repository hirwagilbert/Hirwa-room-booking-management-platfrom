
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Add more styles as needed */

</style>














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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the edited information from the form
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $idCard = $_POST["idCard"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $dateOfBirth = $_POST["dateOfBirth"];

    // Update the information in the database
    $sql = "UPDATE managers SET fName='$fName', lName='$lName', idCard='$idCard', phone='$phone', gender='$gender', dateOfBirth='$dateOfBirth' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Information updated successfully.";
    } else {
        echo "Error updating information: " . $conn->error;
    }
}

// Retrieve the email from the query parameter
$email = isset($_GET["email"]) ? $_GET["email"] : '';

// Retrieve the information for the specified email
$sql = "SELECT * FROM managers WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the form with pre-filled values
    $row = $result->fetch_assoc();
    ?>

    <h2>Edit Information</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?email=' . $email; ?>">
        <label for="fName">First Name:</label>
        <input type="text" name="fName" value="<?php echo $row['fName']; ?>"><br>
        <label for="lName">Last Name:</label>
        <input type="text" name="lName" value="<?php echo $row['lName']; ?>"><br>
        <label for="idCard">ID Card:</label>
        <input type="text" name="idCard" value="<?php echo $row['idCard']; ?>"><br>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br>
        <label for="gender">Gender:</label>
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br>
        <label for="dateOfBirth">Date of Birth:</label>
        <input type="text" name="dateOfBirth" value="<?php echo $row['dateOfBirth']; ?>"><br>
        <input type="submit" value="Update">


        <a href="add&delete&edit.php" style="font- size: 30px;"><i class='bx bxs-left-arrow-circle' ></i>back</a>
    </form>

    <?php
} else {
    echo "No information found for the specified email.";
}

// Close the database connection
$conn->close();
?>