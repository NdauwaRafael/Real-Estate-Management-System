<?php
require 'connect.php';
if ($_POST) {
  $es_id = $_POST['es_id'];
  $del = "DELETE FROM `estate` WHERE `estate_id`='$es_id'";

  if (mysqli_query($con, $del)) {
    echo "Estate Deleted Successfully";
  }else {
    echo "Oops!! An error Occured while deleting the Estate, try again later";
  }
}
 ?>
