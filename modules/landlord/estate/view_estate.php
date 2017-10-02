<h3 class="blank1">Landlord | View Owned/Managed Estates</h3>


							<div class="panel-heading panel-success">
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>
											<th>Estate Name</th>
											<th>Estate Location</th>
											<th>Category</th>
                      <th>Action</th>
										</tr>
									</thead>
									<tbody>

                    <?php
                    session_start();
                    require '../config/connect.php';
                      $select_estate = mysqli_query($con, "SELECT * FROM `estate` WHERE `owner`='{$_SESSION['landlord_email']}'");
if (!$select_estate) {
  echo "error".mysqli_error($con);
}else {
  while ($estate = mysqli_fetch_array($select_estate)) {
    $es = $estate['estate_id'];
     ?>
     <tr>
      <td>1</td>
      <td><?=$estate['name']?></td>
      <td><?=$estate['location']?></td>
      <td><?=$estate['category']?></td>
      <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#more_es<?=$es?>">View</button></td>
    </tr>



    <!-- ================================================================================================
             //Popup to display house information
  ==================================================================================================== -->
    <div class="modal fade" id="more_es<?=$es?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Estate Name: (<?=$estate['name']?>) </h4>
          </div>
          <div class="modal-body">
                <div class="table-responsive">
                  <ul class="list-group">
                    <li class="list-group-item">Estate Name: <strong><?=$estate['name']?></strong></li>
                    <li class="list-group-item">estate Location: <strong><?=$estate['location']?></strong></li>
                    <li class="list-group-item">Estate Category: <strong><?=$estate['category']?></strong></li>
                    <li class="list-group-item">Units Number: <strong><?=$estate['units']?></strong></li>
                    <li class="list-group-item">Description: <strong><?=$estate['description']?></strong></li>
                  </ul>

                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="delete_es<?=$es?>" data-dismiss="modal">Delete Unit</button>
          </div>
        </div>
      </div>
    </div>

<script>
  $("#delete_es<?=$es?>").click(function(){
    var url = "config/delete_es.php";
    var data = "<?=$es?>";
    $.post(url, {es_id:data}, function(res){
          alert(res);

           $("#landlord_concepts").load('estate/view_estate.php');
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
