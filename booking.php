<!DOCTYPE html>
<html>
<head>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Hotel Room Booking</title>
  <style>
    /* CSS styling */
    body {
      font-family: Arial, sans-serif;
     
      background-color:white
    }

    .container {
      margin-top: 10px;
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 5px;
      background-color: wheat;
      border-radius: 9%;
    }

    h2 {
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 3px;
     
      cursor: pointer;
   
    }
.card {
   
}

.booking-message {
 
    color: green;
    font-size:25px;
}
   
    

  </style>
</head>
<body>



<i class='bx bxs-user' style="color:blue ;font-size:20px"><?php
session_start();

     if(isset($_SESSION['name'])){
        $name = $_SESSION['name'];
          echo " " . $name . "";
                }
        else{
             header("Location: login2.php"); // Redirect to the sign-in page if the user is not authenticated
                exit();
              }
?></br><button><a href="logout.php">logout<a></button></i>
<a href="room_for_booking.php" style="font- size: 30px;"><i class='bx bxs-left-arrow-circle' ></i>back</a>





<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkInDate = $_POST['check-in'];
    $checkOutDate = $_POST['check-out'];
    $numGuests = $_POST['guests'];
    $roomName = $_POST['room'];

    // Database connection credentials
    $servername = "localhost";
    $dbname = "Hotel";
    $dbusername = "root";
    $dbpassword = "";

    // Create a database connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email and password match within the "users" table
    $checkUserQuery = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows > 0) {
        // Email and password match, proceed with room booking

        // Check if the room name already exists in the "clients" table
        $checkRoomQuery = "SELECT * FROM clients WHERE room_name = '$roomName'";
        $result = $conn->query($checkRoomQuery);

        if ($result->num_rows > 0) {
            // Room name already exists, display an error message
            echo "The room is already booked. Please choose another room.";
        } else {
            // Room name is available, insert booking into the "clients" table
            $bookingQuery = "INSERT INTO clients (email, password, check_in_date, check_out_date, num_guests, room_name) 
                            VALUES ('$email', '$password', '$checkInDate', '$checkOutDate', '$numGuests', '$roomName')";

            if ($conn->query($bookingQuery) === TRUE) {
              echo "<div class='card'>";
             
              echo "<i class='bx bx-check booking-message'>You booked the room. The payment will be after you reach at hotel.</i>";
            } else {

                echo "Error: " . $bookingQuery . "<br>" . $conn->error;
            }
        }
    } else {
        // Email and password do not match, display an error message
        echo "Please register to book a room.";
    }

    // Close the database connection
    $conn->close();
}
?>
  <div class="container">
    <h2>Enter the following to book a room</h2>
    <form method="POST">
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" required placeholder="enter email used to sign in">

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required placeholder="enter password used to sign in">

      <label for="check-in">Check-in Date:</label>
      <input type="date" id="check-in" name="check-in" required>

      <label for="check-out">Check-out Date:</label>
      <input type="date" id="check-out" name="check-out" required>

      <label for="guests">Number of Guests:</label>
      <input type="number" id="guests" name="guests" min="1" required>

      <label for="room">Room Name:</label>
      <input type="text" id="room" name="room" required placeholder="enter the name of room you need to book">

      <input type="submit" value="Book Now">
    
    
    </form>
  

</body>
</html>