<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$pid= base64_decode($_REQUEST['pid']);


$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//check whether facilities already added
//if facilities already added, then show a messages
$sql_facility="select loginid from m_pdetails where loginid=?";
$data=array($loginid);
$format=array("d");
$faclist=$db->selectData($sql_facility,$data,$format);

?>

<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Profile Update</title>

  <script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <link href="css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />
  <style>
    form .error {
  color: #ff0000;
}
  </style>  
	
  </head>

  <body>
  <div class="container py-3">
  <div class="row">
        <div class="col-md-12">
         
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">CCC Passenegr Data Update</h3>
                        </div>
						 
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="frmProfileUpdate" name="frmProfileUpdate" method="post" action="statuschange.php">
							<div class="form-group row">
                                    <label class="col-lg-5 col-form-label form-control-label">Change the Status Of the CCC Passenegr </label>
                                    <div class="col-lg-7">
                                        <select id="userValue2" name="userValue2" class="form-control" size="0">
                                        <option value="">-Select-</option>
                                            <option value="yes">Qurantined</option>
                                            <option value="no">Transfered into another CCC</option>
                                            <option value="no">Transfered to home after Qurantined</option>
                                            <option value="no">Transfered into A hospital</option>
                                            <option value="no">Transfered home before Qurantined</option>
                                        </select>
                                    </div>
                                </div>
                           
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                    <input type="submit" class="btn btn-primary" id="submitButn" value="Save Data">
                                        <input type="reset" class="btn btn-secondary" id="resetButn" value="Reset Data">
                                       
                                    </div>              </div>
                           
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                <!--/col-->
</div>
</div>
</div>
</div>

 
  

  </body>
  </html>