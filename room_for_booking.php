<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>hirwa hotel room</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        

      
        <link href="indexx.css" rel="stylesheet">
    </head>

    <body style="background-color:white">
        <!-- Header Section Start -->
        <header id="header">
            <a href="index.html" class="logo"><img src="L.jpg" alt="logo"></a>
            

            <nav class="main-menu top-menu">
              <button style="color:goldenrod;height: 50px;"> <ul>
                    <li ><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT US</a></li>
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
// Adjust these database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve room information
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

?>

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
?></br><button style="background-color:red"><a href="logout.php">logout<a></button></i>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room for Booking</title>
    <style>
        .room-card {
		
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: inline-block;
        }

        .room-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .book-now-btn {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 8px;
            border-radius: 4px;
            cursor: pointer;
        }

        .room-size,
        .room-icon {
            list-style: none;
            padding: 0;
        }

        .room-size li,
        .room-icon li {
            margin: 5px 0;
        }

        .room-icon li {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #ddd;
            margin-right: 5px;
            color:black;
        }
    
    </style>
</head>
<body>

<h2 style="margin-left:450px;">ROOMS FOR HOTEL </h2>

<?php
// Check if there are rows in the result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display room information in a card
        echo "<div class='room-card'>";
        echo "<img src='uploads/" . $row['photo'] . "' alt='Room Photo'>";
        echo "<p>Name: " . $row['name'] . "</p>";
        echo "<p>Category: " . $row['category'] . "</p>";
        echo "<p>Price: $" . $row['price'] . "</p>";
        echo "<p>Beds: " . $row['beds'] . "</p>";
       

        // Additional information
        echo "<ul class='room-icon'>";
            echo "<li><i class='bx bx-wifi' ></i></li>";
            echo "<li><i class='bx bx-tv'></i></li>";
            echo "<li><i class='bx bxs-coffee'></i></li>";
            echo "<li><i class='bx bxs-shower' ></i></li>";
            echo "<li><i class='bx bx-bath'></i></li>";
            echo "<li><i class='bx bx-phone-call'></i></li>";
            echo "</ul>";

    
            echo "<a href='booking.php' class='book-now-btn'>Book Now</a>";

            
        echo "</div>";
    }


} else {
    echo "No rooms found.";
}

// Close connection
$conn->close();
?>


 <!-- Footer Section Start -->
 <footer>
            <div id="booking-section">
              <h3>Booking:</h3>
              <ul>
                <li><a href="#">Rooms</a></li>
                <li><a href="#">Prices</a></li>
                <li><a href="#">Home</a></li>
              </ul>
            </div>
            <div id="about-section">
              <h3>About Us:</h3>
              <ul>
                <li><a href="#">Location</a></li>
                <li><a href="#">Help Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Services</a></li>
              </ul>
            </div>
            <div id="contact-section">
              <h3>Contact Us:</h3>
              <div class="social">
                <a href="https://www.facebook.com">Facebook</a>
                <a href="https://www.twitter.com">Twitter</a>
                <a href="https://www.instagram.com">Instagram</a>
                <a href="mailto:info@example.com">Email</a>
                <a href="tel:+123456789">Telephone</a>
              </div>
              
            </div>
            <p align="CENTER" style="font-size: 15px; color:goldenrod;"> designed by <wolf-company>wolf</wolf-company> Copyright@2023</p>
          
          </footer>
          <!---------end of footer-------------->




</body>
</html>
