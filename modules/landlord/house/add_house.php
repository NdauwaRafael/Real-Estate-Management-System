<h3 class="blank1">Landlord | Add House</h3>
        <div class="activity_box ">
          <h3>Add Individual House Units</h3>
          <div class="scrollbar scrollbar1" id="style-3">
      <div class="tab-content">
      <div class="tab-pane active" id="horizontal-form">
      <div id="add_status"></div>
        <form class="form-horizontal" id="add_house_frm" action="config/add_house.php">
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">House Name</label>
            <div class="col-sm-8">
              <input type="text" name="name" class="form-control1" id="focusedinput" placeholder="Name/Number of the house">
            </div>
          </div>
          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">House Cartegory</label>
            <div class="col-sm-8">
            <select name="category" id="selector1" class="form-control1">
              <option value="">........................[SELECT].................................</option>
              <option>Single Room</option>
              <option>Double Room</option>
              <option>Bed Sitter</option>
              <option>One Bedroom Apartment</option>
              <option>Two Bedroom Apartment</option>
              <option>Three Bedroom Bedroom Apartment</option>
              <option>Two Bedroom Mansion</option>
              <option>Three Bedroom Mansion</option>
              <option>Four Bedroom Mansion</option>

            </select></div>
          </div>

          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Estate</label>
            <div class="col-sm-8">
              <select name="estate"  id="estate_list" class="form-control1">
                <option  value="">........................[SELECT].................................</option>
              <?php
              session_start();
              require '../config/connect.php';
                 $query = mysqli_query($con,"SELECT * FROM `estate` WHERE `owner`='{$_SESSION['landlord_email']}' ORDER BY `estate`.`name` ASC");
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
            <label for="mediuminput" class="col-sm-2 control-label">Rent Cost</label>
            <div class="col-sm-8">
              <input type="number" name="rent" class="form-control1" id="mediuminput" placeholder="Rent (Ksh/Month)">
            </div>
          </div>

          <div class="form-group">
            <label for="txtarea1" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-8"><textarea name="description" id="txtarea1" cols="50" rows="70" class="form-control1"></textarea></div>
          </div>


            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn-success btn">Add House Now!!</button>
            </div>

        </form>
      </div>
    </div>

    <!--=======================================================================-->
    <!-- Scripts for Registering the house -->
    <!--=======================================================================-->

<script>
    $("#add_house_frm").submit(function(evt){
         evt.preventDefault();

         var url = $(this).attr('action');
         var postData = $(this).serialize();

         $.post(url, postData, function(responce){
                $("#add_status").html(responce).show();
                $("#add_house_frm")[0].reset();
               })
      })

</script>
