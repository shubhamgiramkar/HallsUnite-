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
    <link rel="stylesheet" href="css/login.css">
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
					<div class="nav-option option3">
						<img src=
"css/img/dashboard.png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>
                </button>
                <button name="halls">
					<div class="nav-option option4">
						<img src="css/img/manage.png"
							class="nav-img"
							alt="articles">
						<h3> Manage Halls</h3>
					</div>
                </button>    
                <button name="admin">
					<div class="nav-option active1">
                        
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
		
					<div class="popup" id="popup">



        <!--user register popup-->

   
        <div class="register" id="register-class">
   <form action="#" method="post">
   
   <div class="form">
     <h2>Admin Registration</h2>
     <div class="form-element">
       <label for="u_name">Name</label>
       <input type="text" id="u_name" name="u_name" required placeholder="Enter Name" pattern="[A-Za-z ]+" title="Only letters and spaces are allowed">
     </div>
     <div class="form-element">
       <label for="u_mob">Mobile Number</label>
       <input type="tel" id="u_mob"name="u_mob" title="Invalid Number" pattern="[1-9]{1}[0-9]{9}" required placeholder="Enter Mobile Number">
     </div>
     <div class="form-element">
       <label for="u_email">Email</label>
       <input type="email" id="u_email" name="u_email" required placeholder="Enter Email"pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address">
     </div>
     
     <div class="form-element">
       <label for="u_password">Password</label>
       <input type="password" id="u_password"  name="u_pass" required placeholder="Enter Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" title="Password must contain at least 1 uppercase letter, 1 digit, 1 symbol, and be at least 8 characters long">
     </div>
     <div class="form-element">
       <label for="uc_password">Confirm Password</label>
       <input type="password" id="uc_password" name="uc_pass"required placeholder="Re-enter Password">
     </div>

     <div class="form-element">
       <button name="register_btn">Add Admin</button>
     </div>
     
</div>
</form>
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
	



    if(isset($_POST["register_btn"])){
        $u_name=$_POST['u_name'];
        $u_mob=$_POST['u_mob'];
        $u_email=$_POST['u_email'];
        $u_pass=$_POST['u_pass'];
        $uc_pass=$_POST['uc_pass'];
        $flag=false;
      if($u_pass==$uc_pass){
       $query = "SELECT a_email FROM admin";
       $result = mysqli_query($conn, $query);
     //echo $result;
     if ($result){
     while($row = mysqli_fetch_assoc($result)) {
         $a_email=$row['a_email'];
         if($a_email==$u_email){
           $flag=true;
         }}}
     if(!$flag){
         $sql="INSERT INTO admin (a_name,a_mob,a_email,a_pass) VALUES ('$u_name', '$u_mob', '$u_email','$u_pass')";
          $insert = $conn->query($sql);
      if($insert){
       echo'<script>alert("New Admin Added!!")</script>';
      }}}}


?>