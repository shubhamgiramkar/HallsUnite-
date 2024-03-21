<?php 
session_start(); 
include("connect.php");

$customer=$_SESSION['customer'];
$query = "SELECT * FROM customer WHERE c_email='$customer'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $c_id = $row['c_id'];
        $c_name=$row['c_name'];
        $c_email = $row['c_email'];
        $c_mob = $row['c_mob'];
        $c_add = $row['c_add'];
        $c_pass = $row['c_pass'];



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
      <li class="account"><a class="active" href="account.php">Account</a></li>
      
      
      <li><a href="halls.php">Halls & Services</a></li>
      <li><a  href="about.html">About Us</a></li>
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
                
                <button name="bookings">
					<div class="nav-option option2">
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
<label for="u_name"><b>Customer Id:</b><?php echo $c_id;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Name:</b><?php echo $c_name;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Mobile Number:</b><?php echo $c_mob;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Email:</b><?php echo $c_email;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Address:</b><?php echo $c_add;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Password:</b><?php echo $c_pass;?></label>
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
}elseif(isset($_POST['dash'])){?>
		<script>
		  window.location.href ="customer_dash.php";
		</script>
		<?php
		
		
	}elseif(isset($_POST['bookings'])){?>
                <script>
                  window.location.href ="customer_view_booking.php";
                </script>
                <?php
                
                
                }elseif(isset($_POST['profile'])){?>
                    <script>
                      window.location.href ="customer_profile.php";
                    </script>
                    <?php
                    }

?>

