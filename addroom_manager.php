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
      

   <body>
    
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
                      <a href="edit&delete_manager.php">Edit & Delete</a>
                      <a href="addroom_manager.php"  class="active">Add </a>
                    
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'photo' field is present in the form
    if (isset($_FILES["photo"])) {
        // Sanitize and validate form data
        $photo = $_FILES["photo"]["name"];
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $category = mysqli_real_escape_string($conn, $_POST["category"]);
        $price = (float)$_POST["price"];
        $beds = (int)$_POST["beds"];

        // Check if the room with the same name already exists
        $checkExistingRoom = "SELECT * FROM rooms WHERE name = '$name'";
        $result = $conn->query($checkExistingRoom);

        if ($result->num_rows > 0) {
            echo "Error: Room with the name '$name' already exists.";
        } else {
            // Upload photo
            $targetDirectory = __DIR__ . "/uploads/";
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }
            $targetFile = $targetDirectory . basename($photo);

            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                // Insert data into database
                $sql = "INSERT INTO rooms (photo, name, category, price, beds) VALUES ('$photo', '$name', '$category', $price, $beds)";

                if ($conn->query($sql) === TRUE) {
                    echo "Room added successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error uploading photo.";
            }
        }
    } else {
        echo "The 'photo' field is not present in the form.";
    }
}

// Close connection
$conn->close();
?>


     <!--------end of php connect to database------>
       
        <div class="sales-boxes">
          <div class="recent-sales box">
        
            <div class="sales-details">


              
            </div>


           
          
          <div class="room-form">
            <h2>Add a Room</h2>        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="name">ROOM NAME</label>
                <input type="text" id="name" required name="name">
            </div>
            <div class="form-group">
                <label for="category">ROOM CATEGORY</label>
                <select id="category" name="category">
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="suite">Suite</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">PRICE</label>
                <input type="number" id="price" required name="price">
            </div>
            <div class="form-group">
                <label for="beds">SIZE</label>
                <input type="number" id="beds" required name="beds">
            </div>
            <button type="submit">Add Room</button>
        </form>

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