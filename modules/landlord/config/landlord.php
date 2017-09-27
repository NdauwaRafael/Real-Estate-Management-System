<?php
session_start();

function landlord_loggedin()
{
  if (isset($_SESSION['landlord_email']) && !empty($_SESSION['landlord_email'])) {
    return true;
  }else {
    return false;
  }
}

$sel_landlord = mysqli_query($con, "SELECT * FROM `landlord` WHERE `email`='{$_SESSION['landlord_email']}'");
while ($landlord = mysqli_fetch_array($sel_landlord)) {
  $landlord_name = $landlord['firstname']." ".$landlord['lastname'];
}
 ?>
