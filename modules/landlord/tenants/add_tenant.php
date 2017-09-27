<h3 class="blank1">Landlord | Add A Tenant</h3>
<div id="tenant_add_status"></div>
        <form class="form-horizontal" id="add_tenant_frm" action="config/add_tenant.php">
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-8">
              <input type="text" name="firstname" class="form-control1" id="focusedinput" placeholder="Tenant's First Name">
            </div>
          </div>

          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-8">
              <input type="text" name="lastname" class="form-control1" id="focusedinput" placeholder="Tenant's Last">
            </div>
          </div>

          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Email Address</label>
            <div class="col-sm-8">
              <input type="email" name="email" class="form-control1" id="focusedinput" placeholder="Tenant's Email Address">
            </div>
          </div>

          <div class="form-group">
            <label for="mediuminput" class="col-sm-2 control-label">Identity Number</label>
            <div class="col-sm-8">
              <input type="number" name="idno" class="form-control1" id="mediuminput" placeholder="Tenant's National Identity Number">
            </div>
          </div>

          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Occupation</label>
            <div class="col-sm-8">
              <input type="text" name="occupation" class="form-control1" id="focusedinput" placeholder="Tenant's Occupation">
            </div>
          </div>

          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Estate</label>
            <div class="col-sm-8">
              <select name="estate"  id="estate_list" onchange="load_houses()" class="form-control1">
                <option  value="">........................[SELECT].................................</option>
              <?php
              session_start();
              require '../config/connect.php';
                 $query = mysqli_query($con,"SELECT * FROM `estate` WHERE `owner`='{$_SESSION['landlord_email']}'");
                  while ($estate = mysqli_fetch_array($query)) {
                    ?>
                    <option  value="<?=$estate['estate_id']?>"><?=$estate['name']?></option>
                    <?php
                  }
               ?>
            </select>
          </div>
          </div>

          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">House</label>
            <div class="col-sm-8">
              <select name="house"  id="house_list" class="form-control1">
                <option  value="">........................[SELECT].................................</option>

            </select>
          </div>
          </div>

          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
              <input type="text" name="password" class="form-control1" id="focusedinput" placeholder="*******************">
            </div>
          </div>

          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-8">
              <input type="text" name="cpassword" class="form-control1" id="focusedinput" placeholder="*************">
            </div>
          </div>

            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn-success btn">Add Tenant Now!!</button>
            </div>

        </form>


    <!--=======================================================================-->
    <!-- Scripts for Registering the house -->
    <!--=======================================================================-->

<script>
    $("#add_tenant_frm").submit(function(evt){
         evt.preventDefault();

         var url = $(this).attr('action');
         var postData = $(this).serialize();

         $.post(url, postData, function(responce){
                $("#tenant_add_status").html(responce).show();
                $("#add_tenant_frm")[0].reset();
               })
      })

function load_houses(){
  var esto=$("#estate_list").val();
  $.post('config/load_house.php',{estate:esto},function(house){
    $("#house_list").html("");
    $("#house_list").append(house);
  })
}
</script>
