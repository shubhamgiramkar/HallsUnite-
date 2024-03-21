<?php
session_start(); 
include("connect.php");
if(isset($_POST['add_service'])){
    $currentDate = date('Y-m-d');
   $check_in_date=$_POST['ci_date']; 
   $check_out_date=$_POST['co_date'];
   $guest=$_POST['guest'];
   $h_id=$_POST['h_id'];
   $date_flag=true;
   $option_flag=false;
   $selectedOptions=null;

   
   




   // Function to check if dates overlap
function datesOverlap($start1, $end1, $start2, $end2) {
    
    return ($start1 <= $end2) && ($end1 >= $start2);
}
function dateNotAvailable(){
    ?>
    <script>alert("Selected Date Is Not Available");</script>
    <?php
}
function CheckDateLessOrNot(){
    ?>
    <script>alert("Selected Check Out Date Is Earlier Than Check In Date");</script>
    <?php
} 

function Displabill(){
    //display booking code
    ?>
    
    
    <?php
}

function redirectServicePage(){?>
<script>
      window.location.href ="halls.php";
</script>
<?php
}
function displayBill($conn,$h_name,$h_add,$h_price,$currentDate,$check_in_date,$check_out_date,$guest,$option_flag,$selectedOptions,$numberOfDays,$p_qr){
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Bill </title>
    <link rel="stylesheet" href="css/hall_owner_reg.css">
    <link rel="stylesheet" href="css/nav.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="nav">
    <ul>
        <li class="logo"><img src="css/logo2.jpg" alt=""></li>
      <li class="account"><a  href="account.php">Account</a></li>
      
      <li><a class="active" href="halls.php">Halls & Services</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>
  <div class="container">
    <div class="title">Total Bill</div>
    <div class="sub_title">Booking Details:</div>
    <div class="content">

      <form action="receipt.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Hall Name:<?php echo $h_name;?></span>
          </div>
          <div class="input-box">
            <span class="details">Hall Address: <?php echo $h_add;?></span>
          </div>
          <div class="input-box">
            <span class="details">Booking Date:<?php echo $currentDate;?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Check In Date:<?php echo $check_in_date;?></span>
          </div>
          <div class="input-box">
            <span class="details">Check Out Date: <?php echo $check_out_date;?></span>
          </div>
          <div class="input-box">
            <span class="details">No Of guests:<?php echo $guest;?></span>
          </div>
          
        </div>
        <hr>
<!--   Hall Detail section -->
        <div class="sub_title">Hall Details:</div>
        <div class="content">
      
        <div class="user-details" >
          <table><tr><th style="width:500px;" >
          <div class="input-box">
            <span class="details"><b>Halls & Services</b></span>
          </div></th>
          <th style="width:150px">
          <div class="input-box">
            <span class="details"><b>Price</b></span>
          </div></th>
</tr>


          <tr><td>
          <div class="input-box">
            <span class="details"><?php echo $h_name;?></span>
          </div></td>
          <td>
          <div class="input-box">
            <span class="details"><?php echo $h_price;?></span>
          </div></td>
          </tr>
          <?php
          $total=$h_price;
          if($option_flag){
            foreach ($selectedOptions as $option) {
                $result = $conn->query("SELECT * FROM services WHERE s_id='$option'"); 
                if($result){
                 while($row = $result->fetch_assoc()){
                    $s_name = $row['s_name'];
                    $s_price = $row['s_price'];
                    $total=$total+$s_price;

          }}?>
          <tr><td>
          <div class="input-box">
            <span class="details"><?php echo $s_name;?></span>
          </div></td>
          <td>
          <div class="input-box">
            <span class="details"><?php echo $s_price;?></span>
          </div></td>
          </tr>
          
          
          <?php

        
        }}
        $total_bill=$numberOfDays*$total;
        
          
          ?>
</table>
          
         
        </div></div><hr>
<div class="total" style="margin-left:400px;">
<span><b>Total:</b><?php  echo $total?></span><br><br>
<span><b>Booking Days:</b><?php  echo $numberOfDays?></span><br><br><hr>
<span><b>Total Bill:</b><?php  echo $total_bill?></span>

</div><br><hr>

<div class="input-box">
            <span class="details"><b>Make Payment On This OR Code:</b></span>
            <div class="card_image" ><img src="data:image/PNG;base64,<?php echo $p_qr;?>" style="width:30%;"></div>
          </div>
<div style="display:none;">
<?php $_SESSION['selectedOptions']=$selectedOptions;?>
  <input type="text" name='h_id' value="<?php echo $h_id; ?>">
  <input type="text" name='selectedOptions' value="<?php echo $selectedOptions; ?>">
  <input type="text" name='check_in_date' value="<?php echo $check_in_date; ?>">
  <input type="text" name='check_out_date' value="<?php echo $check_out_date; ?>">
  <input type="text" name='guest' value="<?php echo $guest; ?>">
  <input type="text" name='total' value="<?php echo $total; ?>">
  <input type="text" name='total_bill' value="<?php echo $total_bill; ?>">
  <input type="text" name='currentDate' value="<?php echo $currentDate; ?>">
  <input type="text" name='numberOfDays' value="<?php echo $numberOfDays; ?>">
  <input type="text" name='option_flag' value="<?php echo $option_flag; ?>">
 

</div>

        <div class="button">
          <input type="submit" value="Payment Done"name="submit"  style="margin-left:25%;width:50%">
        </div></div></div></div></div>
            </form>
    </div>
  </div>

</body>
</html>


<?php

}

if (strtotime($check_in_date) < strtotime($check_out_date)) {
// Create DateTime objects from the given dates
$startDateTime = new DateTime($check_in_date);
$endDateTime = new DateTime($check_out_date);

// Calculate the difference between the two dates
$interval = $startDateTime->diff($endDateTime);

// Get the number of days from the interval
$numberOfDays = $interval->days;






    $date_flag=true;
    $result = $conn->query("SELECT * FROM halls WHERE h_id='$h_id'"); 
    if($result){
     while($row = $result->fetch_assoc()){
        $h_name=$row['h_name'];
        $h_add=$row['h_add'];
        $h_price=$row['h_price'];
        $p_qr=base64_encode($row['p_qr']);;

     }



    $result = $conn->query("SELECT * FROM booking WHERE h_id='$h_id'"); 
    if($result){
     while($row = $result->fetch_assoc()){
        $existingCheckIn = $row['check_in_date'];
        $existingCheckOut = $row['check_out_date'];
     
        // Check if requested dates overlap with any existing reservation
        if (datesOverlap($check_in_date, $check_out_date, $existingCheckIn, $existingCheckOut)) {
            $date_flag = false;
            dateNotAvailable();
            redirectServicePage();
            break; // No need to check further if an overlap is found
        }
     }

}else{
    //echo "error";
}
if(isset($_POST['options'])) {
    $option_flag=true;
    $selectedOptions = $_POST['options'];
 
}else{
    $option_flag=false;
}
  if($date_flag){
    
   //displayrecipt();
   /* if($option_flag){
        echo"option selected";
    }else{
        echo"option not selected";
    }*/

    displayBill($conn,$h_name,$h_add,$h_price,$currentDate,$check_in_date,$check_out_date,$guest,$option_flag,$selectedOptions,$numberOfDays,$p_qr);

  }

} else {
    CheckDateLessOrNot();
    redirectServicePage();
}

   


}



}?>