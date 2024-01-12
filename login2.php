<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the email from the form
    $email = $_POST['email'];

    // Prepare the statement
    $stmt = $conn->prepare("SELECT names FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($name);

    // Fetch the result
    if ($stmt->fetch()) {
        $_SESSION['name'] = $name; // Store the user's name in a session variable
        header("Location:room_for_booking.php"); // Redirect to the welcome page
        exit();
    } else {
        echo "Email not found.";
    }

    $stmt->close();
    $conn->close();
}
?>


    <div class="container">
        <div class="box">
            <menu></menu>
        </div>
    </div>
    <div class="wrapper">
        <div class="FORM-box login">
            <h1>SIGN IN FOR BOOKING</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="input-box">
                    <label>Email</label>
                    <input type="email" required name="email">
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" required name="password">
                </div>
               
                <button type="submit" class="btn" name="login">Login</button>
                <div class="remember-forgot">
                    <input type="checkbox" name="remember">Remember
                    <a href="#">Forgot password</a>
                </div>
                <div class="register-link">
                    <p>Don't have an account? <a href="signupforuser.php">SIGN UP</a></p>
                </div>
               <button> <a href="index.html">BACK</a></button>
            </form>
        </div>
    </div>

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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind the SQL statement to select the user with the entered email and password
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();

    // Check if a row is returned
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        // Login successful
        echo "Login successful. Redirecting to the dashboard...";
        // Redirect to room.php
        header("Location: booking.php");
        exit(); // Terminate the current script
    } else {
        // Login failed
        echo "Invalid email or password. Please try again.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
</body>
</html>