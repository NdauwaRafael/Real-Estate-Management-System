<div class="panel-body1">
					   <table class="table">
						 <thead>
							<tr>
							  <th>#</th>
							  <th>Date</th>
							  <th>Bill Name</th>
							  <th>Amount</th>
							</tr>
						  </thead>
						  <tbody>

<?php
session_start();
require "../config/connect.php";
 $load_pay = mysqli_query($con, "SELECT `mpesa_code`, `payments`.`amount` as `amt`,  `payment_date`,`bill_name` FROM `payments`,`bills` WHERE `payments`.`tenant`='{$_SESSION['tenant_email']}' AND  `payments`.`bill_id`=`bills`.`bill_id`  ") or die(mysqli_error($con));
$a = 0;
 while($pay = mysqli_fetch_array($load_pay)){
  $date = $pay['payment_date'];
  $amount = $pay['amt'];
  $bill_name = $pay['bill_name'];
  $a++;
?>

<tr>
  <th scope="row"><?=$a?></th>
  <td><?=$date?></td>
  <td><?=$bill_name?></td>
  <td><?=$amount?></td>
</tr>
<?php
 }

 ?>


						  </tbody>
						</table>
						</div>
