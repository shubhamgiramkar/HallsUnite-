<?php 
session_start(); 
include("connect.php");
 

//for destroy sesion
/*session_unset();
session_destroy();*/
//echo $_SESSION["hall_owner"];
$owner_email=$_SESSION['hall_owner'];
$query = "SELECT h_id FROM halls WHERE o_email='$owner_email'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $h_id = $row['h_id'];
       
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
		<div class="box-container">
			<!--date wise show bookings-->
			<form action="" method="post">
			<h3 style="text-align:center;">Date Wise Bookings</h3>
    <div class="box" >
      
      <div class="form-element">
        <label for="date" style="color:white;"><b>Select date:</b></label>
        <input type="date" name="date" id="date" />
      </div><br>
      <div class="form-element">
        <input type="submit" value="Show Data" name="date-btn" align="center"style="color:white;border:1px solid white;">
      </div>
    </div>
  </form>
			<!--end of date wise show bookings-->
			<!--display month wise booking form-->
			<form action="" method="post">
			<h3 >Month Wise Bookings</h3>
    <div class="box" style="color:white;" >
      
      <div class="form-element">
        <label for="month"><b>Choose a Month:</b></label>
        <select name="month" id="month" required>
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
      </div><br>
      <div class="form-element">
        <label for="m_year"><b>Enter Year:</b></label>
        <select name="m_year" id="month" required style="font-style:bold">
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
        </select>
      </div><br>
      <div class="form-element">
        <input type="submit" name="month-btn" value="Show Data" align="center" style="color:white;border:1px solid white;">
      </div>
    </div>
  </form>

			<!--end of month wise dispaly form-->

			<!--year wise show bookings-->
			<form action="" method="post">
			<h3 style="text-align:center;">Year Wise Bookings</h3>
    <div class="box" >
      
      <div class="form-element">
        <label for="m_year" style="color:white;"><b>Enter Year:</b></label>
        <select name="m_year" id="month" required>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
        </select>
      </div><br>
      <div class="form-element">
        <input type="submit" value="Show Data" name="year-btn" align="center"style="color:white;border:1px solid white;">
      </div>
    </div>
  </form>
			<!--end of year wise show bookings-->
			
</div>
        <div class="container" style="margin-left:0px;max-width:4000px;">     
<!-- table section -->
<hr>
<div class="container1" style="max-width:4000px;margin-left:0px">
	<br>
<div class="title">Total Bookings</div><br>
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
	if(isset($_POST['date-btn'])){
		$date=$_POST['date'];
		$query = "SELECT * FROM booking WHERE h_id='$h_id'and b_date='$date'";
		$result = mysqli_query($conn, $query);
		//echo $result;
		if ($result) {
			// Fetch the hall ID from the query result
			while ($row = mysqli_fetch_assoc($result)) {
				
				?>
			<li class="table-row">
			<div class="col col-1" data-label="Booking Id"><?php echo $row['b_id'];?></div>
			  <div class="col col-3" data-label="Customer Id"><?php echo $row['c_id'];?></div>
			  <div class="col col-2" data-label="Check In Date"><?php echo $row['check_in_date'];?></div>
			  <div class="col col-1" data-label=" Check Out Date"><?php echo $row['check_out_date'];?></div>
			  <div class="col col-1" data-label=" Guests"><?php echo $row['guest'];?></div>
			  <div class="col col-1" data-label="  Services Id"><?php echo $row['s_id'];?></div>
			  <div class="col col-1" data-label=" Total Bill"><?php echo $row['total_bill'];?></div>
	
			  <div class="col col-4" data-label=" Booking Date"><?php echo $row['b_date'];}}
			  }else if(isset($_POST['month-btn'])){
				$month=$_POST['month'];
				$year=$_POST['m_year'];
				$query = "SELECT * FROM booking WHERE h_id='$h_id'and month(b_date)='$month' and year(b_date)='$year' ";
				$result = mysqli_query($conn, $query);
				//echo $result;
				if ($result) {
					// Fetch the hall ID from the query result
					while ($row = mysqli_fetch_assoc($result)) {
						
						?>
					<li class="table-row">
					<div class="col col-1" data-label="Booking Id"><?php echo $row['b_id'];?></div>
					  <div class="col col-3" data-label="Customer Id"><?php echo $row['c_id'];?></div>
					  <div class="col col-2" data-label="Check In Date"><?php echo $row['check_in_date'];?></div>
					  <div class="col col-1" data-label=" Check Out Date"><?php echo $row['check_out_date'];?></div>
					  <div class="col col-1" data-label=" Guests"><?php echo $row['guest'];?></div>
					  <div class="col col-1" data-label="  Services Id"><?php echo $row['s_id'];?></div>
					  <div class="col col-1" data-label=" Total Bill"><?php echo $row['total_bill'];?></div>
			
					  <div class="col col-4" data-label=" Booking Date"><?php echo $row['b_date'];}}
					  }else if(isset($_POST['year-btn'])){
						
						$year=$_POST['m_year'];
						$query = "SELECT * FROM booking WHERE h_id='$h_id' and year(b_date)='$year' ";
						$result = mysqli_query($conn, $query);
						//echo $result;
						if ($result) {
							// Fetch the hall ID from the query result
							while ($row = mysqli_fetch_assoc($result)) {
								
								?>
							<li class="table-row">
							<div class="col col-1" data-label="Booking Id"><?php echo $row['b_id'];?></div>
							  <div class="col col-3" data-label="Customer Id"><?php echo $row['c_id'];?></div>
							  <div class="col col-2" data-label="Check In Date"><?php echo $row['check_in_date'];?></div>
							  <div class="col col-1" data-label=" Check Out Date"><?php echo $row['check_out_date'];?></div>
							  <div class="col col-1" data-label=" Guests"><?php echo $row['guest'];?></div>
							  <div class="col col-1" data-label="  Services Id"><?php echo $row['s_id'];?></div>
							  <div class="col col-1" data-label=" Total Bill"><?php echo $row['total_bill'];?></div>
					
							  <div class="col col-4" data-label=" Booking Date"><?php echo $row['b_date'];}}
							  }else{
    $query = "SELECT * FROM booking WHERE h_id='$h_id'";
    $result = mysqli_query($conn, $query);
    //echo $result;
    if ($result) {
        // Fetch the hall ID from the query result
        while ($row = mysqli_fetch_assoc($result)) {
            
        	?>
		<li class="table-row">
        <div class="col col-1" data-label="Booking Id"><?php echo $row['b_id'];?></div>
		  <div class="col col-3" data-label="Customer Id"><?php echo $row['c_id'];?></div>
		  <div class="col col-2" data-label="Check In Date"><?php echo $row['check_in_date'];?></div>
		  <div class="col col-1" data-label=" Check Out Date"><?php echo $row['check_out_date'];?></div>
		  <div class="col col-1" data-label=" Guests"><?php echo $row['guest'];?></div>
		  <div class="col col-1" data-label="  Services Id"><?php echo $row['s_id'];?></div>
		  <div class="col col-1" data-label=" Total Bill"><?php echo $row['total_bill'];?></div>

		  <div class="col col-4" data-label=" Booking Date"><?php echo $row['b_date'];}}}?></div>
          	</li>

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

