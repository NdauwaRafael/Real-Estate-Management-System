<?php
require "connect.php";
  if ($_POST) {
    $msg = $_POST['data'];
    $id = $_POST['id'];

    $update ="UPDATE `complaint` SET `response`='$msg',`response_date`=CURRENT_DATE,`status`='Responded' WHERE `complaint_id`='$id'";

   $check = mysqli_query($con,"SELECT * FROM `complaint` WHERE `complaint_id`='$id' AND `status` !='New'");
   if (mysqli_num_rows($check)>0) {
         echo '<div class="alert alert-warning" role="alert">The Complaint is already responded to. </div>';
   }else{
       if (mysqli_query($con, $update)) {
         echo 'success';
       }else{
         echo '<div class="alert alert-danger" role="alert">An Error Occurred While Responding to the complaint. </div>';
       }
   }
  }
 ?>
