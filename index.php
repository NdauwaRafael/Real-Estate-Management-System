<?php require('inc/header.php'); ?>
<div class="row home-bg" >

<div class="container">


<div class="row">
  <div class="col-md-offset-3 col-sm-6 col-md-6">
   <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Login to Real-Estate System</h3>
    </div>
      <div class="panel-body">
        <form id="login_frm" action="modules/config/login.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="lgn_email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="lgn_password" placeholder="Password">
          </div>
             <div id="status"></div>

          <div class="form-group" id="user_div">
                  <label>Login as?</label>
                  <select class="form-control" name="user" id="user_cartegory">
                    <option value="">=============[SELECT CATEGORY]===================</option>
                    <option value="tenant">Tenant</option>
                    <option value="landlord">Landlord</option>
                    <option value="admin">Admin</option>
                  </select>
          </div>

              <button type="submit" id="login_btn" class="btn btn-success">Sign In</button>
              <a href="register.php" class="btn btn-danger">Sign Up</a>
        </form>
      </div>
  </div>
    </div>
  </div>


</div>
</div>

<script type="text/javascript">

$(function() {


  $("#login_frm").submit(function(evt){
     evt.preventDefault();

     var url = $(this).attr('action');
     var postData = $(this).serialize();
     var user_cat = $("#user_cartegory").val();

if (user_cat=='') {
   $("#user_div").addClass('has-error');
   $("#status").html('Select a user category first!!').css("color","red");
}else{

    $("#user_div").removeClass('has-error');
    $("#status").html('');
     $.post(url, postData, function(responce){
              $("#status").html(responce).css("color","red");

     })
}

  })
})
</script>
