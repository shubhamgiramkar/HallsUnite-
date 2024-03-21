<?php 
session_start(); 
include("connect.php");
$CustomerCount=0;
$HallsCount=0;
$NotVerifiedCount=0;
$query = "SELECT COUNT(*) as count FROM customer";
$result = mysqli_query($conn, $query);
if ($result) {
  // Fetch the row containing the count
  $row = mysqli_fetch_assoc($result);
  // Retrieve the count value
  $CustomerCount = $row['count'];
  // Display the count
} 

$query = "SELECT COUNT(*) as count FROM halls WHERE h_request='Verified'";
$result = mysqli_query($conn, $query);
if ($result) {
  // Fetch the row containing the count
  $row = mysqli_fetch_assoc($result);
  // Retrieve the count value
  $HallsCount = $row['count'];
  // Display the count
} 

$query = "SELECT COUNT(*) as count FROM halls WHERE h_request='Not Verified'";
$result = mysqli_query($conn, $query);
if ($result) {
  // Fetch the row containing the count
  $row = mysqli_fetch_assoc($result);
  // Retrieve the count value
  $NotVerifiedCount = $row['count'];
  // Display the count
} 

//for destroy sesion
/*session_unset();
session_destroy();*/
//echo $_SESSION["hall_owner"];
/*$admin=$_SESSION['admin'];
$query = "SELECT * FROM halls WHERE o_email='$owner_email'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $h_id = $row['h_id'];
        $h_price=$row['h_price'];
    }
    // Free the result set
    //mysqli_free_result($result);
}*/
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
	<link rel="stylesheet" href="css/table_admin.css">

<style>
	.report-topic-heading, .item1 {
    width: 1700px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
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
					<div class="nav-option active1">
						<img src=
"css/img/dashboard.png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>
                </button>
                <button name="halls">
					<div class="option2 nav-option">
						<img src="css/img/manage.png"
							class="nav-img"
							alt="articles">
						<h3> Manage Halls</h3>
					</div>
                </button>    
                <button name="admin">
					<div class="nav-option option3">
                        
						<img src="css/img/add_admin.png"
							class="nav-img"
							alt="report">
						<h3> Add Admin</h3>
					</div>
                </button>
                <button name="customer">
					<div class="nav-option option4">
						<img src="css/img/customers.png"
							class="nav-img"
							alt="institution">
						<h3> Customers</h3>
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

				<div class="box box1">
					<div class="text">
						<h2 class="topic-heading"><?php echo $CustomerCount;?></h2>
						<h2 class="topic">Total Customers</h2>
					</div>

					<img src=
"css/img/people.png"
						alt="Views">
				</div>

				<div class="box box2">
					<div class="text">
						<h2 class="topic-heading"><?php echo $HallsCount;?></h2>
						<h2 class="topic">Total Halls</h2>
					</div>

					<img src=
"css/img/t_bookings.png"
						alt="likes">
				</div>

				<div class="box box3">
					<div class="text">
						<h2 class="topic-heading"><?php echo $NotVerifiedCount;?></h2>
						<h2 class="topic">New Requests</h2>
					</div>

					<img src=
"css/img/request.png"
						alt="comments">
				</div>

				
			</div>

			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">New Hall Registration Requests</h1>
					
				</div>

					<div class="report-body">
						
					<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
						<th>Hall Id</th>
						<th>Owner Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Owner Address</th>
						<th>Hall Name</th>
						<th>Hall Price</th>
						<th>Hall Address</th>
						<th>Status</th>


</tr>
        </thead>
						
					<?php
    $query = "SELECT * FROM halls WHERE h_request='Not Verified'ORDER BY h_id DESC";
    $result = mysqli_query($conn, $query);
    //echo $result;
    if ($result) {
        // Fetch the hall ID from the query result
        while ($row = mysqli_fetch_assoc($result)) {
            
        	?><form action="#" method="POST">
					<tbody>
                    <tr>
							<td><?php echo $row['h_id'];?></td>
							<td><?php echo $row['o_name'];?></td>
							<td><?php echo $row['o_mob'];?></td>
							<td><?php echo $row['o_email'];?></td>
							<td><?php echo $row['o_add'];?></td>
							<td><?php echo $row['h_name'];?></td>
							<td><?php echo $row['h_price'];?></td>

							<td><?php echo $row['h_add'];?></td>

							<input type="text" name="h_id" value="<?php echo $row['h_id'];?>" style="display:none;cursor:pointer;"><h3 class="t-op-nextlvl"></h3></input>
							<td><input type="submit" value="Verify Account" name="submit" style="background:red;margin-right:-15%; border:1px solid black;" val><h3 class="t-op-nextlvl"></h3></input></td>
						    
			<!--<h3 class="t-op-nextlvl label-tag">Published</h3>-->
		</tr></tbody></form>
						<?php }}
						if(isset($_POST['submit'])){
							$hr_id=$_POST['h_id'];

							
								$query = "UPDATE halls SET h_request ='Verified' WHERE h_id ='$hr_id'";
								$result1 = mysqli_query($conn, $query);
								 //echo $result;
							   if ($result1) {?><script>alert("Account Verified!!");
							                    window.location.href ="admin_dash.php";
												</script><?php

							 }else
							{
								echo '<script>alert("Something Went Wrong");</script>';
								echo '<script> window.location.href ="admin_dash.php";</script>';
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
}elseif(isset($_POST['halls'])){?>
<script>
  window.location.href ="manage_hall.php";
</script>
<?php

}elseif(isset($_POST['dash'])){?>
    <script>
      window.location.href ="admin_dash.php";
    </script>
    <?php
    
    
    }elseif(isset($_POST['admin'])){?>
		<script>
		  window.location.href ="add_admin.php";
		</script>
		<?php
		}elseif(isset($_POST['customer'])){?>
			<script>
			  window.location.href ="view_all_customer.php";
			</script>
			<?php
			}elseif(isset($_POST['profile'])){?>
                <script>
                  window.location.href ="admin_profile.php";
                </script>
                <?php
                }
	


?>