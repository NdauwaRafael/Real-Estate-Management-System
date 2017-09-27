<?php
session_start();
require "connect.php";

if ($_POST) {
  $msg = $_POST['grievance'];
  $tenant = $_SESSION['tenant_email'];

  $complain = "INSERT INTO `complaint`(`complaint_id`, `complain_date`, `tenant`, `message`) VALUES (NULL,CURRENT_DATE,'$tenant','$msg')";

$check = mysqli_query($con, "SELECT * FROM `complaint` WHERE `tenant`='$tenant' AND `status`='New'");
if (mysqli_num_rows($check)>3) {
        echo '<div class="alert alert-warning" role="alert"><strong>Oops!!</strong>. It Seems you have Exahausted the maximum number of grievances you can send without a responce. Be patient and wait for responce</div>';
}else {
      if (mysqli_query($con, $complain)) {
        echo "Success";
      }else {
        echo '<div class="alert alert-danger" role="alert">An Error Occurred Submitting Your Grievance. Try Again Later.</div>'.mysqli_error($con);
      }
}
}

 ?>
