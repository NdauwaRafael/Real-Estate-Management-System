<?php
session_start();
require "connect.php";
if ($_POST) {
  $firstname= $_POST['firstname'];
  $lastname= $_POST['lastname'];
  $email= $_POST['email'];
  $idno= $_POST['idno'];
  $occupation= $_POST['occupation'];
  $house = $_POST['house'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if (empty($firstname) || empty($lastname) || empty($email) || empty($idno) || empty($occupation)||empty($house)|| empty($password)|| empty($cpassword)) {
    echo '<div class="alert alert-danger" role="alert">Error!! Fill In All Empty Fields First</div>';
  }else {

 $select = mysqli_query($con,"SELECT * FROM `tenant` WHERE `email`='$email' OR `idno`='$idno'");
 if (mysqli_num_rows($select)>0) {
          echo '<div class="alert alert-danger" role="alert">Wooh!! Seems youre trying to register A Tenant that already exists.</div>';
 }else{

         $insert = "INSERT INTO `tenant`(`tenant_id`, `firstname`, `lastname`, `idno`, `email`, `Occupation`, `house`,`password`) VALUES (NULL,'$firstname','$lastname','$idno','$email','$occupation','$house','$password')";
         if (mysqli_query($con, $insert)) {
           echo '<div class="alert alert-success" role="alert">Success!! Tenant Has Been Added Successfully</div>';



         }else {
          echo '<div class="alert alert-danger" role="alert">Ooops!! An Error Occured While Adding the Tenant.</div>';
         }
 }



  }



}



 ?>
