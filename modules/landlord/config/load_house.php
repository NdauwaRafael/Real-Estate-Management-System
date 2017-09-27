<?php
require 'connect.php';
if ($_POST) {
  $estate = $_POST['estate'];

  $select = mysqli_query($con, "SELECT * FROM `house` WHERE `estate`='$estate'");
  while ($house=mysqli_fetch_array($select)) {
    ?>
<option value="<?=$house['house_id']?>"><?=$house['name']?></option>

    <?php
  }
}
 ?>
