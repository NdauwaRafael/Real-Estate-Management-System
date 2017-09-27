<?php
session_start();
require "config/connect.php";
require "config/tenant.php";

if (!tenant_loggedin()) {
  header("location: ../../index.php");
}

 ?>
<?php include("../templates/header.php"); ?>

<!-- left side start-->
<div class="left-side sticky-left-side">

  <!--logo and iconic logo start-->
  <div class="logo">
    <h1><a class="dashboard">Gichaga <span>Estate</span></a></h1>
  </div>
  <div class="logo-icon text-center">
    <a class="dashboard"><i class="lnr lnr-home"></i> </a>
  </div>

  <!--logo and iconic logo end-->
  <div class="left-side-inner">

    <!--sidebar nav start-->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <li><a class="dashboard"><i class="lnr lnr-power-switch"></i><span>Landlord Dashboard</span></a></li>
        <li class="menu-list">
          <a ><i class="lnr lnr-envelope"></i><span>Bills</span></a>
          <ul class="sub-menu-list">
            <li><a id="bills">Pay Bills</a> </li>
            <li><a id="view_bills">View Bills</a></li>
          </ul>
        </li>
        <li><a id="house_details"><i class="lnr lnr-cog"></i><span>House Details</span></a></li>
        <li class="menu-list">
          <a href="#"><i class="fa fa-building-o"></i>
            <span>Complaints</span></a>
            <ul class="sub-menu-list">
              <li><a id="complain">Complain</a> </li>
              <li><a id="view_complaints">View Complaints</a></li>
            </ul>
        </li>

      </ul>
    <!--sidebar nav end-->
  </div>
</div>
<!-- left side end-->

<!-- main content start-->
<div class="main-content main-content2 main-content2copy">
<!-- header-starts -->
<div class="header-section">

<!--toggle button start-->
<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
<!--toggle button end-->

<!--notification menu start -->
<div class="menu-right">
  <div class="user-panel-top">
    <div class="profile_details_left">

    </div>
    <div class="profile_details">
      <ul>
        <li class="dropdown profile_details_drop">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <div class="profile_img">
              <span style="background:url(../../assets/images/1.jpg) no-repeat center"> </span>
               <div class="user-name">
                <p><?=$tenant_name?><span>Tenant</span></p>
               </div>
               <i class="lnr lnr-chevron-down"></i>
               <i class="lnr lnr-chevron-up"></i>
              <div class="clearfix"></div>
            </div>
          </a>
          <ul class="dropdown-menu drp-mnu">
            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
            <li> <a id="profile"><i class="fa fa-user"></i>Profile</a> </li>
            <li> <a href="config/logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
          </ul>
        </li>
        <div class="clearfix"> </div>
      </ul>
    </div>
    <div class="social_icons">
      <div class="col-md-4 social_icons-left">
        <a href="#" class="yui"><i class="fa fa-facebook i1"></i><span>300<sup>+</sup> Likes</span></a>
      </div>
      <div class="col-md-4 social_icons-left pinterest">
        <a href="#"><i class="fa fa-google-plus i1"></i><span>500<sup>+</sup> Shares</span></a>
      </div>
      <div class="col-md-4 social_icons-left twi">
        <a href="#"><i class="fa fa-twitter i1"></i><span>500<sup>+</sup> Tweets</span></a>
      </div>
      <div class="clearfix"> </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!--notification menu end -->
</div>
<!-- //header-ends -->



<div id="page-wrapper">
  <div class="graphs">
    <div class="scrollbar scrollbar1" id="style-3">
  <div id="tenants_concepts"></div>
</div>
</div>
</div>
<?php include("../templates/footer.php"); ?>

<script>
$(function(){
  $('#complain').click(function(){
    $("#tenants_concepts").load('complaints/complain.php');
  });


  $("#view_complaints").click(function() {
     $("#tenants_concepts").load('complaints/view_complaints.php');
  })

  $("#house_details").click(function(){
    $("#tenants_concepts").load('house/house_details.php');
  })

  $("#bills").click(function(){
    $("#tenants_concepts").load('bills/bills.php');
  })

  $("#view_bills").click(function(){
    $("#tenants_concepts").load('bills/view_bills.php');
  })
})
</script>
