<h3 class="blank1">Tenant | Grievances And Responses</h3>

<div class="col_1">
			<div class="col-md-4 span_8">
				<div class="activity_box">
					<h3>New Unresponded</h3>
					<div class="scrollbar scrollbar1" id="style-2">
<?php
session_start();
require "../config/connect.php";

$select_new = mysqli_query($con, "SELECT * FROM `complaint` WHERE `tenant`='{$_SESSION['tenant_email']}' AND `status`='New' ORDER BY `complaint`.`complain_date` DESC");

while ($new_msg=mysqli_fetch_array($select_new)) {
  $date = $new_msg['complain_date'];
  $msg = $new_msg['message'];
  $new_id = $new_msg['complaint_id'];

?>

<div class="activity-row">
  <div class="col-xs-3 activity-img"><img src="../../assets/images/msg.png" class="img-responsive" alt=""></div>
  <div class="col-xs-7 activity-desc">
    <h5><a data-toggle="modal" data-target="#unanswered<?=$new_id?>">Unanswered Complaint</a></h5>
    <p>Waiting to be reviewed......</p>
  </div>
  <div class="col-xs-2 activity-desc1"><h6><?=$date?></h6></div>
  <div class="clearfix"> </div>
</div>

<!-- Modal -->
<div class="modal fade" id="unanswered<?=$new_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Grievance at (<?=$date?>)</h4>
      </div>
      <div class="modal-body">

                <div class="activity_box activity_box1">
                  <div class="scrollbar" id="style-1">
                    <div class="activity-row activity-row1">
                      <div class="col-xs-3 activity-img"><img src="../../assets/images/sad.png" class="img-responsive" alt=""><span><?=$date?></span></div>
                      <div class="col-xs-7 activity-img2">
                        <div class="activity-desc-sub">
													<h2>Me:</h2>
                          <h5>Grievance message</h5><hr>
                          <p><strong><?=$msg?></strong></p>
                        </div>
                      </div>
                      <div class="col-xs-4 activity-desc1"></div>
                      <div class="clearfix"> </div>
                    </div>



                  </div>
                </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<?php
}

 ?>


					</div>
				</div>
			</div>


			<div class="col-md-4 span_8">
				<div class="activity_box activity_box1">
					<h3>Responded Grievances</h3>
					<div class="scrollbar" id="style-2">
<?php
$select_res = mysqli_query($con, "SELECT * FROM `complaint` WHERE `tenant`='{$_SESSION['tenant_email']}' AND `status`='Responded' ORDER BY `complaint`.`complain_date` DESC");

while ($respond=mysqli_fetch_array($select_res)) {
  $date = $respond['complain_date'];
  $msg = $respond['message'];
  $res_id = $respond['complaint_id'];

  $res = $respond['response'];
  $res_date = $respond['response_date'];

?>
<div class="activity-row">
  <div class="col-xs-3 activity-img"><img src="../../assets/images/box.png" class="img-responsive" alt=""></div>
  <div class="col-xs-7 activity-desc">
    <h5><a data-toggle="modal" data-target="#answered<?=$res_id?>">Answered Complaint</a></h5>
    <p>Chat Strings......</p>
  </div>
  <div class="col-xs-2 activity-desc1"><h6><?=$date?></h6></div>
  <div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>


<!-- Modal -->
<div class="modal fade" id="answered<?=$res_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Grievance at (<?=$date?>)</h4>
      </div>
      <div class="modal-body">


        <div class="activity-row activity-row1">
          <div class="col-xs-2 activity-desc1"></div>
          <div class="col-xs-7 activity-img2">
            <div class="activity-desc-sub1">
              <h5>Me:</h5>
              <p><?=$msg?></p>
            </div>
          </div>
          <div class="col-xs-3 activity-img"><img src="../../assets/images/sad.png" class="img-responsive" alt=""><span><?=$date?></span></div>
          <div class="clearfix"> </div>
        </div>

        <div class="activity-row activity-row1">
          <div class="col-xs-3 activity-img"><img src="../../assets/images/reading.png" class="img-responsive" alt=""><span><?=$res_date?></span></div>
          <div class="col-xs-5 activity-img2">
            <div class="activity-desc-sub">
              <h5>Gichaga Realtors:</h5>
              <p><strong><?=$res?></strong></p>
            </div>
          </div>
          <div class="col-xs-4 activity-desc1"></div>
          <div class="clearfix"> </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>





<?php
}
?>
</div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>

</div>





			<div class="col-md-4 span_8">
				<div class="activity_box activity_box2">
					<h3>Other Achieved Messages</h3>
					<div class="scrollbar" id="style-2">
						<div class="activity-row activity-row1">
							<div class="single-bottom">
                      <?php
                      $select_oth = mysqli_query($con, "SELECT * FROM `complaint` WHERE `tenant`='{$_SESSION['tenant_email']}' AND `status`!='Responded' AND `status`!='New' ORDER BY `complaint`.`complain_date` DESC");

                      while ($other=mysqli_fetch_array($select_oth)) {
                        $date = $other['complain_date'];
                        $msg = $other['message'];
                        $oth_id = $other['complaint_id'];

                        $oth = $other['response'];
                        $oth_date = $other['response_date'];

                      ?>
                      <div class="activity-row">
                        <div class="col-xs-3 activity-img"><img src="../../assets/images/box.png" class="img-responsive" alt=""></div>
                        <div class="col-xs-7 activity-desc">
                          <h5><a data-toggle="modal" data-target="#other<?=$oth_id?>">Achieved Message</a></h5>
                          <p>Message was achieved......</p>
                        </div>
                        <div class="col-xs-2 activity-desc1"><h6><?=$date?></h6></div>
                        <div class="clearfix"> </div>
                      </div>
                      <div class="clearfix"> </div>


                      <!-- Modal -->
                      <div class="modal fade" id="other<?=$oth_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Grievance at (<?=$date?>)</h4>
                            </div>
                            <div class="modal-body">


                              <div class="activity-row activity-row1">
                                <div class="col-xs-2 activity-desc1"></div>
                                <div class="col-xs-7 activity-img2">
                                  <div class="activity-desc-sub1">
                                    <h5>Me:</h5>
                                    <p><?=$msg?></p>
                                  </div>
                                </div>
                                <div class="col-xs-3 activity-img"><img src="../../assets/images/sad.png" class="img-responsive" alt=""><span><?=$date?></span></div>
                                <div class="clearfix"> </div>
                              </div>

                              <div class="activity-row activity-row1">
                                <div class="col-xs-3 activity-img"><img src="../../assets/images/reading.png" class="img-responsive" alt=""><span><?=$res_date?></span></div>
                                <div class="col-xs-5 activity-img2">
                                  <div class="activity-desc-sub">
                                    <h5>Gichaga Realtors:</h5>
                                    <p><strong>Message was achieved.</strong></p>
                                  </div>
                                </div>
                                <div class="col-xs-4 activity-desc1"></div>
                                <div class="clearfix"> </div>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                          </div>
                        </div>
                      </div>





                      <?php
                      }
                      ?>
							</div>
						</div>
					</div>

				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>

		</div>
