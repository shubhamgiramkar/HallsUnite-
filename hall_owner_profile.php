<?php 
session_start(); 
include("connect.php");

$owner=$_SESSION['hall_owner'];
$query = "SELECT * FROM halls WHERE o_email='$owner'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        
        $h_id = $row['h_id'];
        $o_name=$row['o_name'];
        $o_email = $row['o_email'];
        $o_mob = $row['o_mob'];
        $o_add = $row['o_add'];
        $o_pass = $row['o_pass'];
        $h_name = $row['h_name'];
        $h_price = $row['h_price'];
        $h_desc = $row['h_desc'];
        $h_add = $row['h_add'];
        $h_request = $row['h_request'];




    }
    // Free the result set
    //mysqli_free_result($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet"href="css/dash_main.css">
	<link rel="stylesheet"href="css/dash_resp.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/hall_owner_reg.css">
    <link rel="stylesheet" href="css/login.css">


</head>

<body style="margin:0px;">

	<!-- for header part -->
	<header>

    <div class="nav">
    <ul>
        <li class="logo"><img src="css/logo2.jpg" alt=""></li>
      <li class="account"><a href="account.php">Account</a></li>
      
      <li><a href="halls.php">Halls & Services</a></li>
      <li><a class="active" href="about.html">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav1">
                <form action="#" method="POST">
				<div class="nav-upper-options">
                <button name="dash">
					<div class="nav-option option2">
						<img src=
"css/img/dashboard.png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>
                </button>
                <button name="services">
					<div class="nav-option option2">
						<img src="css/img/service_icon.png"
							class="nav-img"
							alt="articles">
						<h3> Services</h3>
					</div>
                </button>    
                <button name="customers">
					<div class="nav-option option4">
                        
						<img src="css/img/customers.png"
							class="nav-img"
							alt="report">
						<h3> Customers</h3>
					</div>
                </button>
                <button name="bookings">
					<div class="nav-option option4">
						<img src="css/img/booking.png"
							class="nav-img"
							alt="institution">
						<h3> Bookings</h3>
					</div>
                </button>
                <button name="profile">
					<div class="active1 nav-option">
						<img src="css/img/profile.png"
							class="nav-img"
							alt="blog">
						<h3> Profile</h3>
					</div>
                </button>
                <button name="logout">
					<div class="nav-option logout">
						<img src="css/img/logout.png"
							class="nav-img"
							alt="logout">
						<h3>Logout</h3>
					</div>
                </button>
				</div>
</form>
			</nav>
		</div>
		<div class="popup" id="popup">



        <!--user register popup-->

   
        <div class="register" id="register-class">
   <form action="#" method="post">
   
   <div class="form">
     <h2>My Profile</h2>
     <div class="form-element">
       <label for="u_name"><b>Hall Id:</b><?php echo $h_id;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Owner Name:</b><?php echo $o_name;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b> Mobile Number:</b><?php echo $o_mob;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Email:</b><?php echo $o_email;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Owner Address:</b><?php echo $o_add;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Password:</b><?php echo $o_pass;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Hall Name:</b><?php echo $h_name;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Hall Price:</b><?php echo $h_price;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Hall Description:</b><?php echo $h_desc;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Hall Address:</b><?php echo $h_add;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Hall Status:</b><?php echo $h_request;?></label>
     </div>
     
     
</div>
</form>
  </div>
</div>


	<script src="css/dash.js"></script>
</body>
</html>
<?php //code for side navbar options
if(isset($_POST['logout'])){
    
    session_unset();
    session_destroy();?>
    <script>
  window.location.href ="account.php";
</script>
<?php  
}elseif(isset($_POST['services'])){?>
	<script>
	  window.location.href ="owner_mng_service.php";
	</script>
	<?php
	
	
	}elseif(isset($_POST['dash'])){?>
		<script>
		  window.location.href ="hall_owner_dash.php";
		</script>
		<?php
		
		
	}elseif(isset($_POST['customers'])){?>
            <script>
              window.location.href ="owner_view_customer.php";
            </script>
            <?php
            
            
 }elseif(isset($_POST['bookings'])){?>
                <script>
                  window.location.href ="owner_view_booking.php";
                </script>
                <?php
                
                }elseif(isset($_POST['profile'])){?>
                    <script>
                      window.location.href ="hall_owner_profile.php";
                    </script>
                    <?php
                    }

?>

