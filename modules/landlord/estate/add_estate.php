<h3 class="blank1">Landlord | Add Estate</h3>
        <div class="activity_box ">
          <h3>Add an Estate</h3>
          <div class="scrollbar scrollbar1" id="style-3">
      <div class="tab-content">
      <div class="tab-pane active" id="horizontal-form">
      <div id="add_status"></div>
        <form class="form-horizontal" id="add_estate_frm" action="config/add_estate.php">
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Estate Name</label>
            <div class="col-sm-8">
              <input type="text" name="name" class="form-control1" id="focusedinput" placeholder="Name/Number of the Estate">
            </div>
          </div>
          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Estate Cartegory</label>
            <div class="col-sm-8">
            <select name="category" id="selector1" class="form-control1">
              <option value="">........................[SELECT].................................</option>
              <option> Apartment</option>
              <option>Bungalow</option>
              <option>Mansion</option>
              <option>Cottage</option>

            </select></div>
          </div>

          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Estate Location</label>
            <div class="col-sm-8">
              <select name="location"  id="estate_list" class="form-control1">
                <option  value="">........................[SELECT].................................</option>
              <option> Bamburi</option>
              <option> Kizingo</option>
              <option>Likoni</option>
              <option>Mtwapa</option>              
              <option>Nyali</option>

            </select>
          </div>
          </div>
          <div class="form-group">
            <label for="mediuminput" class="col-sm-2 control-label">Number of Units</label>
            <div class="col-sm-8">
              <input type="number" name="units" class="form-control1" id="mediuminput" placeholder="Number of Units">
            </div>
          </div>

          <div class="form-group">
            <label for="txtarea1" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-8"><textarea name="description" id="txtarea1" cols="50" rows="70" class="form-control1"></textarea></div>
          </div>


            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn-success btn">Add Estate Now!!</button>
            </div>

        </form>
      </div>
    </div>

    <!--=======================================================================-->
    <!-- Scripts for Registering the house -->
    <!--=======================================================================-->

<script>
    $("#add_estate_frm").submit(function(evt){
         evt.preventDefault();

         var url = $(this).attr('action');
         var postData = $(this).serialize();

         $.post(url, postData, function(responce){
                $("#add_status").html(responce).show();
                $("#add_estate_frm")[0].reset();
               })
      })

</script>
