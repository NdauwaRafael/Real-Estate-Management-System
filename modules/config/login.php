<?php
require "connect.php";
session_start();
 if ($_POST) {

$email = $_POST['email'];
$password = $_POST['password'];
$user = $_POST['user'];



//========================================================================================================
if ($user=='tenant') {
  $tenant = mysqli_query($con, "SELECT * FROM `tenant` WHERE `email` = '$email' AND `password`='$password'");
 if ($tenant) {
          if (mysqli_num_rows($tenant)==1) {
            $_SESSION['tenant_email']= $email;
            echo '<script>window.location.href="modules/tenant/tenant.php";</script>';
          }else{
            echo "Invalid Login Details. Check Whether the <strong>EMAIL</strong> details you provided matches with the <strong>PASSWORD</strong> details you've specified. Thankyou for your patience";
             }
 }else{
   echo "Error occured while submitting your login credentials, refresh the page and try again. If the problem persists, seek more support from the application helpcenter";
 }
}
 //========================================================================================================


 //==============================================================================================================
if ($user=='admin') {
$admin = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$email' AND `password`='$password'");
  if ($admin) {
      if (mysqli_num_rows($admin)==1) {
        $_SESSION['admin_email']= $email;
        echo '<script>window.location.href="modules/admin/admin.php";</script>';
      }else{
        echo "Invalid Login Details. Check Whether the <strong>EMAIL</strong> details you provided matches with the <strong>PASSWORD</strong> details you've specified. You are not the admin of this Application. Stay Out or face consequenties";
      }
  }else{
    echo "Error occured while submitting your login credentials, refresh the page and try again. If the problem persists, seek more support from the application helpcenter";
  }

}

//========================================================================================================

//========================================================================================================

if ($user == 'landlord') {
  $landlord = mysqli_query($con, "SELECT * FROM `landlord` WHERE `email` = '$email' AND `password`='$password'");
  if ($landlord) {
      if (mysqli_num_rows($landlord)==1) {
        $_SESSION['landlord_email']= $email;
        echo '<script>window.location.href="modules/landlord/landlord.php";</script>';
      }else{
        echo "Invalid Login Details. Check Whether the <strong>EMAIL</strong> details you provided matches with the <strong>PASSWORD</strong> details you've specified. Make sure you have the permission to login as the landlord.";
      }
  }else{
    echo "Error occured while submitting your login credentials, refresh the page and try again. If the problem persists, seek more support from the application helpcenter";
  }

}
//========================================================================================================

 }



 ?>
