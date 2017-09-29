<?php
session_start();
require "config/connect.php";
include "config/landlord.php";

if (!landlord_loggedin()) {
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
        <li><a id="bills"><i class="lnr lnr-cog"></i><span>Bills</span></a></li>
        <li><a id="complaints"><i class="lnr lnr-cog"></i><span>Complaints</span></a></li>
        <li class="menu-list">
          <a href="#"><i class="fa fa-building-o"></i>
            <span>Houses</span></a>
            <ul class="sub-menu-list">
              <li><a id="add_house">Add House</a> </li>
              <li><a id="view_house">View Houses</a></li>
            </ul>
        </li>



        <li class="menu-list">
          <a href="#"><i class="lnr lnr-indent-increase"></i>
            <span>Tenants</span></a>
            <ul class="sub-menu-list">
              <li><a id="add_tenants">Add Tenant</a> </li>
              <li><a id="view_tenants">View Tenants</a></li>
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
              <span style="background:url(images/1.jpg) no-repeat center"> </span>
               <div class="user-name">
                <p><?=$landlord_name?><span>Landlord</span></p>
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
  <div id="landlord_concepts"></div>
</div>
</div>
</div>
<?php include("../templates/footer.php"); ?>

<script>
$(function(){
  $('#add_house').click(function(){
    $("#landlord_concepts").load('house/add_house.php');
  });


  $("#view_house").click(function() {
     $("#landlord_concepts").load('house/view_house.php');
  })

  $("#add_tenants").click(function(){
    $("#landlord_concepts").load('tenants/add_tenant.php');
  })

  $("#view_tenants").click(function(){
    $("#landlord_concepts").load('tenants/view_tenants.php');
  })

  $("#complaints").click(function(){
    $("#landlord_concepts").load('complaints/complaints.php');
  })


$("#bills").click(function(){
  $("#landlord_concepts").load('bills/bills.php');
})
})
</script>
