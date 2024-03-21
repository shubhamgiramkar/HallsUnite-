<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">

</head>
<body style="background-color: #ffffff; margin: 0%;">

<div class="nav">
    <ul>
        <li class="logo"><img src="css/logo2.jpg" alt=""></li>
      <li class="account"><a class="active"  href="account.php">Account</a></li>
      
      <li><a href="Event.php">Halls & Services</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>

  
<div class="popup" id="popup">



        <!--user register popup-->

   
        <div class="register" id="register-class">
   <form action="c_reg_backend.php" method="post">
   
   <div class="form">
     <h2>Customer Registration</h2>
     <div class="form-element">
       <label for="u_name">Name</label>
       <input type="text" id="u_name" name="u_name" required placeholder="Enter Name"pattern="[A-Za-z ]+" title="Only letters and spaces are allowed">
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
       <label for="u_add">Address</label>
       <input type="text" id="u_add" name="u_add" required placeholder="Enter Your Address">
     </div>
     <div class="form-element">
       <label for="u_password">Password</label>
       <input type="password" id="u_password"  name="u_pass" required placeholder="Enter Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$" title="Please enter a password with at least 8 characters, including one uppercase letter, one lowercase letter, one digit, and one special character">
     </div>
     <div class="form-element">
       <label for="uc_password">Confirm Password</label>
       <input type="password" id="uc_password" name="uc_pass"required placeholder="Re-enter Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$" title="Please enter a password with at least 8 characters, including one uppercase letter, one lowercase letter, one digit, and one special character">
     </div>

     <div class="form-element">
       <button name="register_btn">Register</button>
     </div>
     <div class="register-btn">
       <p>Already have account? <a href="Customer_login.php">Customer Login</a></p>
     </div>
</div>
</form>
  </div>
</div>


</body>
</html>
