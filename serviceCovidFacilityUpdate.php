<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//get the used contents from hospital facility in used
//get the existing details of hospital facilities
$sql_facilitiesinuse="select * from m_covid where loginid=? and isactive='1'";
$data=array($loginid);
$format=array("d");
$facility=$db->selectData($sql_facilitiesinuse,$data,$format);

foreach($facility as $facilityitem){
$usedbeds=$facilityitem['usedbeds'];
$usedicubeds=$facilityitem['usedicubeds'];
$usedvents=$facilityitem['usedvents'];
$usedambs=$facilityitem['usedambs'];
$usedrooms=$facilityitem['usedrooms'];
$usedwards=$facilityitem['usedwards'];
$usedppes=$facilityitem['usedppes'];
$usedmanadequate=$facilityitem['usedmanadequate'];
}

//retrieve the contents from post, facilities to be updated
$nobeds=$_POST['numBed'];
$noicubeds=$_POST['numIcubed'];
$novents=$_POST['numVent'];
$noambs=$_POST['numAmb'];
$norooms=$_POST['numRoom'];
$nowards=$_POST['numWard'];
$noppes=$_POST['numPpe'];
$manadequate=$_POST['cboManAdequate'];

//check each and every element against the hospital facility in use
$msgs=array();
if($nobeds<$usedbeds){
array_push($msgs,"Total Number of Beds cannot be less than Number of Beds in use!"); 	
}
if($noicubeds<$usedicubeds){
	array_push($msgs,"Total Number of ICU Beds cannot be less than Number of ICU Beds in use!"); 	
}
if($novents<$usedvents){
	array_push($msgs,"Total Number of Ventilators cannot be less than Number of Ventilators in use!"); 	
}
if($noambs<$usedambs){
	array_push($msgs,"Total Number of Ambulance cannot be less than Number of Ambulance in use!"); 	
}
if($norooms<$usedrooms){
	array_push($msgs,"Total Number of Rooms cannot be less than Number of Rooms in use!"); 	
}
if($nowards<$usedwards){
	array_push($msgs,"Total Number of Wards cannot be less than Number of Wards in use!"); 	
}
if($noppes<$usedppes){
	array_push($msgs,"Total Number of PPEs cannot be less than Number of PPEs in use!"); 	
}
//if there is atleast one message available, then redirect the page to hospitalfacilityinuse error page
if($msgs){
	$_SESSION['ses_errors']=$msgs;
	header("location:hospitalFacilityUpdateAlert.php");
	exit;
}
else{


$sql_facilityupdate="update m_hospital set loginid=?,iswork=?,atbat=?,lname=?,ldesg=?,lphno=?,gname=?,gdesg=?,gphno=?,fdarg=?,sani=?,createdDate=?,modifiedDate=?,isactive=?";
$data=array($loginid,$iswork,$atbat,$lname,$ldesg,$lphno,$gname,$gdesg,$gphno,$fdarg,$sani,$createdDate,$modifiedDate,$isactive);
$format=array();
$numrows=$db->updateData($sql_facilityupdate,$data,$format);
//if update is successfull, redirect to updatesuccesspage
		if($numrows>0){
			header("location:hospitalFacilityUpdateSuccess.php");
			exit;
		}else if($numrows==0){
			$msg="You didnt change any data for update! Make some changes and update it!";
			$msg=base64_encode($msg);
			header("location:hospitalFacilityUpdateFail.php?f=".$msg);
			exit;
		}
		else{
			$msg="Database Error while updating password! Contact Pradesh Raksha Programmer";
			$msg=base64_encode($msg);
			header("location:hospitalFacilityUpdateFail.php?f=".$msg);
			exit;
		}
}
?>