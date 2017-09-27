<?php
require 'connect.php';
if ($_POST) {
  $comp_id = $_POST['id'];
  $ignore = "UPDATE `complaint` SET `response_date`=CURRENT_DATE,`status`='Ignored' WHERE `complaint_id`='$comp_id'";

  if (mysqli_query($con, $ignore)) {
    echo "Complaint Ignored and Achieved";
  }else {
    echo "Oops!! An error Occured while Ignoring, try again later";
  }
}
 ?>
