<?php 
session_start(); 
include("connect.php");


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
    <link rel="stylesheet" href="css/hall_owner_reg.css">
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
      <li class="account"><a class="active"  href="account.php">Account</a></li>
      
      <li><a href="halls.php">Halls & Services</a></li>
      <li><a href="about.html">About Us</a></li>
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
					<div class="nav-option option3">
						<img src=
"css/img/dashboard.png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>
                </button>
                <button name="halls">
					<div class="nav-option option3">
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
					<div class="nav-option active1">
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
		<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">All Customers</h1>
					
				</div>

					<div class="report-body">
					<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Customer Id</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
			



        </tr>
        </thead>
					<!--<div class="report-topic-heading"><th>
						<h3 class="t-op">Hall Id</h3>
						<h3 class="t-op">Owner Name</h3>
						<h3 class="t-op">Mobile</h3>
						<h3 class="t-op">Email</h3>
						<h3 class="t-op">Hall Name</h3>
						<h3 class="t-op">Hall Price</h3>
						<h3 class="t-op">Hall Address</h3>
						<h3 class="t-op">Status</h3>
						<h3 class="t-op">Remove</h3>


</div>
					<div class="items">-->
						
					<?php
    $query = "SELECT * FROM customer";
    $result = mysqli_query($conn, $query);
    //echo $result;
    if ($result) {
        // Fetch the hall ID from the query result
        while ($row = mysqli_fetch_assoc($result)) {
            
        	?>
					<tbody>
                    <tr>
							<td><?php echo $row['c_id'];?></td>
							<td><?php echo $row['c_name'];?></td>
							<td><?php echo $row['c_mob'];?></td>
							<td><?php echo $row['c_email'];?></td>
							<td><?php echo $row['c_add'];?></td>
							
		</tr></tbody>
						<?php }}
						
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