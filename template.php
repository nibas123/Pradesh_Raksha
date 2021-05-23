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
@media screen and (max-width: 992px) {

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
                <a class="nav-link" href="#myAlert" data-toggle="collapse">Alert</a>
            </li>
        </ul>
</nav>
<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-light pl-0" id="sidebar" role="navigation" style="height:100vh">
            <ul class="nav flex-column sticky-top pl-0 pt-5 mt-3">
			<li class="nav-item">
			<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                
                    <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Facility▾</a>
                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                       <li class="nav-item"><a class="nav-link" href="">Add</a></li>
                       <li class="nav-item"><a class="nav-link" href="">Update</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Facility in Use</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Change Password</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Signout</a></li>
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
});
  </script>
</body>
</html>
