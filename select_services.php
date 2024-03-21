<?php
session_start(); 
include("connect.php");
$currentDate = date('Y-m-d');
$tomorrow = date('Y-m-d', strtotime('+1 day'));

if(isset($_SESSION["admin"])){
    header("Location: halls.php", true, 301);  
    exit();
}else if(isset($_SESSION["customer"])){

}else if(isset($_SESSION["hall_owner"])){
    header("Location: halls.php", true, 301);  
    exit();
}else{
    header("Location: login.php", true, 301);  
    exit();
}

if(isset($_POST['book_btn'])){
    $h_id= $_POST['h_id'];
    $_SESSION['h_id']=$h_id;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/hall_owner_reg.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/services_card.css">

</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<!--<div class="center">
  <label class="label">
    <input  class="label__checkbox" type="checkbox" />
    <span class="label__text">
      <span class="label__check">
        <i class="fa fa-check icon"></i>
      </span>
    </span>
  </label>
</div>-->

<div class="nav">
    <ul>
        <li class="logo"><img src="css/logo2.jpg" alt=""></li>
      <li class="account"><a href="account.php">Account</a></li>
      
      <li><a class="active"  href="Event.php">Halls & Services</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>
  

   
    <div class="container pb-4">
    <div class="title">Hall Booking Form</div>
    <div class="sub_title">Event Details:</div>
    
    <form action="bill.php" method="POST">


    <div class="user-details" style="display:flex;">
          <div class="input-box" style="margin-left:15px;">
            <span class="details">Check In Date</span>
            <input type="date"  name="ci_date" min="<?php echo $currentDate;?>" required>
          </div>
          
          <div class="input-box"style="margin-left:15px;">
            <span class="details">Check Out Date</span>
            <input type="date"  name="co_date" min="<?php echo $tomorrow;?>" required>
          </div>
          <div class="input-box"style="margin-left:15px;">
            <span class="details">Please provide the number of attendees at the event.</span>
            <input type="number" placeholder="Enter Guest Number" name="guest" min="10" required>
          </div>
         
        </div>
        <hr><br>
        <div class="sub_title">Our Services:</div><br>
    <div class="row">
    <?php $result = $conn->query("SELECT * FROM services WHERE h_id='$h_id'"); 
 if($result){
  while($row = $result->fetch_assoc()){
    $s_id=$row['s_id'];
    $s_name=$row['s_name'];
    $s_desc=$row['s_desc'];
    $s_price=$row['s_price'];
    $s_img=base64_encode($row['s_img']);
 ?>
  
 
    <div class="col-lg-3">
      <div class="horizontal-card">

      <img src="data:image/PNG;base64,<?php echo $s_img;?>" >
        <div class="horizontal-card-body">
          <span class="card-text"><b>Service Name:</b><?php echo $s_name;?></span>
          <h4 class="card-title">Service Id:<?php echo $s_id;?></h4>
          <span class="card-text">Service Price:<?php echo $s_price;?></span>
          <span class="card-text">Service Description:<?php echo $s_desc;?></span>

        </div>
        <div class="horizontal-card-body" style="margin-left:40%;font-size:25px;margin-top:5.5%">
        
  <label class="label">
    <input  class="label__checkbox" type="checkbox" name="options[]" value="<?php echo $s_id;?>" />
    <span class="label__text">
      <span class="label__check">
        <i class="fa fa-check icon"></i>
      </span>
    </span>
  </label>

        </div>
        <!--<div class="horizontal-card-footer">
          <span>Image Title</span>
          <label class="label">
    <input  class="label__checkbox" type="checkbox" />
    <span class="label__text">
      <span class="label__check">
        <i class="fa fa-check icon"></i>
      </span>
    </span>
  </label>
  
 <a class="card-text status">#Save</a>

        </div>-->

        </div>
     <?php }}?> 
     <input type="text" value="<?php echo $h_id;?>" name="h_id" style="display:none;"/>
     <div class="button">
          <input type="submit"  name="add_service" value="Generate Bill" Style="width:50%; margin-left:25%;">
        </div>
</form>
    </div>


      
    
</body>
</html>