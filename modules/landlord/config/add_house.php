<?php
session_start();
require "connect.php";
if ($_POST) {
  $name= $_POST['name'];
  $category= $_POST['category'];
  $estate= $_POST['estate'];
  $description= $_POST['description'];
  $rent= $_POST['rent'];
  $owner = $_SESSION['landlord_email'];

  if (empty($name) || empty($category) || empty($estate) || empty($description) || empty($rent)) {
    echo '<div class="alert alert-danger" role="alert">Error!! Fill In All Empty Fields First</div>';
  }else {

 $select = mysqli_query($con,"SELECT * FROM `house` WHERE `name`='$name' AND `estate`='$estate'");
 if (mysqli_num_rows($select)>0) {
          echo '<div class="alert alert-danger" role="alert">Wooh!! Seems youre trying to register a House that already exists. ('.$name.') name is already in use by another house.</div>';
 }else{

   $today = 5;

   $isert_bill = "INSERT INTO `bills`(`bill_id`, `bill_name`, `date_due`, `comment`, `estate`, `house`, `landlord`) VALUES (NULL,'Monthly Rent','$today','Payment on time','$estate','$name','$owner')";

         $insert = "INSERT INTO `house`(`house_id`, `name`, `category`, `estate`, `description`, `cost`, `landlord_email`, `status`) VALUES (NULL,'$name','$category','$estate','$description','$rent','$owner','Vacant')";
         if (mysqli_query($con, $insert) && mysqli_query($con, $isert_bill)) {
           echo '<div class="alert alert-success" role="alert">Success!! House Has Been Added Successfully</div>';
         }else {
          echo '<div class="alert alert-danger" role="alert">Ooops!! An Error Occured While Adding the house.</div>';
         }
 }



  }



}



 ?>
