<h3 class="blank1">Landlord | View landlord Single Units</h3>


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
                      <th>Action</th>
										</tr>
									</thead>
									<tbody>

  <?php
  session_start();
  require '../config/connect.php';
    $select_lanlord = mysqli_query($con, "SELECT * FROM `landlord`") ;
if (!$select_lanlord) {
  echo "error".mysqli_error($con);
}else {
  while ($landlord = mysqli_fetch_array($select_lanlord)) {
    $tn = $landlord['landlord_id'];
     ?>
     <tr>
      <td>1</td>
      <td><?=$landlord['firstname']?></td>
      <td><?=$landlord['lastname']?></td>
      <td><?=$landlord['idno']?></td>
      <td><?=$landlord['email']?></td>

      <td><button class="btn btn-sm btn-success" id="delete_tn<?=$tn?>">Delete</button></td>
    </tr>


<script>
  $("#delete_tn<?=$tn?>").click(function(){
    var url = "config/delete_lan.php";
    var data = "<?=$tn?>";
    $.post(url, {ln_id:data}, function(res){
          alert(res);

            $("#landlord_concepts").load('landlord/view_landlord.php');
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
