<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
$nameofuser="";
$catid="";
$sql_nameofuser="select nameofuser,catid from m_address where loginid='".$loginid."' and isactive='1'";
$list=$db->select($sql_nameofuser);
foreach($list as $listitem){
	$nameofuser=$listitem['nameofuser'];
	$catid=$listitem['catid'];
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pradesh Raksha User Dashboard</title>
  <base target="_self">
  
  <link rel="shortcut icon" href="">

  
  <!--stylesheets / link tags loaded here-->

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
 
  

  <style type="text/css">body, html {
  height:100%;
}

/*
 * Off Canvas sidebar at medium breakpoint
 * --------------------------------------------------
 */
@media screen and (max-width: 768px) {

  .row-offcanvas {
    position: relative;
    -webkit-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    transition: all 0.25s ease-out;
  }

  .row-offcanvas-left
  .sidebar-offcanvas {
    left: -33%;
  }

  .row-offcanvas-left.active {
    left: 33%;
    margin-left: -6px;
  }

  .sidebar-offcanvas {
    position: absolute;
    top: 0;
    width: 33%;
    height: 100%;
  }
}

/*
 * Off Canvas wider at sm breakpoint
 * --------------------------------------------------
 */
@media screen and (max-width: 34em) {
  .row-offcanvas-left
  .sidebar-offcanvas {
    left: -45%;
  }

  .row-offcanvas-left.active {
    left: 45%;
    margin-left: -6px;
  }
  
  .sidebar-offcanvas {
    width: 45%;
  }
}

.card {
    overflow:hidden;
}

.card-body .rotate {
    z-index: 8;
    float: right;
    height: 100%;
}

.card-body .rotate i {
    color: rgba(20, 20, 20, 0.15);
    position: absolute;
    left: 0;
    left: auto;
    right: -10px;
    bottom: 0;
    display: block;
    -webkit-transform: rotate(-44deg);
    -moz-transform: rotate(-44deg);
    -o-transform: rotate(-44deg);
    -ms-transform: rotate(-44deg);
    transform: rotate(-44deg);
}
</style>

</head>
<body >
  
  
  
  <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary mb-3">
    <div class="flex-row d-flex">
        <button type="button" class="navbar-toggler mr-2 " data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" title="Pradsh Raksha">Pradesh Raksha</a>
    </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse">Hi, <?php echo $nameofuser; ?></a>
            </li>
        </ul>
</nav>
<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-light pl-0" id="sidebar" role="navigation" style="height:100vh">
            <ul class="nav flex-column sticky-top pl-0 pt-5 mt-3">
			<li class="nav-item"><a class="nav-link" href="#" id="lnkHome">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#" id="lnkProfile">Profile</a></li>
				<?php
				if($catid==6){
					?>
              	<li class="nav-item"><a class="nav-link" href="visualMap.php" target="_blank" id="lnkVisualMap">Visual Map</a></li>
			
        <?php
        }
				if($catid==7){
					?>
                <li>
                <li class="nav-item"><a class="nav-link" href="#" id="lnkCCC">CCC Passenger Registration</a></li>
                <li class="nav-item"><a class="nav-link" href="#" id="ccccregdet">CCC Passeenger Data</a></li>
                    <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">   Center Facility▾</a>
                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                       <li class="nav-item"><a class="nav-link" href="#" id="lnkFacAdd2">Add Covid Center</a></li>
                       <!--li class="nav-item"><a class="nav-link" href="#" id="lnkFacUpdate">Update</a></li-->
                    </ul>
                </li>
				<li class="nav-item"><a class="nav-link" href="CovidFacilityInUse.php" id="lnkFacInUse2">Daily Report</a></li>
        <li class="nav-item"><a class="nav-link" href="#" id="lnkFacInUse3">View Report</a></li>
        
         <?php
        }
				else{
				?>
			   <li>
                    <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Facility▾</a>
                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                       <li class="nav-item"><a class="nav-link" href="#" id="lnkFacAdd">Add</a></li>
                       <li class="nav-item"><a class="nav-link" href="#" id="lnkFacUpdate">Update</a></li>
                    </ul>
                </li>
				<li class="nav-item"><a class="nav-link" href="#" id="lnkFacInUse">Facility in Use</a></li>
			
				<?php
				}
				?>
                <li class="nav-item"><a class="nav-link" href="#" id="lnkChangePassword">Change Password</a></li>
                <li class="nav-item"><a class="nav-link" href="serviceSignout.php" id="lnkSignout" style="color:red">Signout</a></li>
            </ul>
        </div>
        <!--/col-->

        <div id="divContent" class="col main pt-5 mt-3">
       
        </div>
        <!--/main col-->
    </div>

</div>
<!--/.container-->
<!--<footer class="container-fluid">
    <p class="text-right small">©2016-2018 Company</p>
</footer>
-->  

  
  <!--scripts loaded here-->
  
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  
  
  <script>
 $(document).ready(function() {
  
  $('[data-toggle=offcanvas]').click(function() {
      $('.row-offcanvas').toggleClass('active');
    });
    
  $("#divContent").load("generalAlerts.php");
  
  $("#lnkHome").click(function() {
    $("#divContent").load("generalAlerts.php");
  });
  $("#lnkProfile").click(function() {
    $("#divContent").load("profileUpdate.php");
  });
  $("#lnkChangePassword").click(function() {
    $("#divContent").load("changePassword.php");
  });
  $("#lnkFacAdd").click(function() {
    $("#divContent").load("hospitalFacilityAdd.php");
  });
  $("#lnkFacAdd2").click(function() {
    $("#divContent").load("CovidFacilityAdd.php");
  });
  $("#lnkCCC").click(function() {
    $("#divContent").load("CCcRegistration.php");
  });
  $("#lnkFacUpdate").click(function() {
    $("#divContent").load("hospitalFacilityUpdate.php");
  });
  $("#lnkFacInUse").click(function() {
    $("#divContent").load("hospitalFacilityInUse.php");
  });
  $("#ccccregdet").click(function() {
  $("#divContent").load("cccregdet.php");
});
  $("#lnkFacInUse2").click(function() {
    $("#divContent").load("CovidFacilityInUse.php");
  });
  $("#lnkFacInUse3").click(function() {
    $("#divContent").load("facc.php");
  });
  });

  </script>
</body>
</html>
