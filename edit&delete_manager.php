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

   <body><div class="sidebar">
      <div class="logo-details">
      <img src="hng.jpg" height="40px" width="40px" border-radius="100%";>
        <span class="logo_name">HIRWA hotel</span>
      </div>
        <ul class="nav-links">
          <li>
            <a href="DASHBOARD_manager.php" >
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
         
        
          <li>
            
              <i class='bx bxs-user'>
             
              <div class="dropdown">  <span class="links_name">clients</span>

              <div class="dropdown-content">
                
                <a href="allclient_manager.php"> All client</a>
              </div></div></i>
            
          </li>
          <li>
            
            <i class='bx bxs-user'>
           
            <div class="dropdown">  <span class="links_name">users</span>

            <div class="dropdown-content">
              
              <a href="user_manager.php"> All user</a>
            </div></div></i>
          
        </li>
          <li>


           
             <i style="margin-right: 30px;" class='bx bx-bed'>
     
             <div class="dropdown"> <span class="links_name">rooms</span>
            
                    <div class="dropdown-content">
                      <a href="totalrooms_manager.php" >Total</a>
                      <a href="bookedroom_manager.php" >Booked </a>
                      <a href="availableroom_manager.php"> Available</a>
                      <a href="edit&delete_manager.php" class="active">Edit & Delete</a>
                      <a href="addroom_manager.php" >Add </a>
                    
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
      
    
      <div class="profile-details">
      <i class='bx bxs-user-circle'></i>
        <span class="admin_name"></span>
       
        <?php
              session_start();

                   if(isset($_SESSION['name'])){
                      $name = $_SESSION['name'];
                        echo " " . $name . "";
                              }
                      else{
                           header("Location: sign.php"); // Redirect to the sign-in page if the user is not authenticated
                              exit();
                            }
         ?>

      </div>
    </nav>

    

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
          
            

          <?php
// Assuming you have a MySQL database, you need to provide the database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the action is to delete a room
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['roomid'])) {
    $roomIdToDelete = $_GET['roomid'];

    // Deleting the room
    $sql = "DELETE FROM rooms WHERE roomid=$roomIdToDelete";

    if ($conn->query($sql) === TRUE) {
        echo "Room deleted successfully.";
    } else {
        echo "Error deleting room: " . $conn->error;
    }
}

// Check if the form is submitted for updating a room
if (isset($_POST['updateRoom'])) {
    // Updating the room information
    $roomId = $_POST['roomId'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $beds = $_POST['beds'];

    $sql = "UPDATE rooms SET name='$name', category='$category', price='$price', beds='$beds' WHERE roomid=$roomId";

    if ($conn->query($sql) === TRUE) {
        echo "Room information updated successfully.";
    } else {
        echo "Error updating room information: " . $conn->error;
    }
}

// Retrieve the registered room information from the database
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=3 width=100% >
    <tr>
        <th>ROOM NAME</th>
        <th>CATEGORY</th>
        <th>PRICE</th>
        <th>SIZE</th>
        <th>ACTION</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <form method='POST' action=''>
                <input type='hidden' name='roomId' value='" . $row['roomid'] . "'>
                <td><input type='text' name='name' value='" . $row['name'] . "'></td>
                <td><input type='text' name='category' value='" . $row['category'] . "'></td>
                <td><input type='text' name='price' value='" . $row['price'] . "'></td>
                <td><input type='text' name='beds' value='" . $row['beds'] . "'></td>
                <td>
                    <input type='submit' name='updateRoom' value='Update'>
                </td>
            </form>
            <td>
                <a href='?action=delete&roomid=" . $row['roomid'] . "'>Delete</a>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No registered rooms found.";
}

// Close the database connection
$conn->close();
?>

    
    
    
                  

              
            
           
           
          
          



  

        
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