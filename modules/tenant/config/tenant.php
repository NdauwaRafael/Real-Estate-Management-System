<?php
session_start();

function tenant_loggedin()
{
  if (isset($_SESSION['tenant_email']) && !empty($_SESSION['tenant_email'])) {
    return true;
  }else {
    return false;
  }
}

$sel_tenant = mysqli_query($con, "SELECT * FROM `tenant` WHERE `email`='{$_SESSION['tenant_email']}'");
while ($tenant = mysqli_fetch_array($sel_tenant)) {
  $tenant_name = $tenant['firstname']." ".$tenant['lastname'];
}
 ?>
