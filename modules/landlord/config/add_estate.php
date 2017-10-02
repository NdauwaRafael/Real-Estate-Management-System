<?php
session_start();
require "connect.php";
  if ($_POST) {
      $name = $_POST['name']; 
      $category = $_POST['category'];
      $location = $_POST['location'];
      $units = $_POST['units'];
      $description = $_POST['description'];
      $landlord=$_SESSION['landlord_email'];

      if (!empty($name) && !empty($category) && !empty($location) && !empty($units) && !empty($description) && !empty($landlord)) {
          $add = mysqli_query($con, "INSERT INTO `estate`(`estate_id`, `name`, `category`, `location`, `units`, `description`, `owner`) VALUES (NULL,'$name','$category','$location','$units','$description','$landlord')");

          if ($add) {
              echo '<div class="alert alert-success" role="alert"><strong>Success!!</strong> Estate has been added successfully.</div>';
          }else {
              echo '<div class="alert alert-danger" role="alert">An Error occurred adding the Estate</div>';
          }
      }else {
          echo '<div class="alert alert-danger" role="alert"><strong>Error!!</strong> Fill in Empty spaces first before submitting.</div>';
      }
  }

?>