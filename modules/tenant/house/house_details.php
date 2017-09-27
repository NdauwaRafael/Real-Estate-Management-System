<div class="col_1">

			<div class="col-md-6 ">
				<div class="activity_box activity_box1">
					<h3>House Details</h3>
					<div class="scrollbar" id="style-3">

<div class="col-xs-6">
<img src="../../assets/images/house110.png" class="img-responsive" alt="" style="width:100%">
</div>

<div class="col-xs-6"><!--//Start column division 2 -->
            <div class="switch-right-grid">
            						<div class="switch-right-grid1">
                          <?php
                          session_start();
                          require "../config/connect.php";
                          $load = mysqli_query($con,"SELECT * FROM `house`,`tenant` WHERE `house`.`house_id`=`tenant`.`house` AND `tenant`.`email`='{$_SESSION['tenant_email']}'  ") or die(mysqli_error($con));
                          while ($house = mysqli_fetch_array($load)) {
                            $hse_name = $house['name'];
                            $hse_cat = $house['category'];
                            $hse_desc = $house['description'];
                            $hse_rent = $house['cost'];
                          }

                           ?>

            							<h4>House <?=$hse_name?></h4>
            							<p><?=$hse_desc?>.</p>
            							<ul>
            								<li>Monthly Rent: Ksh. <?=$hse_rent?></li>
            								<li>House Category: <?=$hse_cat?></li>
            							</ul>

            						</div>
            					</div>
</div><!--//end column division-->
					</div>

				</div>
			</div>
<!--=========================================================================================================
      //Estate Details
=======================================================================================================-->
			<div class="col-md-6 ">
				<div class="activity_box activity_box2">
					<h3>Estate Details</h3>
					<div class="scrollbar" id="style-2">
						<div class="activity-row activity-row1">

<div class="col-md-6">
<img src="../../assets/images/buildings9.png" class="img-responsive" alt="" style="width:100%">
</div>

<div class="col-md-6">

  <?php
  $load_est = mysqli_query($con,"SELECT `estate`.`name` as `est_nam`, `estate`.`category` as `est_cat`, `location`, `units`, `estate`.`description` as `est_desc` FROM `estate`,`tenant`,`house` WHERE `estate`.`estate_id`=`house`.`estate` AND `house`.`house_id`=`tenant`.`house` AND `tenant`.`email`='{$_SESSION['tenant_email']}'  ") or die(mysqli_error($con));
  while ($estate = mysqli_fetch_array($load_est)) {
    $est_name = $estate['est_nam'];
    $est_cat = $estate['est_cat'];
    $est_desc = $estate['est_desc'];
    $est_location = $estate['location'];

  }

   ?>
   <div class="switch-right-grid">
   <h4>House <?=$est_name?></h4>
   <p><?=$est_desc?>.</p>
   <ul>
     <li>Estate Location:  <?=$est_location?></li>
     <li>Estate Category: <?=$est_cat?></li>
   </ul>
 </div>
</div>
						</div>
					</div>

				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>

		</div>
