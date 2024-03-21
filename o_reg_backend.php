<?php 
//error_reporting(0);
include("connect.php");
//$conn = new mysqli("localhost", "root", "123", "book_event");

session_start(); 
  ?>
<?php
   if(isset($_POST["Register"])){
   
       //owner detail
    $owner_name = $_POST['o_name'];
    $owner_mob = $_POST['o_mob'];
    $owner_email = $_POST['o_email'];
    $owner_add = $_POST['o_add'];
    $owner_password = $_POST['o_pass'];
    $owner_c_password= $_POST['oc_pass'];
   
    //hall details
    $h_name=$_POST['h_name'];
    $h_price=$_POST['h_price'];
    $h_desc=$_POST['h_desc'];
    $h_add=$_POST['h_add'];
    $h1_img=$_FILES['h1_img']['name'];
    $h2_img=$_FILES['h2_img']["name"];
    $h3_img=$_FILES['h3_img']["name"];
    $h4_img=$_FILES['h4_img']["name"];
    $h5_img=$_FILES['h5_img']["name"];
    $qr_code=$_FILES['p_qr']["name"];
    if($owner_password==$owner_c_password){
    $fileName1 = basename($h1_img); 
    $fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION); 
   
    $fileName2 = basename($h2_img); 
    $fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION); 

    $fileName3 = basename($h3_img); 
    $fileType3 = pathinfo($fileName3, PATHINFO_EXTENSION);
    
    $fileName4 = basename($h4_img); 
    $fileType4 = pathinfo($fileName4, PATHINFO_EXTENSION); 

    $fileName5 = basename($h5_img); 
    $fileType5 = pathinfo($fileName5, PATHINFO_EXTENSION); 

    $fileName6 = basename($qr_code); 
    $fileType6 = pathinfo($fileName6, PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType1, $allowTypes)&& in_array($fileType2, $allowTypes)&& in_array($fileType3, $allowTypes)&& in_array($fileType4, $allowTypes)&& in_array($fileType5, $allowTypes) && in_array($fileType6, $allowTypes)){
        
      $image1 = $_FILES['h1_img']['tmp_name']; 
      $img1Content = addslashes(file_get_contents($image1));

      $image2 = $_FILES['h2_img']['tmp_name']; 
      $img2Content = addslashes(file_get_contents($image2));

      $image3 = $_FILES['h3_img']['tmp_name']; 
      $img3Content = addslashes(file_get_contents($image3));

      $image4 = $_FILES['h4_img']['tmp_name']; 
      $img4Content = addslashes(file_get_contents($image4));

      $image5 = $_FILES['h5_img']['tmp_name']; 
      $img5Content = addslashes(file_get_contents($image5));
   
      $image6 = $_FILES['p_qr']['tmp_name']; 
      $img6Content = addslashes(file_get_contents($image6));
      

      
     $sql="INSERT INTO halls (o_name, o_email, o_mob, o_add, o_pass, h_name, h_price, h_desc, h_add, h1_img, h2_img) VALUES ('$owner_name', '$owner_email', '$owner_mob', '$owner_add', '$owner_password', '$h_name', '$h_price', '$h_desc', '$h_add', '$img1Content', '$img2Content')";
     $insert = $conn->query($sql);

     $update = $conn->query("UPDATE halls SET h4_img = '$img4Content', h5_img = '$img5Content', p_qr = '$img6Content',h_request='Not Verified' WHERE o_email = '$owner_email'");

     

      if($insert&&$update){
         header("Location: hall_owner_login.php", true, 301);  
         exit();
       }else{
         echo"error";
      } 
}}}
//}?> 