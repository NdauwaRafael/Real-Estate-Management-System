<?php
require 'connect.php';
if ($_POST) {
  $hs_id = $_POST['hs_id'];
  $del = "DELETE FROM `house` WHERE `house_id`='$hs_id'";

  if (mysqli_query($con, $del)) {
    echo "House Deleted Successfully";
  }else {
    echo "Oops!! An error Occured while deleting the house, try again later";
  }
}
 ?>
