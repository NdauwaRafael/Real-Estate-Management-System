<?php
require 'connect.php';
if ($_POST) {
  $tn_id = $_POST['tn_id'];
  $del = "DELETE FROM `tenant` WHERE `tenant_id`='$tn_id'";

  if (mysqli_query($con, $del)) {
    echo "Tenant Deleted Successfully";
  }else {
    echo "Oops!! An error Occured while deleting the Tenant, try again later";
  }
}
 ?>
