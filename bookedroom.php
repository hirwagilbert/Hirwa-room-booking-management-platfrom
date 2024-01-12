<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard </title>
    <link rel="stylesheet" href="admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<!----dropdown content-- css----><style>
        .dropdown {
          position: relative;
          display: inline-block;
        }
        
        .dropdown-content {
          width: 400px;
          display: none;
          position: absolute;
          background-color:white;
          min-width: 16px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
          border-radius: 20PX;
        }
        
        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }
        
        .dropdown:hover .dropdown-content {
          display: block;
        }
      </style>
      <!----------end of drop css------->

   <body>

   <div class="sidebar">
      <div class="logo-details">
      <img src="hng.jpg" height="40px" width="40px" border-radius="100%";>
        <span class="logo_name">HIRWA hotel</span>
      </div>
        <ul class="nav-links">
          <li>
            <a href="DASHBOARDadmin.php" >
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
          <li>
          
            <i class='bx bxs-user-rectangle' >
              <div class="dropdown">    <span class="links_name">Managers</span>
              <div class="dropdown-content">
                <a href="addmanager.php">Add managers</a>
                <a href="blockmanager.php">Block & unblock</a>
                <a href="add&delete&edit.php"> Delete & edit </a>
               
                <a href="allmanager.php"> All managers</a>
              </div></div></i>
          </li> 
        
          <li>
            
            <i class='bx bxs-user'>
           
            <div class="dropdown">  <span class="links_name">clients</span>

            <div class="dropdown-content">
            
              <a href="Allclient.php" class="active"> All client</a>
            </div></div></i>
          
        </li></br>
        <li>
          
            <i class='bx bxs-user'>
           
            <div class="dropdown">  <span class="links_name">Users</span>

            <div class="dropdown-content">
            
              <a href="user.php"> All users</a>
            </div></div></i>
          
        </li>
          <li>
           
             <i style="margin-right: 30px;" class='bx bx-bed'>
     
             <div class="dropdown"> <span class="links_name">rooms</span>
            
                    <div class="dropdown-content">
                      <a href="allroom.php" class="active">Total</a>
                      <a href="bookedroom.php">Booked </a>
                      <a href="availableroom.php"> Available</a>
                      <a href="delete&editroom.php">Edit & Delete</a>
                      <a href="addroom.php" >Add </a>
                    
                    </div></div></i>
            
          </li><LI>
         <a href="#">
              <i class='bx bx-cog' >
              <span class="links_name">Setting</span></i>
            </a>
          </li>
          <li class="log_out">
            <a href="logout.php">
              <i class='bx bx-log-out'></i>
              <span class="links_name">Log out</span>
            </a>
          </li>
        </ul>
    </div>


    <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
    <?php
// Database connection code
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the email and password match in the admin table
    $sql = "SELECT Firstname FROM admin WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User is authenticated, fetch and display the first name
        $row = $result->fetch_assoc();
        $adminFirstName = $row['Firstname'];
    } else {
        // Authentication failed
        $adminFirstName = "Unknown";
    }
}

// Close the connection
$conn->close();
?>


        <!-- ... other navigation elements ... -->

        <div class="profile-details">
            <img src="profile.jpg" alt="">
            <span class="admin_name"><?php echo isset($adminFirstName) ? $adminFirstName : 'Guest'; ?></span>
            
        </div>
    </nav>

<!-- ... rest of your HTML ... -->







  
     
     
    

    <?php
// Database connection code (similar to the previous example)
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

// Retrieve the total number of rooms from the 'rooms' table
$sqlCount = "SELECT COUNT(*) AS total_rooms FROM rooms";
$resultCount = $conn->query($sqlCount);

if ($resultCount->num_rows > 0) {
    $rowCount = $resultCount->fetch_assoc();
    $totalRooms = $rowCount['total_rooms'];
} else {
    $totalRooms = 0; // Default value if no data is found
}

// Close the connection
$conn->close();
?>
<div class="home-content">
<div class="overview-boxes">
    <div class="box">
        <div class="right-side">
            <div class="box-topic">Total rooms</div>
            <div class="number"><?php echo $totalRooms; ?></div>
            
           
        </div>
    </div>
  



    <?php
// Database connection code
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

// Count the number of booked rooms based on matching room names
$sqlCountBookedRooms = "SELECT COUNT(DISTINCT clients.room_name) AS booked_rooms
                        FROM clients
                        INNER JOIN rooms ON clients.room_name = rooms.name";

$resultCountBookedRooms = $conn->query($sqlCountBookedRooms);

if ($resultCountBookedRooms->num_rows > 0) {
    $rowBookedRooms = $resultCountBookedRooms->fetch_assoc();
    $bookedRoomsCount = $rowBookedRooms['booked_rooms'];
} else {
    $bookedRoomsCount = 0; // Default value if no booked rooms are found
}

// Close the connection
$conn->close();
?>

<div class="box">
    <div class="right-side">
        <div class="box-topic">Rooms Booked</div>
        <div class="number"><?php echo $bookedRoomsCount; ?></div>
        <div class="indicator">
            <box-icon type='solid' name='bed'></box-icon>
            <box-icon name='bed'></box-icon>
        </div>
    </div>
</div>

    
    
      

          
         
<?php
// Database connection code
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

// Count the number of available rooms based on non-matching room names
$sqlCountAvailableRooms = "SELECT COUNT(rooms.name) AS available_rooms
                           FROM rooms
                           LEFT JOIN clients ON rooms.name = clients.room_name
                           WHERE clients.room_name IS NULL";

$resultCountAvailableRooms = $conn->query($sqlCountAvailableRooms);

if ($resultCountAvailableRooms->num_rows > 0) {
    $rowAvailableRooms = $resultCountAvailableRooms->fetch_assoc();
    $availableRoomsCount = $rowAvailableRooms['available_rooms'];
} else {
    $availableRoomsCount = 0; // Default value if no available rooms are found
}

// Close the connection
$conn->close();
?>

<div class="box">
    <div class="right-side">
        <div class="box-topic">Available Rooms</div>
        <div class="number"><?php echo $availableRoomsCount; ?></div>
        <div class="indicator">
            <!-- Add your indicator icons or elements here if needed -->
        </div>
    </div>
</div>            
        
</div>


       
        <div class="sales-boxes">
          <div class="recent-sales box">
            <p align="center " style="color: blue;">BOOKED ROOM</p>
            <div class="sales-details">  </div>

            <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT DISTINCT clients.email, rooms.* FROM clients JOIN rooms ON clients.room_name = rooms.name";
    
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table border=3 width=100%>";
        echo "<tr>";
        echo "<th>Email FOR CLIENT</th>";
        echo "<th>Room ID</th>";
        echo "<th>Room Name</th>";
        echo "<th>Category</th>";
        echo "<th>Size</th>";
        
        // Add other table headers as needed
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['roomid'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['beds'] . "</td>";
            // Add other table cells as needed
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found.";
    }

    // Close the database connection
    $conn->close();
?>
           
          </div>
          



  

       
      </div>
    </div>
  </section>

        
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>