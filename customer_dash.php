<?php 
session_start(); 
include("connect.php");
$bookingCount=0;
$cid=0;

//for destroy sesion
/*session_unset();
session_destroy();*/
//echo $_SESSION["hall_owner"];
$customer_email=$_SESSION['customer'];
$query = "SELECT * FROM customer WHERE c_email='$customer_email'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $c_id = $row['c_id'];
       
    }
    // Free the result set
    //mysqli_free_result($result);
}
$query = "SELECT * FROM booking WHERE c_id='$c_id'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
      
		$bookingCount=$bookingCount+1;
	  }
		
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
<style>.t-op-nextlvl {
font-size: 14px;
letter-spacing: 0px;
font-weight: 600;
width:5%;
}</style>
</head>

<body style="margin:0px;">

	<!-- for header part -->
	<header>

    <div class="nav">
    <ul>
        <li class="logo"><img src="css/logo2.jpg" alt=""></li>
      <li class="account"><a class="active"href="account.php">Account</a></li>
      
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
					<div class="nav-option active1">
						<img src=
"css/img/dashboard.png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
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
					<div class="nav-option option5">
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
		<div class="main">

			

			
		<div class="box box1">
					<div class="text">
						<h2 class="topic-heading"><?php echo $bookingCount;?></h2>
						<h2 class="topic">Total Bookings</h2>
					</div>

					<img src=
"css/img/t_bookings.png"
						alt="likes">
				</div>
			

			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Recent Bookings</h1>
					
				</div>

				<div class="report-body">
					<div class="report-topic-heading">
						<h3 class="t-op">Booking Id</h3>
						<h3 class="t-op">Hall Id</h3>
						<h3 class="t-op">Check In Date</h3>
						<h3 class="t-op">Check Out Date</h3>
						<h3 class="t-op">Guests</h3>
						<h3 class="t-op">Services Id</h3>
						<h3 class="t-op">Total Bill</h3>
						<h3 class="t-op">Booking Date</h3>
						<h3 class="t-op">Cancel Booking</h3>

					</div>
					<div class="items">
						
					<?php
    $query = "SELECT * FROM booking WHERE c_id='$c_id'ORDER BY b_id DESC";
    $result = mysqli_query($conn, $query);
    //echo $result;
    if ($result) {
        // Fetch the hall ID from the query result
        while ($row = mysqli_fetch_assoc($result)) {
            
        	?><form action="#" method="POST">
					<div class="item1">
							<h3 class="t-op-nextlvl"><?php echo $row['b_id'];?></h3>
							<h3 class="t-op-nextlvl"><?php echo $row['h_id'];?></h3>
							<h3 class="t-op-nextlvl"><?php echo $row['check_in_date'];?></h3>
							<h3 class="t-op-nextlvl"><?php echo $row['check_out_date'];?></h3>
							<h3 class="t-op-nextlvl"><?php echo $row['guest'];?></h3>
							<h3 class="t-op-nextlvl"><?php echo $row['s_id'];?></h3>
							<h3 class="t-op-nextlvl"><?php echo $row['total_bill'];?></h3>

							<h3 class="t-op-nextlvl"><?php echo $row['b_date'];?></h3>
							
							<input type="text" name="b_id" value="<?php echo $row['b_id'];?>" style="display:none;cursor:pointer;"><h3 class="t-op-nextlvl"></h3></input>
							<input type="submit" value="Cancel Booking" name="submit" style="background:red;margin-right:-13%; border:1px solid black;" val><h3 class="t-op-nextlvl"></h3></input>
						    
							<!--<h3 class="t-op-nextlvl label-tag">Published</h3>-->
                    </div></form>
						<?php }}
						if(isset($_POST['submit'])){
							$bk_id=$_POST['b_id'];

							$query = "SELECT * FROM booking WHERE b_id='$bk_id'";
                            $result = mysqli_query($conn, $query);
                             //echo $result;
                           if ($result) {
                           // Fetch the hall ID from the query result
                             while ($row = mysqli_fetch_assoc($result)) {
								$CheckInDate=$row['check_in_date'];
							 }}
							 $currentDate = date('Y-m-d');
							 $daysDifference = 2;
							 $twoDaysBefore = date("Y-m-d", strtotime("-$daysDifference days", strtotime($CheckInDate)));
							 
							 if ($currentDate <= $twoDaysBefore) {
								$query = "DELETE FROM booking WHERE b_id='$bk_id'";
								$result1 = mysqli_query($conn, $query);
								 //echo $result;
							   if ($result1) {?><script>alert("Booking canceled!!");
							                    window.location.href ="customer_dash.php";
												</script><?php

							 } 
							 
							}else
							{
								echo '<script>alert("You can not cancel booking.");</script>';
								echo '<script> window.location.href ="customer_dash.php";</script>';
							}
							}
						?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="css/dash.js"></script>
</body>
</html>
<?php 
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