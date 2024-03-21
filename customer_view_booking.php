<?php 
session_start(); 
include("connect.php");
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

    
    // Free the result set
    //mysqli_free_result($result);

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
	<link rel="stylesheet" href="css/table.css">


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
					<div class="active1 nav-option">
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
        <div class="container" style="margin-left:0px;max-width:4000px;">     
<!-- table section -->
<hr>
<div class="container1" style="max-width:4000px;margin-left:0px">
	<br>
<div class="title">My Bookings</div><br>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1"><b> Booking Id</b></div>
      <div class="col col-3"><b> Customer Id</b></div>
      <div class="col col-2"><b> Check In Date</b></div>
      <div class="col col-1"><b> Check Out Date</b></div>
      <div class="col col-4"><b> Guests</b></div>
      <div class="col col-1"><b> Services Id</b></div>
      <div class="col col-1"><b> Total Bill</b></div>
      <div class="col col-4"><b> Booking Date</b></div>


    </li>
	<?php
    $query = "SELECT * FROM booking WHERE c_id='$c_id'";
    $result = mysqli_query($conn, $query);
    //echo $result;
    if ($result) {
        // Fetch the hall ID from the query result
        while ($row = mysqli_fetch_assoc($result)) {
            
        	?>
		<li class="table-row">
        <div class="col col-1" data-label="Booking Id"><?php echo $row['b_id'];?></div>
		  <div class="col col-3" data-label="Hall Id"><?php echo $row['h_id'];?></div>
		  <div class="col col-2" data-label="Check In Date"><?php echo $row['check_in_date'];?></div>
		  <div class="col col-1" data-label=" Check Out Date"><?php echo $row['check_out_date'];?></div>
		  <div class="col col-1" data-label=" Guests"><?php echo $row['guest'];?></div>
		  <div class="col col-1" data-label="  Services Id"><?php echo $row['s_id'];?></div>
		  <div class="col col-1" data-label=" Total Bill"><?php echo $row['total_bill'];?></div>

		  <div class="col col-4" data-label=" Booking Date"><?php echo $row['b_date'];}}?></div>
          <?php?>	</li>

  </ul>
</div>
<!-- End Of Table section -->
</div>
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

