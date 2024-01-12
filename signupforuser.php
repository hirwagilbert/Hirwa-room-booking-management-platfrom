<html>
<head>
<title>login
</title><link rel="stylesheet" href="login.css">
<div class="container">
   <div class="box"><menu>
        </menu></div></HEAD>
<body>
<div class="wrapper" style="height: 600px;">
<!----------php code-->
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

// Retrieve the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $names = $_POST['names'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate form data
    if ($password !== $confirmPassword) {
        die("Error: Passwords do not match");
    }
    
    // Check if the email already exists in the "Users" table
    $checkEmailQuery = "SELECT * FROM Users WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Email already exists, display an error message
        echo "The email is already taken. Please enter  another email.";
    } else {
        // Prepare and bind the SQL statement to insert the data into the table
        $stmt = $conn->prepare("INSERT INTO Users (names, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $names, $email, $password);

        if ($stmt->execute()) {
            echo "Registration successful";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

}

// Close the database connection
$conn->close();
?>
<!------------end of php code-->

    
    <DIV class="FORM-box login">
<h1>REGISTER </h1>  
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="input-box">
        <div class="input-box">

            <label> Names</label> <input type= "text" required  name="names"> </div>

      <label>  Email </label> <input type= "email" required  name="email"> </div>
             <div class="input-box">
 <label>Password</label> <input type ="password" required name="password"></div>
 
 <div class="input-box">
    <label>confirm password</label> <input type ="password" required name="confirm_password"></div>
 <button type="submit" class="btn">Register</button>
 <div class="register-link">

    <p>I arleady have account <a href="login2.php"> sign in</a>
    </p>
 </div></form></DIV>

 

</body>
</html>
