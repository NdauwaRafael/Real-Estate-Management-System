<h3 class="blank1">Landlord | View House Single Units</h3>


							<div class="panel-heading panel-success">
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>
											<th>Date</th>
											<th>Tenant</th>
											<th>House</th>
                      <th>Action</th>
                      <th>Option</th>
										</tr>
									</thead>
									<tbody>

                    <?php
                    session_start();
                    require '../config/connect.php';
                      $select_complaint = mysqli_query($con, "SELECT `complaint_id`, `complain_date`, `complaint`.`tenant` as `comp_ten`, `message`, `response`, `response_date`, `complaint`.`status` AS `comp_stat`,`firstname`, `lastname`, `name`  FROM `complaint`,`tenant`,`house` WHERE `complaint`.`status`='New' AND `tenant`.`house`=`house`.`house_id` AND `complaint`.`tenant` = `tenant`.`email` ");
if (!$select_complaint) {
  echo "error".mysqli_error($con);
}else {
  while ($complaint = mysqli_fetch_array($select_complaint)) {
    $cp = $complaint['complaint_id'];
     ?>
     <tr>
      <td>1</td>
      <td><?=$complaint['complain_date']?></td>
      <td><?=$complaint['firstname']." ".$complaint['lastname']?></td>
      <td><?=$complaint['name']?></td>
      <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#more_hs<?=$cp?>">View</button></td>
      <td><button class="btn btn-sm btn-warning" id="ignore_comp<?=$cp?>">Ignore</button></td>
    </tr>



    <!-- ================================================================================================
             //Popup to display house information
  ==================================================================================================== -->
    <div class="modal fade" id="more_hs<?=$cp?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Complaint By: (<?=$complaint['firstname']." ".$complaint['lastname']?>) </h4>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
            				<div class="activity_box activity_box1">
            					<h3>chat</h3>
            					<div class="scrollbar" id="style-1">
            						<div class="activity-row activity-row1">
            							<div class="col-xs-3 activity-img"><img src="images/1.png" class="img-responsive" alt=""><span><?=$complaint['complain_date']?></span></div>
            							<div class="col-xs-7 activity-img2">
            								<div class="activity-desc-sub">
            									<h5><?=$complaint['firstname']." ".$complaint['lastname']?></h5>
            									<p><?=$complaint['message']?></p>
            								</div>
            							</div>
            							<div class="col-xs-4 activity-desc1"></div>
            							<div class="clearfix"> </div>
            						</div>




<br>
<div id="comp_rep_status<?=$cp?>"></div>
            					<form id="reply<?=$cp?>" >
                        <div class="form-group">
                           <label >Respond to the Complaint</label>
            						<textarea class="form-control" id="complaints_msg<?=$cp?>" rows="3"  required="" rows="50" ></textarea>
                      </div>
            						<button class="btn btn-primary pull-right" id="reply_complaint_btn<?=$cp?>">Reply!!</button>
            					</form>
                      </div>
            				</div>
            			</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="close_cop<?=$cp?>" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

<script>
  $("#ignore_comp<?=$cp?>").click(function(){

    var url = "config/ignore_comp.php";
    var data = "<?=$cp?>";
    $.post(url, {id:data}, function(res){
          alert(res);

           $("#landlord_concepts").load('complaints/complaints.php');
          })
  })

  $("#reply_complaint_btn<?=$cp?>").click(function(){

    var compl = $("#complaints_msg<?=$cp?>").val();
    var Id = "<?=$cp?>";
    var url = "config/reply_complaint.php";
    if (compl=='') {
       $("#comp_rep_status<?=$cp?>").html('Fill In The Response first. The Response Cannot Be Empty').css('color','red');
    }else{
      $.post(url,{data:compl, id:Id},function(resp){
        if (resp=='success') {
            $("#comp_rep_status<?=$cp?>").html('<div class="alert alert-success" role="alert"><strong>Success!!</strong> You Have Successfully Reponded.</div>');

            $("#landlord_concepts").load('complaints/complaints.php');
        }else{
            $("#comp_rep_status<?=$cp?>").html(resp);
        }

      })
    }
  })


</script>
     <?php
  }
}

                     ?>
									</tbody>
								</table>
							</div>
