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

        /*END OF DROP DOWN CSS*/


        
        /*start of add room form css*/


        .room-form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 4px;
}

.room-form h2 {
  text-align: center;
  margin-bottom: 20px;
}

.room-form form {
  display: grid;
  gap: 10px;
}

.room-form .form-group {
  display: grid;
  gap: 5px;
}

.room-form label {
  font-weight: bold;
}

.room-form input[type="file"],
.room-form input[type="text"],
.room-form input[type="number"],
.room-form select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.room-form button[type="submit"] {
  display: block;
  width: 100%;
  padding: 8px;
  border: none;
  border-radius: 4px;
  background-color: #4caf50;
  color: white;
  cursor: pointer;
}


        /*end of add room form css*/
       
      </style>
      
      <div class="sidebar">
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
            
              <a href="Allclient_manager.php" class="active"> All client</a>
            </div></div></i>
          
        </li>
        <li>
          
            <i class='bx bxs-user'>
           
            <div class="dropdown">  <span class="links_name">Users</span>

            <div class="dropdown-content">
            
              <a href="user_manager.php"> All users</a>
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

</li>
          <LI>
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
        
            <div class="sales-details">


              
            </div>
 <!----------------php code------------>


 
 <p style="margin-left:400px ;color:blue; font-size:30px"> ALL USERS </P>
            
 <?php
// Assuming you have a MySQL database, provide the database credentials
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

// Handle user actions (delete, block, unblock)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        $userIdToDelete = $_POST['delete'];
        $deleteSql = "DELETE FROM users WHERE userid = $userIdToDelete";
        if ($conn->query($deleteSql) === TRUE) {
            echo "User deleted successfully.";
        } else {
            echo "Error deleting user: " . $conn->error;
        }
    } elseif (isset($_POST['block'])) {
        $userIdToBlock = $_POST['block'];
        $blockSql = "UPDATE users SET is_blocked = 1 WHERE userid = $userIdToBlock";
        if ($conn->query($blockSql) === TRUE) {
            echo "User blocked successfully.";
        } else {
            echo "Error blocking user: " . $conn->error;
        }
    } elseif (isset($_POST['unblock'])) {
        $userIdToUnblock = $_POST['unblock'];
        $unblockSql = "UPDATE users SET is_blocked = 0 WHERE userid = $userIdToUnblock";
        if ($conn->query($unblockSql) === TRUE) {
            echo "User unblocked successfully.";
        } else {
            echo "Error unblocking user: " . $conn->error;
        }
    }
}

// Retrieve the users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Display the users in a table on user.php with actions
if ($result->num_rows > 0) {
    echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>
            <table border=1 width=900>
                <tr >
                    <th>User ID</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['userid']."</td>
                <td>".$row['names']."</td>
                <td>".$row['email']."</td>
                <td>
                    <button type='submit' name='delete' value='".$row['userid']. "'>Delete</button>
                    <button type='submit' name='block' value='".$row['userid']."'>Block</button>
                    <button type='submit' name='unblock' value='".$row['userid']."'>Unblock</button>
                </td>
              </tr>";
    }

    echo "</table></form>";
} else {
    echo "No users found.";
}

// Close the database connection
$conn->close();
?>


     <!----end of php code-------------->    
        
    
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