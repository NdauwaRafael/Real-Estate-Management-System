<h3 class="blank1">Tenant | Send A Grievance</h3>
<div id="tenant_complain_status"></div>
        <form class="form-horizontal" id="complain_tenant_frm" action="config/complain.php">
          <div class="form-group" id="griev_msg">
            <label for="focusedinput" class="col-sm-2 control-label"><i class="fa fa-commenting-o" aria-hidden="true"></i> Message</label>
            <div class="col-sm-8">

           <textarea rows="10" name="grievance" id="grievance" class="form-control"></textarea>
            </div>
          </div>


            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn-success btn"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Grievance Now!!</button>
            </div>

        </form>


    <!--=======================================================================-->
    <!-- Scripts for Registering the house -->
    <!--=======================================================================-->

<script>
    $("#complain_tenant_frm").submit(function(evt){
         evt.preventDefault();
        var msg = $("#grievance").val();
         var url = $(this).attr('action');
         var postData = $(this).serialize();

         if (msg=='') {
            $("#tenant_complain_status").html('Fill In The Complaint Before Submitting').css('color','red');
            $("#griev_msg").addclass('has-error');
         }else{

           $.post(url, postData, function(responce){
                if (responce=='Success') {
                  $("#tenant_complain_status").html('<div class="alert alert-success" role="alert"><strong>Success!! </strong> Your Complaint Has Been Submitted. Wait foe a response soon.</div>');
                  $("#complain_tenant_frm")[0].reset();
                }else {
                  $("#tenant_complain_status").html(responce);
                }

                 })
         }
      })


</script>
