<?php
$currentDate = date('Y-m-d');
$tomorrow = date('Y-m-d', strtotime('+1 day'));
if (isset($_POST['options'])) {
    $flag=true;
    $selectedOptions = $_POST['options'];
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Booking Form</title>
    <link rel="stylesheet" href="css/hall_owner_reg.css">
    <link rel="stylesheet" href="css/nav.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="nav">
    <ul>
        <li class="logo"><img src="css/logo2.jpg" alt=""></li>
      <li class="account"><a   href="account.php">Account</a></li>
      
      <li><a class="active" href="halls.php">Halls & Services</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>
  <div class="container">
    <div class="title">Hall Booking Form</div>
    <div class="sub_title">Event Details:</div>
    <div class="content">

      <form action="o_reg_backend.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Check In Date</span>
            <input type="date"  name="ci_date" min="<?php echo $currentDate;?>" required>
          </div>
          
          <div class="input-box">
            <span class="details">Check Out Date</span>
            <input type="date"  name="cu_date" min="<?php echo $tomorrow;?>" required>
          </div>
          <div class="input-box">
            <span class="details">Please provide the number of attendees at the event.</span>
            <input type="number" placeholder="Enter Guest Number" name="o_mob" min="10" required>
          </div>
         
        </div>
        <hr>
<!--   Hall Detail section -->
        <div class="sub_title">Hall Details:</div>
        <div class="content">
      
        <div class="user-details">
          <div class="input-box">
            <span class="details">Hall Name</span>
            <span>Hall Name</span>
          </div>
          <div class="input-box">
            <span class="details">Hall Price</span>
            <input type="text" placeholder="Enter Hall Price" name="h_price" required>
          </div>
          <div class="input-box">
            <span class="details">Hall Description</span>
            <textarea id="paragraphInput" name="h_desc" placeholder="Enter Hall Description"rows="3" cols="40" required></textarea>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter Hall Address" name="h_add" required>
          </div>
          <div class="input-box">
            <span class="details">Upload Minimum 5 Hall Images</span>
            <input type="file"  name="h1_img"  required>
            <input type="file" id="imageFileInput" name="h2_img" accept="image/png, image/jpeg, image/jpg" required>
            <input type="file" id="imageFileInput" name="h3_img" accept="image/png, image/jpeg, image/jpg" required>
            <input type="file" id="imageFileInput" name="h4_img" accept="image/png, image/jpeg, image/jpg" required>
            <input type="file" id="imageFileInput" name="h5_img" accept="image/png, image/jpeg, image/jpg" required>
          </div>

          <div class="input-box">
            <span class="details">Payment QR Code</span>
            <input type="file" id="imageFileInput" name="p_qr" accept="image/png, image/jpeg, image/jpg" required>
          </div>
          
         
        </div></div>
        <div class="button">
          <input type="submit" name="Register">
        </div></div></div></div></div>
            </form>
    </div>
  </div>

</body>
</html>
