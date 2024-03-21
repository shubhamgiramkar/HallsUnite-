<?php
include("connect.php");

session_start(); 
$c_email=$_SESSION['customer'];
if(isset($_POST['submit'])){
  
    $h_id=$_SESSION['h_id'];
//echo"hallId is.$h_id";
    $c_email=$_SESSION['customer'];
    $result = $conn->query("SELECT * FROM customer WHERE c_email='$c_email'"); 
    if($result){
     while($row = $result->fetch_assoc()){
        $c_id=$row['c_id'];
        $c_name=$row['c_name'];
        $c_mob=$row['c_mob'];
        $c_add=$row['c_add'];


}}

 

  $result = $conn->query("SELECT * FROM halls WHERE h_id='$h_id'"); 
    if($result){
     while($row = $result->fetch_assoc()){
       $o_email=$row['o_email'];
        $o_name=$row['o_name'];
        $o_mob=$row['o_mob'];
        $h_add=$row['h_add'];
        $h_name=$row['h_name'];
        $h_price=$row['h_price'];
        



}} 
  $selectedOptions=$_SESSION['selectedOptions'];
  $check_in_date=$_POST['check_in_date'];
  $check_out_date=$_POST['check_out_date'];
  $guest=$_POST['guest'];
  $total=$_POST['total'];
  $total_bill=$_POST['total_bill'];
  $currentDate=$_POST['currentDate'];
  $numberOfDays=$_POST['numberOfDays'];
  $option_flag=$_POST['option_flag'];
    ?>
    
    <!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Payment Receipt </title>
    <link rel="stylesheet" href="css/hall_owner_reg.css">
    <link rel="stylesheet" href="css/nav.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" ></script>

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
    
    
    <div class="content" id="whatToPrint">
    <div class="title">Payment Receipt</div>
    <div class="sub_title">Customer Details:</div>
      <form action="receipt.php" method="POST" enctype="multipart/form-data">
      <div class="user-details">
          <div class="input-box">
            <span class="details">Customer Id:<?php echo $c_id;?></span>
          </div>
          <div class="input-box">
            <span class="details">Name: <?php echo $c_name;?></span>
          </div>
          <div class="input-box">
            <span class="details">Email:<?php echo $c_email;?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Mobile Number:<?php echo $c_mob;?></span>
          </div>
          <div class="input-box">
            <span class="details"> Address:<?php echo $c_add;?></span>
          </div>
         
        </div>
        <hr> 
        <div class="sub_title">Booking Details:</div>
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
          <div class="input-box">
            <span class="details">Owner Name:<?php echo $o_name;?></span>
          </div>
          <div class="input-box">
            <span class="details">Owner Email: <?php echo $o_email;?></span>
          </div>
          <div class="input-box">
            <span class="details">Mobile Number:<?php echo $o_mob;?></span>
          </div>
        </div>
        <hr>
<!--   Hall Detail section -->
        <div class="sub_title">Payment Details:</div>
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
<span><b>Total Bill:</b><?php  echo $total_bill?></span><br><br>
<span><b>Payment Status:</b>Done</span>

</div><br><hr>


 

</div>

        <div class="button">
        <a href="javascript:generatePDF()" id="downloadButton" class="btn btn-lg btn-warning">Click To Download</a>

          <!--<input type="submit" value="Download Reciept"name="submit" onclick="Convert_HTML_To_PDF();"  style="margin-left:25%;width:50%">-->
        </div></div></div></div></div>
           </form>
    </div>
  </div>

</body>
<script>/*
        async function generatePDF() {
            document.getElementById("downloadButton").innerHTML = "Currently downloading, please wait";

            //Downloading
            var downloading = document.getElementById("whatToPrint");
            var doc = new jsPDF('l', 'pt');

            await html2canvas(downloading, {
                //allowTaint: true,
                //useCORS: true,
                width: 1000
            }).then((canvas) => {
                //Canvas (convert to PNG)
                doc.addImage(canvas.toDataURL("image/png"), 'PNG', 5, 5, 1000, 2000);
            })

            doc.save("Document.pdf");

            //End of downloading

            document.getElementById("downloadButton").innerHTML = "Click to download";
        }*/


        async function generatePDF() {
    document.getElementById("downloadButton").innerHTML = "Currently downloading, please wait";

    // Downloading
    var downloading = document.getElementById("whatToPrint");
    var doc = new jsPDF('p', 'mm', 'a4'); // Set A4 size

    await html2canvas(downloading, {
        width: 2000.28,
         // Set the width of the canvas to match A4 size in pixels
        scale: 1 // Set the scale to 1 for better quality
    }).then((canvas) => {
        // Canvas (convert to PNG)
        doc.addImage(canvas.toDataURL("image/png"), 'PNG', 20,20,-160,-200); // Set the image width and height to match A4 size
    });

    doc.save("Document.pdf");

    // End of downloading

    document.getElementById("downloadButton").innerHTML = "Click to download";
}
    </script>
</html>


<?php
$str_selected_option=implode(',', $selectedOptions);
$sql="INSERT INTO booking (h_id, s_id, check_in_date, check_out_date, guest, total_bill, b_date, b_days, c_id) VALUES ('$h_id', '$str_selected_option', '$check_in_date', '$check_out_date', '$guest', '$total_bill', '$currentDate', '$numberOfDays', '$c_id')";
$insert = $conn->query($sql);
if($insert){
  ?>
  <script>alert("Booking Confirmed");</script>
  <?php
}
}?>





