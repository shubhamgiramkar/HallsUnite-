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
					<div class="active1 nav-option">
                        
						<img src="css/img/customers.png"
							class="nav-img"
							alt="report">
						<h3> Customers</h3>
					</div>
                </button>
                <button name="bookings">
					<div class="nav-option option5">
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
        <div class="container">     
<!-- table section -->
<hr>
<div class="container1">
	<br>
<div class="title">My Customers</div><br>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1"><b> Id</b></div>
      <div class="col col-3"><b> Name</b></div>
      <div class="col col-2"><b> Mobile Number</b></div>
      <div class="col col-1"><b> Email</b></div>
      <div class="col col-4"><b> Address</b></div>
    </li>
	<?php
    $query = "SELECT * FROM booking WHERE h_id='$h_id'";
    $result = mysqli_query($conn, $query);
    //echo $result;
    if ($result) {
        // Fetch the hall ID from the query result
        while ($row1 = mysqli_fetch_assoc($result)) {
            $c_id = $row1['c_id'];
           
	$query = "SELECT * FROM customer WHERE c_id='$c_id'";
    $result1 = mysqli_query($conn, $query);
//echo $result;
if ($result1){
	while($row = mysqli_fetch_assoc($result1)) {
		?>
		<li class="table-row">
        <div class="col col-1" data-label=" Id"><?php echo $row['c_id'];?></div>
		  <div class="col col-3" data-label=" Name"><?php echo $row['c_name'];?></div>
		  <div class="col col-2" data-label=" Mobile Number"><?php echo $row['c_mob'];?></div>
		  <div class="col col-1" data-label=" Email"><?php echo $row['c_email'];?></div>
		  <div class="col col-4" data-label=" Address"><?php echo $row['c_add'];}}}}?></div>
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

<?php
//code for form databse connections
//get hall id from owner login email



if(isset($_POST['add_service'])){

	$s_name=$_POST['s_name'];
	$s_price=$_POST['s_price'];
	$s_desc=$_POST['s_desc'];
	$s_img=$_FILES['s_img']['name'];
	
	$fileName1 = basename($s_img); 
    $fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION); 
	$allowTypes = array('jpg','png','jpeg','gif');
	if(in_array($fileType1, $allowTypes)){
		$image1 = $_FILES['s_img']['tmp_name']; 
		$img1Content = addslashes(file_get_contents($image1));

	$sql="INSERT INTO services (h_id, s_name, s_desc, s_price, s_img) VALUES ('$h_id', '$s_name', '$s_desc', '$s_price', '$img1Content')";
	$insert= mysqli_query($conn, $sql);
	if($insert){
		?>
		<script>alert("The service has been added successfully!!");</script>
		<?php
		unset($_POST['add_service']);
	}
}


}elseif(isset($_POST['remove_service'])){
$sr_id=$_POST['sr_id'];
$query = "SELECT s_id,h_id FROM services WHERE s_id ='$sr_id' AND h_id='$h_id' ";
$result = mysqli_query($conn, $query);

if ($result) {
    $count = mysqli_num_rows($result);
   
} 
if($count>0){
$sql="DELETE FROM services WHERE s_id ='$sr_id' AND h_id='$h_id'";
$delete= mysqli_query($conn, $sql);
	if($delete){
		?>
		<script>alert("The service has been deleted !!");</script>
		<?php
		unset($_POST['remove_service']);
	}}else{
		?>
		<script>alert("The service id is invalid !!");</script>
		<?php
	}

}elseif(isset($_POST['update_price'])){	
	$su_id=$_POST['su_id'];
	$su_price=$_POST['su_price'];
	$query = "SELECT s_id,h_id FROM services WHERE s_id ='$su_id' AND h_id='$h_id'";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$count = mysqli_num_rows($result);
	   
	} 
	if($count>0){
	$sql="UPDATE services SET s_price ='$su_price' WHERE s_id ='$su_id' AND h_id='$h_id'";
	$update= mysqli_query($conn, $sql);
		if($update){
			?>
			<script>alert("The service price has been updated !!");</script>
			<?php
			unset($_POST['update_price']);

		}}else{
			?>
			<script>alert("The service id is invalid !!");</script>
			<?php
		}
	

}
	



?>