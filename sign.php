<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
<header id="header">
<link href="indexx.css" rel="stylesheet">
          <a href="index.html" class="logo"><img src="L.jpg" alt="logo"></a>
          

          <nav class="main-menu top-menu">
            <button style="color: goldenrod ;height: 50px;"> <ul>
                  <li ><a href="index.html">HOME</a></li>
                  <li><a href="about.html" class="active">ABOUT US</a></li>
                  <li class="active"><a href="room.html">ROOMS</a></li>
                  <li><a href="serviceforhotel.html">AMENITIES</a></li>
                  
                  
                  <li><a href="contact.html">CONTACT US</a></li>
             <li>  <div class="dropdown" >
            LOGIN
                <div class="dropdown-content">
                  <a href="login2.html">User</a>
                  <a href="sign.html">Admin</a>
                </div>
              </div></li></ul></button>
          </nav>
      </header>





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
    $stmt = $conn->prepare("SELECT lname FROM managers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($name);

    // Fetch the result
    if ($stmt->fetch()) {
        $_SESSION['name'] = $name; // Store the user's name in a session variable
        header("Location:dashboard_manager.php"); // Redirect to the welcome page
        exit();
    } else {
        echo "Email not found.";
    }

    $stmt->close();
    $conn->close();
}
?>


  <div class="container">
    <form class="signin-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <h2>Sign In</h2>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit">Login</button>
      <a href="#">Forgot password</a>
    </form>
  </div>

<?php
// Process form submission only after the form HTML
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Database connection
  $servername = "localhost"; // Replace with your actual credentials
  $username = "root";
  $password = "";
  $dbname = "hotel";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get input data from the form
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Prepare secure SQL queries for both tables
  $stmt_manager = $conn->prepare("SELECT * FROM managers WHERE email = ? AND password = ?");
  $stmt_admin = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");

  // Check for managers first
  $stmt_manager->bind_param("ss", $email, $password);
  $stmt_manager->execute();
  $result_manager = $stmt_manager->get_result();

  if ($result_manager->num_rows > 0) {
    // Successful login as manager
    session_start();
    $_SESSION['user'] = $email;
    header("Location: dashboard_manager.php");
  } else {
    // Check for admins
    $stmt_admin->bind_param("ss", $email, $password);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows > 0) {
      // Successful login as admin
      session_start();
      $_SESSION['user'] = $email;
      header("Location: DASHBOARDadmin.php");
    } else {
      // Invalid credentials for both
      echo "Invalid email or password. Please try again.";
    }
  }

  // Close database connections
  $stmt_manager->close();
  $stmt_admin->close();
  $conn->close();
}
?>

</body>
</html>
