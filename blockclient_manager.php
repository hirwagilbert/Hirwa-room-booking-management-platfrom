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

        .sales-details {
  margin-bottom: 20px;
}

.sales-details label {
  display: block;
  margin-bottom: 10px;
}

.sales-details input[type="email"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.sales-details button {
  display: inline-block;
  padding: 8px 16px;
  margin-right: 10px;
  border: none;
  border-radius: 4px;
  background-color: #4caf50;
  color: white;
  cursor: pointer;
}

.sales-details button[name="unblock"] {
  background-color: #f44336;
}

      </style>
      <!----------end of drop css------->

   <body><script>
   //Get the current time
var currentTime = new Date();
var currentHour = currentTime.getHours();

// Greeting messages
var greeting;

if (currentHour >= 5 && currentHour < 12) {
  greeting = "Good Morning";
} else if (currentHour >= 12 && currentHour < 18) {
  greeting = "Good Afternoon";
} else if (currentHour >= 18 && currentHour < 22) {
  greeting = "Good Evening";
} else {
  greeting = "Good Night";
}

// Display the greeting in a pop-up dialog
window.alert(greeting);
</script>
    <div class="sidebar">
      <div class="logo-details">
      <img src="hng.jpg" height="40px" width="40px" border-radius="100%";>
        <span class="logo_name">HIRWA hotel</span>
      </div>
        <ul class="nav-links">
          <li>
            <a href="DASHBOARD_manager.html" >
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
          
        
          <li>
            
              <i class='bx bxs-user'>
             
              <div class="dropdown">  <span class="links_name">clients</span>

              <div class="dropdown-content">
                <a href="deleteclientmanager.html">Delete</a>
                <a href="blockclient_manager.html"class="active">Block</a>
                <a href="unblockclient_manager.html">unblock</a>
                <a href="#"> All client</a>
              </div></div></i>
            
          </li>
          <li>
           
             <i style="margin-right: 30px;" class='bx bx-bed'>
     
             <div class="dropdown"> <span class="links_name">rooms</span>
            
                    <div class="dropdown-content">
                      <a href="totalrooms_manager.html">Total</a>
                      <a href="bookedroom_manager.html">Booked </a>
                      <a href="availableroom_manager.html"> Available</a>
                      <a href="edit&delete_manager.html">Edit & Delete</a>
                      <a href="addroom_manager.php">available </a>
                    
                    </div></div></i>
            
          </li><LI>
         <a href="#">
              <i class='bx bx-cog' >
              <span class="links_name">Setting</span></i>
            </a>
          </li>
          <li class="log_out">
            <a href="#">
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
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="profile.jpg" alt="">
        <span class="admin_name">HIRWA</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total booking</div>
            <div class="number">876</div>
            <div class="indicator">
            <i class='bx bxs-bed'></i>
              <span class="text">available rooms </span>
            </div>
          </div></div>


          <div class="box">
            <div class="right-side">
              <div class="box-topic">rooms Booked</div>
              <div class="number">46</div>
              <div class="indicator">
                <box-icon type='solid' name='bed'></box-icon>
                <box-icon name='bed'></box-icon>
              
              </div>
            </div>
          
          </div>
         
          <div class="box">
            <div class="right-side">
              <div class="box-topic">available rooms</div>
              <div class="number">36</div>
              <div class="indicator">
                
               
              </div>
            </div></div>
            
           
          
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total rooms</div>
              <div class="number">86</div>
              <div class="indicator">
               
                <span class="text">All</span>
              </div>
            </div>
  
          </div>
        </div>

       
        <div class="sales-boxes">
          <div class="recent-sales box">
          
            <div class="sales-details">
                
            
                <div class="sales-details">
                    <form id="accountForm">
                      <label for="email" style="color:white;">Enter client Email:</label>
                      <input type="email" id="email" name="email" required>
                      <button type="submit" name="block">Block</button>
                    
                    </form>
                  </div>
              
            </div>
           
           
          </div>
          
          <script>
            document.getElementById("accountForm").addEventListener("submit", function(event) {
              event.preventDefault(); // Prevent form submission
          
              // Get the entered email
              var email = document.getElementById("email").value;
          
              // Get the button name that triggered the form submission
              var buttonName = event.submitter.name;
          
              // Perform the appropriate action based on the button clicked
              if (buttonName === "block") {
                // Perform the blocking action (replace this with your actual blocking logic)
                // Example: Display a confirmation message
                alert("Blocking account with email: " + email);
              } else if (buttonName === "unblock") {
                // Perform the unblocking action (replace this with your actual unblocking logic)
                // Example: Display a confirmation message
                alert("Unblocking account with email: " + email);
              }
            });
          </script>


  

        <div class="top-sales box">
          <div class="title">Top booking rooms</div>
          <ul class="top-sales-details">
            <li>
            <a href="#">
              <img src="r1.jpeg" alt="">
              <span class="product">room 1

              </span>
            </a>
            <span class="price">$1107</span>
          </li>
          <li>
            <a href="#">
               <img src="r4.jpeg" alt="">
              <span class="product">room 4</span>
            </a>
            <span class="price">$1567</span>
          </li>
          <li>
            <a href="#">
             <img src="r7.jpeg" alt="">
              <span class="product">room 7</span>
            </a>
            <span class="price">$1234</span>
          </li>
          <li>
            <a href="#">
              <img src="r11.jpeg" alt="">
              <span class="product">room11 </span>
            </a>
            <span class="price">$2312</span>
          </li>
          <li>
            <a href="#">
              <img src="r9.jpeg" alt="">
              <span class="product">room 9

              </span>
            </a>
            <span class="price">$1456</span>
          </li>
          <li>
            <a href="#">
              <img src="r2.jpeg" alt="">
              <span class="product">room2</span>
            </a>
            <span class="price">$2345</span>
          <li>
            <a href="#">
              <img src="r5.jpeg" alt="">
              <span class="product">room 5</span>
            </a>
            <span class="price">$2345</span>
          </li>
<li>
            <a href="#">
             <img src="r3.jpeg" alt="">
              <span class="product">room 3 </span>
            </a>
            <span class="price">$1245</span>
          </li>
          </ul>
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