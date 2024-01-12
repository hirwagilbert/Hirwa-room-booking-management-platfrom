<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard </title>
    <link rel="stylesheet" href="admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            <a href="DASHBOARDadmin.php" class="active">
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
               
                <a href="allclient.php"> All client</a>
              </div></div></i>
            
          </li>
          <li>
            
              <i class='bx bxs-user'>
             
              <div class="dropdown">  <span class="links_name">users</span>

              <div class="dropdown-content">
               
                <a href="user.php"> All user</a>
              </div></div></i>
            
          </li>
          <li>
           
             <i style="margin-right: 30px;" class='bx bx-bed'>
     
             <div class="dropdown"> <span class="links_name">rooms</span>
            
                    <div class="dropdown-content">
                      <a href="allroom.php">Total</a>
                      <a href="bookedroom.php">Booked </a>
                      <a href="availableroom.php"> Available</a>
                      <a href="delete&editroom.php">Edit & Delete</a>
                      <a href="addroom.php">Add</a>
                    
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


   <!---------------php and html for home section------------------>

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
            <span class="admin_name"><?php echo isset($adminFirstName) ? $adminFirstName : 'HIRWA'; ?></span>
           
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

<!---------------end of header---------->
       




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

// Count available rooms based on non-matching room names
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

// Count booked rooms based on matching room names (similar logic as before)
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

// Count total rooms (similar logic as before)
$sqlCountTotalRooms = "SELECT COUNT(roomID) AS total_rooms FROM rooms";
$resultCountTotalRooms = $conn->query($sqlCountTotalRooms);

if ($resultCountTotalRooms->num_rows > 0) {
    $rowTotalRooms = $resultCountTotalRooms->fetch_assoc();
    $totalRoomsCount = $rowTotalRooms['total_rooms'];
} else {
    $totalRoomsCount = 0; // Default value if no total rooms are found
}

// Close the connection
$conn->close();
?> <style>
.chart-container {
    display: flex;
    gap: 20px;
}

.recent-sales {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    flex: 1 1 200px; /* Adjust as needed */
    max-width: 800px; /* Adjust as needed */
}

canvas {
    max-width: 100%;
    height: auto;
}
</style>
</head>
<body>
<div class="chart-container">
<div class="recent-sales box">
    <canvas id="pieChart" width="200" height="200"></canvas>
</div>
<div class="recent-sales box">
    <canvas id="barChart" width="200" height="200"></canvas>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Use Chart.js to create a pie chart
var ctxPie = document.getElementById('pieChart').getContext('2d');
var pieChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: ['Available Rooms', 'Booked Rooms', 'Total Rooms'],
        datasets: [{
            data: [<?php echo $availableRoomsCount; ?>, <?php echo $bookedRoomsCount; ?>, <?php echo $totalRoomsCount; ?>],
            backgroundColor: ['#36A2EB', '#FFCE56', '#FF6384'],
            hoverBackgroundColor: ['#36A2EB', '#FFCE56', '#FF6384']
        }]
    }
});

// Use Chart.js to create a bar chart
var ctxBar = document.getElementById('barChart').getContext('2d');
var barChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: ['Available Rooms', 'Booked Rooms', 'Total Rooms'],
        datasets: [{
            label: 'Number of Rooms',
            data: [<?php echo $availableRoomsCount; ?>, <?php echo $bookedRoomsCount; ?>, <?php echo $totalRoomsCount; ?>],
            backgroundColor: ['#36A2EB', '#FFCE56', '#FF6384'],
            borderColor: ['#36A2EB', '#FFCE56', '#FF6384'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>




<div>
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