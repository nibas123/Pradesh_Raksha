<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pradesh Raksha User Dashboard</title>
  <base target="_self">
  
  <link rel="shortcut icon" href="">

  
  <!--stylesheets / link tags loaded here-->

  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />
 
  

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
        <a class="navbar-brand" href="#" title="Pradsh Raksha">Pradesh Raksha-Admin</a>
    </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
				<a class="nav-link" href="#" data-toggle="collapse">Hi, <?php echo $_SESSION['ses_nameofuser']; ?></a>
				
            </li>
        </ul>
</nav>
<?php
?>

<script type="text/javascript">

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>


<?php
include("connection.php");
$query="select estname,date,city,nM1, nF1, tIn1, nM2, nF2, tIn2, nms, nfs, nmf, nff, nmis, nfis, nrm, nrf, nrlm, nrlf, nim, nif, npsm, npsf, symp, td, nopc, trna, tno  FROM m_ciused,m_address WHERE m_ciused.loginid=m_address.loginid";

$data=array();
$format=array();	
$result=$db->selectData($query,$data,$format);
	
?>
<html>
	<body>
<P>kgjadlbvadljvbad;ndsgvhds gnvsdbg,jcnanhvbmdjscfhkdsjdskjbfuvbjvbfvljbsvljsfvfhfhnbvnfmjbgymjnymbyjm</P>

	
	</body>
  <table>
	</thead>
		<tbody>	 
	<div class="table-responsive-md">  								
		<table class="table" id="tblData">
			
		<thead class="thead-light">
		
		<tr class="table table-bordered">
    <th colspan="7"></th>
    
  <th colspan="4">No.of Pravasi accomodated</th>
  <th colspan="6">No. of Interstate passengers accomodated</th>
 
</tr>
<tr class="table table-bordered">
<th colspan="3"></th>
<th colspan="3">No of Inmates Present at CCC</th>
  <th colspan="3">Type of Inmates Released as of today</th>
  <th colspan="2">Ship</th>
  <th colspan="2">Flight</th>
  <th colspan="2">Rail</th>
  <th colspan="2">Road</th>
  <th colspan="2">Ship</th>
  <th colspan="2">No. of Interdistrict passengers (Within kerala)accomodated</th>
  <th colspan="2">No.of primary and secondary contacts of positive case accomodated</th>
  <th colspan="2">Symptomatic</th>
  <th colspan="2">Test Done</th>
  <th colspan="2">Total No of Postive cases</th>
  <th colspan="2">Total Number Of Rooms Available</th>
  <th colspan="2">Total Rooms Occupied</th>
</tr>
<tr>
    
		<th >Date </th> 
        <th>CCC Name</th>
        <th>Place</th>   
        <th>Male </th>
        <th>Female</th>
        <th >Total</th>

        <th>Male </th>
        <th>Female</th>
        <th >Total</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>
        
</tr>

<?php
	foreach($result as $row)
	{   //Creates a loop to loop through results
        ?>
        <tr class="border-bottom">
		
		<td> <?php echo $row['date']; ?>    </td>
		<td><?php echo $row['estname'];?>    </td>
		<td><?php echo $row['city'];?>    </td>	
		<td> <?php echo $row['nM1']; ?>    </td>
		<td><?php echo $row['nF1'];?>    </td>
		<td><?php echo $row['tIn1'];?>    </td>
		<td> <?php echo $row['nM2'];?>    </td>
		<td><?php echo $row['nF2'];?>    </td>
		<td><?php echo $row['tIn2'];?>    </td>
		<td> <?php echo $row['nms'];?>    </td>
		<td><?php echo $row['nfs'];?>    </td>
		<td> <?php echo $row['nmf'];?>    </td>
		<td><?php echo $row['nff'];?>    </td>
		<td><?php echo $row['nmis'];?>    </td>
		<td> <?php echo $row['nfis'];?>    </td>
	    <td><?php echo $row['nrm'];?>    </td>
		<td><?php echo $row['nrf'];?>    </td>
		<td> <?php echo $row['nrlm'];?>    </td>
		<td><?php echo $row['nrlf'];?>    </td>
		<td> <?php echo $row['nim'];?>    </td>
        <td> <?php echo $row['nif'];?>    </td>
        <td> <?php echo $row['npsm'];?>    </td>
        <td> <?php echo $row['npsf'];?>    </td>
        <td> <?php echo $row['symp'];?>    </td>
        <td> <?php echo $row['td'];?>    </td>
        <td> <?php echo $row['nopc'];?>    </td>
        <td> <?php echo $row['trna'];?>    </td>
        <td> <?php echo $row['tno'];?>    </td>
<?php		
	}
?>
</tbody>
</table>
<input type="submit" class="btn btn-primary" id="submitButn" value="Download" onclick="exportTableToExcel('tblData', 'Daily Report')">


        <!--/main col-->
    </div>

</div>
<!--/.container-->
<!--<footer class="container-fluid">
    <p class="text-right small">©2016-2018 Company</p>
</footer>
-->  

  
  <!--scripts loaded here-->
  
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  
  
  
  <!-- <script>
  $(document).ready(function() {
  
$('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
  
$("#divContent").load("generalAlerts.php");

$("#lnkHome").click(function() {
  $("#divContent").load("generalAlerts.php");
});
$("#lnkRegPending").click(function() {
  $("#divContent").load("registrationRequestsPending.php");
});
$("#lnkRegApproved").click(function() {
  $("#divContent").load("registrationRequestsApproved.php");
});
$("#lnkRegRejected").click(function() {
  $("#divContent").load("registrationRequestsRejected.php");
});
$("#lnkGeoAdd").click(function() {
  $("#divContent").load("geoLocationAdd.php");
});
$("#lnkGeoUpdate").click(function() {
  $("#divContent").load("geoLocationUpdate.php");
});
$("#lnkChangePassword").click(function() {
  $("#divContent").load("changePassword.php");
});
$("#hosdat").click(function() {
  $("#divContent").load("hosdat.php");
});
$("#cccregdet").click(function() {
  $("#divContent").load("cccregdetad.php");
});
$("#cccfac").click(function() {
  $("#divContent").load("fac.php");
});
$("#lnkFacInUse").click(function() {
  $("#divContent").load("hospitalFacilityInUse.php");
});


});

  </script> -->
</body>
</html>
