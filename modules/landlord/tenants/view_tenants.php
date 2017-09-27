<h3 class="blank1">Landlord | View tenant Single Units</h3>


							<div class="panel-heading panel-success">
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Idno</th>
                      <th>Email</th>
                      <th>Occpation</th>
                      <th>House</th>
                      <th>Action</th>
										</tr>
									</thead>
									<tbody>

                    <?php
                    session_start();
                    require '../config/connect.php';
                      $select_tenant = mysqli_query($con, "SELECT `tenant_id`, `firstname`, `lastname`, `idno`, `email`, `Occupation`, `house`, `password`,`house_id`, `name` FROM `tenant`,`house` WHERE `tenant`.`house`=`house`.`house_id` AND `house`.`landlord_email`='{$_SESSION['landlord_email']}'");
if (!$select_tenant) {
  echo "error".mysqli_error($con);
}else {
  while ($tenant = mysqli_fetch_array($select_tenant)) {
    $tn = $tenant['tenant_id'];
     ?>
     <tr>
      <td>1</td>
      <td><?=$tenant['firstname']?></td>
      <td><?=$tenant['lastname']?></td>
      <td><?=$tenant['idno']?></td>
      <td><?=$tenant['email']?></td>
      <td><?=$tenant['Occupation']?></td>
      <td><?=$tenant['house']?></td>
      <td><button class="btn btn-sm btn-success" id="delete_tn<?=$tn?>">Delete</button></td>
    </tr>


<script>
  $("#delete_tn<?=$tn?>").click(function(){
    var url = "config/delete_ten.php";
    var data = "<?=$tn?>";
    $.post(url, {tn_id:data}, function(res){
          alert(res);

           $("#landlord_concepts").load('tenants/view_tenants.php');
          })
  })
</script>
     <?php
  }
}

                     ?>
									</tbody>
								</table>
							</div>
