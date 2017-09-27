<?php
session_start();
require "../config/connect.php";

  if ($_POST) {
    $code = $_POST['m_code'];
    $amount = $_POST['amt'];
    $bill= $_POST['bill_id'];

    $insert =mysqli_query($con, "INSERT INTO `payments`(`payment_id`, `mpesa_code`, `bill_id`, `amount`,`tenant`,`payment_date`) VALUES (NULL,'$code','$bill','$amount', '{$_SESSION['tenant_email']}',CURRENT_DATE)");

    if ($insert) {
      echo "paid";
    }else {
      echo '<div class="alert alert-danger" role="alert">An Error Occurred While Submiting Payment Information. </div>'.mysqli_error($con);
    }
  }
 ?>
