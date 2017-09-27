<h3 class="blank1">Landlord | Add A Tenant</h3>
<div id="landlord_add_status"></div>
        <form class="form-horizontal" id="add_landlord_frm" action="config/add_landlord.php">
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
            <button type="submit" class="btn-success btn">Add Landlord Now!!</button>
            </div>

        </form>


    <!--=======================================================================-->
    <!-- Scripts for Registering the house -->
    <!--=======================================================================-->

<script>
    $("#add_landlord_frm").submit(function(evt){
         evt.preventDefault();

         var url = $(this).attr('action');
         var postData = $(this).serialize();

         $.post(url, postData, function(responce){
                $("#landlord_add_status").html(responce).show();
                $("#add_landlord_frm")[0].reset();
               })
      })


</script>
