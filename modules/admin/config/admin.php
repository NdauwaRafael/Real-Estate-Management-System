<?php
session_start();

function admin_loggedin()
{
  if (isset($_SESSION['admin_email']) && !empty($_SESSION['admin_email'])) {
    return true;
  }else {
    return false;
  }
}

$sel_admin = mysqli_query($con, "SELECT * FROM `admin` WHERE `email`='{$_SESSION['admin_email']}'");
while ($admin = mysqli_fetch_array($sel_admin)) {
  $admin_name = $admin['firstname']." ".$admin['lastname'];
}
 ?>
