<?php 
include("connect.php");
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/nav.css">
    

</head>
<body style="background-color: #ffffff; margin: 0%;">

<div class="nav">
    <ul>
        <li class="logo"><img src="css/logo2.jpg" alt=""></li>
      <li class="account"><a class="active"  href="account.php">Account</a></li>
      
      <li><a href="halls.php">Halls & Services</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>
<div class="popup" id="popup">


<!--Admin login popup-->

<div class="login" id="login-class">
<form action="#" method="post">
<div class="top-btn">
  <a href="login.php" >Admin</a>
  <a style="background-color: #0097e6">Hall Owner</a>
  <a href="Customer_login.php">Customer</a>

</div>
<div class="form">
  <h2>Log in</h2>
  
  <div class="form-element">
    <label for="user_email">Email</label>
    <input type="text" id="user_email" name="user_email" required placeholder="Enter email"pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address">

  </div>
  <div class="form-element">
    <label for="user_password">Password</label>
    <input type="password" id="user_password"name="user_password"  required placeholder="Enter password"pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$" title="Please enter a password with at least 8 characters, including one uppercase letter, one lowercase letter, one digit, and one special character">
  </div>

  <div class="form-element">
  
    <button name="user_login">Login</button>
  </div>
  <div class="register-btn">
    <p>New User?<a href="hall_owner_reg.php">Hall Owner Registration</a></p>
  </div>
     
</div>
</form>
</div>


</body>
</html>
<?php 
if(isset($_POST["user_login"])){
       
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  $user_email = stripcslashes($user_email);  
  $user_password = stripcslashes($user_password);  
  $user_email = mysqli_real_escape_string($conn, $user_email);  
  $user_password = mysqli_real_escape_string($conn, $user_password);
 $sql = "SELECT * FROM halls WHERE o_email='$user_email' AND o_pass='$user_password'AND h_request='Verified'";  
 $query = mysqli_query($conn, $sql);
    
  
  $count = mysqli_num_rows($query);  
  
  if($count==1){ 

    $_SESSION["hall_owner"]=$user_email;
    header("Location: hall_owner_dash.php", true, 301);  
    exit();
  }else{?>
  <script>alert("Invalid Email and Password");</script><?php

  }
}
?>