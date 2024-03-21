<?php 
//error_reporting(0);
include("connect.php");
//$conn = new mysqli("localhost", "root", "123", "book_event");

session_start(); 
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halls And Services</title>
    <link rel="stylesheet" href="css/halls.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body style="background-color: #ffffff; margin: 0%;">
<div class="nav">
  <ul>
    <li class="logo"><img src="css/logo2.jpg" alt=""></li>
    <li class="account"><a href="account.php">Account</a></li>
    <li><a class="active" href = "halls.php">Halls & Services</a></li>
        <li><a  href="about.html">About Us</a></li>
    <li><a  href="index.php">Home</a></li>
  </ul></div>

  <div class="main">
  <h1><b>Unlock happiness: Book our hall for your perfect event!</b></h1>
  <ul class="cards">
  <?php $result = $conn->query("SELECT * FROM halls WHERE h_request='Verified'"); 
 if($result){
  while($row = $result->fetch_assoc()){
    $h_id=$row['h_id'];
    $h_name=$row['h_name'];
    $h_add=$row['h_add'];
    $h_desc=$row['h_desc'];
    $h_price=$row['h_price'];
    $h_email=$row['o_email'];
    $h_mob=$row['o_mob'];
    $h_img=base64_encode($row['h1_img']);
 ?>
  
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="data:image/PNG;base64,<?php echo $h_img;?>" ></div>
        <div class="card_content">
          <h2 class="card_title">Hall Name:<?php echo$h_name; ?></h2>
          <p class="card_text"><b>Price:</b><?php echo$h_price.'Rs'; ?></p>
          <p class="card_text"><b>Hall Address:</b><?php echo$h_add; ?></p>
          <p class="card_text"><b>Email:</b><?php echo$h_email; ?></p>
          <p class="card_text"><b>Phone No:</b><?php echo$h_mob; ?></p>
          <p class="card_text"><b>About Hall:</b><?php echo$h_desc; ?></p>

          <form action="select_services.php" method="POST">
          <input type="text" name="h_id" value="<?php echo $h_id;?>" style="display:none;">
          <button class="btn card_btn"name="book_btn">Book Now</button>
          </form>
        </div>
      </div>
    </li>

  <?php }}else{
    echo "error";
  }?>
  </ul>
</div>

</body>
</html>