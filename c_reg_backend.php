<?php 
//error_reporting(0);
include("connect.php");
session_start(); 

   if(isset($_POST["register_btn"])){
   $u_name=$_POST['u_name'];
   $u_mob=$_POST['u_mob'];
   $u_email=$_POST['u_email'];
   $u_add=$_POST['u_add'];
   $u_pass=$_POST['u_pass'];
   $uc_pass=$_POST['uc_pass'];
   $flag=false;
 if($u_pass==$uc_pass){
  $query = "SELECT c_email FROM customer";
  $result = mysqli_query($conn, $query);
//echo $result;
if ($result){
while($row = mysqli_fetch_assoc($result)) {
    $c_email=$row['c_email'];
    if($c_email==$u_email){
      $flag=true;
    }}}
if(!$flag){
    $sql="INSERT INTO customer (c_name,c_mob,c_email,c_add,c_pass) VALUES ('$u_name', '$u_mob', '$u_email', '$u_add', '$u_pass')";
     $insert = $conn->query($sql);
 if($insert){
  
  header("Location: Customer_login.php", true, 301);  
  exit();

 }

 }else{
header("Location: customer_reg.php", true, 301);  
exit();

 }}else{
  header("Location: customer_reg.php", true, 301);  
  exit();
  
   }

   }
   