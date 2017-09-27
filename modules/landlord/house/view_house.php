<h3 class="blank1">Landlord | View House Single Units</h3>


							<div class="panel-heading panel-success">
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>
											<th>House Name</th>
											<th>Estate Name</th>
											<th>Category</th>
                      <th>Action</th>
										</tr>
									</thead>
									<tbody>

                    <?php
                    session_start();
                    require '../config/connect.php';
                      $select_house = mysqli_query($con, "SELECT `house_id`, `house`.`name` as `hse_name`, `house`.`category` as `hse_cat`, `estate`, `house`.`description` as `hse_desc`, `cost`, `status`,`estate_id`,`estate`.`name` as `es_name` FROM `house`,`estate` WHERE `estate`.`estate_id` = `house`.`estate` AND `house`.`landlord_email`='{$_SESSION['landlord_email']}'");
if (!$select_house) {
  echo "error".mysqli_error($con);
}else {
  while ($house = mysqli_fetch_array($select_house)) {
    $hs = $house['house_id'];
     ?>
     <tr>
      <td>1</td>
      <td><?=$house['hse_name']?></td>
      <td><?=$house['es_name']?></td>
      <td><?=$house['hse_cat']?></td>
      <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#more_hs<?=$hs?>">View</button></td>
    </tr>



    <!-- ================================================================================================
             //Popup to display house information
  ==================================================================================================== -->
    <div class="modal fade" id="more_hs<?=$hs?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">House Number: (<?=$house['hse_name']?>) </h4>
          </div>
          <div class="modal-body">
                <div class="table-responsive">
                  <ul class="list-group">
                    <li class="list-group-item">House Number: <strong><?=$house['hse_name']?></strong></li>
                    <li class="list-group-item">estate Name: <strong><?=$house['es_name']?></strong></li>
                    <li class="list-group-item">House Rent: <strong>Ksh. <?=$house['cost']?></strong></li>
                    <li class="list-group-item">House Status: <strong><?=$house['status']?></strong></li>
                    <li class="list-group-item">Description: <strong><?=$house['hse_desc']?></strong></li>
                  </ul>

                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="delete_hse<?=$hs?>" data-dismiss="modal">Delete Unit</button>
          </div>
        </div>
      </div>
    </div>

<script>
  $("#delete_hse<?=$hs?>").click(function(){
    var url = "config/delete_hse.php";
    var data = "<?=$hs?>";
    $.post(url, {hs_id:data}, function(res){
          alert(res);

           $("#landlord_concepts").load('house/view_house.php');
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
