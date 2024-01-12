<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard </title>
    <link rel="stylesheet" href="admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">


   <style>.wrapper{ margin-top: 20px;
      height: 90%;
      width:500px;
      position: relative ;
      justify-content: center;
      display:flex;
      align-items: center;
      border-radius: 30px;
      background-color:beige ;
  }
  </style>
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
            <a href="DASHBOARDadmin.html" >
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
          <li>
          
            <i class='bx bxs-user-rectangle' >
              <div class="dropdown">    <span class="links_name">Managers</span>
              <div class="dropdown-content">
                <a href="addmanager.html">Add managers</a>
                <a href="blockmanager">Block & unblock</a>
                <a href="deletemanager.html"> Delete </a>
                <a href="editmanager.html" class="active"> edit </a>
                <a href="#"> All managers</a>
              </div></div></i>
          </li> 
        
          <li>
            
              <i class='bx bxs-user'>
             
              <div class="dropdown">  <span class="links_name">clients</span>

              <div class="dropdown-content">
                <a href="deleteclient.html">Delete</a>
                <a href="blockclient.html">Block</a>
                <a href="unblockclient.html">unblock</a>
                <a href="#"> All client</a>
              </div></div></i>
            
          </li>
          <li>
           
             <i style="margin-right: 30px;" class='bx bx-bed'>
     
             <div class="dropdown"> <span class="links_name">rooms</span>
            
                    <div class="dropdown-content">
                      <a href="totalrooms.html">Total</a>
                      <a href="bookedroom.html">Booked </a>
                      <a href="availableroom.html"> Available</a>
                      <a href="Add&delete&edit.html">Edit & Delete</a>
                      <a href="addroom.html">Add</a>
                    
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