<?php
require 'connect.php';
if ($_POST) {
  $ln_id = $_POST['ln_id'];
  $del = "DELETE FROM `landlord` WHERE `landlord_id`='$ln_id'";

  if (mysqli_query($con, $del)) {
    echo "Landlord Deleted Successfully";
  }else {
    echo "Oops!! An error Occured while deleting the Lanlord, try again later".mysqli_error($con);
  }
}
 ?>
