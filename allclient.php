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
          
        </li>
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
   






       

        <div class="profile-details">
            <img src="profile.jpg" alt="">
            <span class="admin_name"><?php echo isset($adminFirstName) ? $adminFirstName : 'HIRWA'; ?></span>
            
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
          <div class="recent-sales box" style="width=100%">
        
            <div class="sales-details">


              
            </div>
 <!----------------php code------------>
 <p style="margin-left:400px ;color:blue; font-size:30px"  > ALL CLIENTS  </P>
            
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

// Handle client deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $clientIdToDelete = $_POST['delete'];
    $deleteSql = "DELETE FROM clients WHERE clientid = $clientIdToDelete";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Client deleted successfully.";
    } else {
        echo "Error deleting client: " . $conn->error;
    }
}

// Retrieve the registered room information from the database
$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>
            <table border=3 width=100% >
              <tr>
                <th>CLIENT ID</th>
                <th>EMAIL</th>
              
                <th>CHECK IN DATE</th> 
                <th>CHECK OUT DATE</th> 
                <th>NUMBER OF GUESTS</th> 
                <th>ROOM NAME</th> 
                <th>Action</th>
              </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
               <td>".$row['clientid']."</td>
               <td>".$row['email']."</td>
             
               <td>".$row['check_in_date']."</td> 
               <td>".$row['check_out_date']."</td> 
               <td>".$row['num_guests']."</td> 
               <td>".$row['room_name']."</td> 
               <td>
                   <button type='submit' name='delete' value='".$row['clientid']."'>Delete</button>
               </td>
            </tr>";
    }

    echo "</table></form>";

} else {
    echo "No client found.";
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