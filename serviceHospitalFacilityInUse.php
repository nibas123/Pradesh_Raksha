<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];

include("connection.php");
//get the existing details of hospital facilities
$sql_facilities="select * from m_hospital where loginid=? and isactive='1'";
$data=array($loginid);
$format=array("d");
$facility=$db->selectData($sql_facilities,$data,$format);

foreach($facility as $facilityitem){
$nobeds=$facilityitem['nobeds'];
$noicubeds=$facilityitem['noicubeds'];
$novents=$facilityitem['novents'];
$noambs=$facilityitem['noambs'];
$norooms=$facilityitem['norooms'];
$nowards=$facilityitem['nowards'];
$noppes=$facilityitem['noppes'];
$manadequate=$facilityitem['manadequate'];
}

//retrieve the contents of used facilities
$usedbeds=$_POST['numBed'];
$usedicubeds=$_POST['numIcubed'];
$usedvents=$_POST['numVent'];
$usedambs=$_POST['numAmb'];
$usedrooms=$_POST['numRoom'];
$usedwards=$_POST['numWard'];
$usedppes=$_POST['numPpe'];
$manadequate=$_POST['cboManAdequate'];

//check each and every element against the hospital infrastructure
$msgs=array();
if($usedbeds>$nobeds){
array_push($msgs,"Number of Beds used cannot be more than total number of Beds available!"); 	
}
if($usedicubeds>$noicubeds){
	array_push($msgs,"Number of ICU Beds used cannot be more than total number of ICU Beds available!"); 	
}
if($usedvents>$novents){
	array_push($msgs,"Number of Ventilators used cannot be more than total number of Ventilators available!"); 	
}
if($usedambs>$noambs){
	array_push($msgs,"Number of Ambulance used cannot be more than total number of Ambulance available!"); 	
}
if($usedrooms>$norooms){
	array_push($msgs,"Number of Rooms used cannot be more than total number of Rooms available!"); 	
}
if($usedwards>$nowards){
	array_push($msgs,"Number of Wards used cannot be more than total number of Wards available!"); 	
}
if($usedppes>$noppes){
	array_push($msgs,"Number of PPEs used cannot be more than total number of PPEs available!"); 	
}
//if there is atleast one message available, then redirect the page to hospitalfacilityinuse error page
if($msgs){
	$_SESSION['ses_errors']=$msgs;
	header("location:hospitalFacilityInUseAlert.php");
	exit;
}
else{
//update the facilities in use
	$sql_facilityusedupdate="update m_hospital_used set usedbeds=?,usedicubeds=?,usedvents=?,usedambs=?,usedrooms=?,usedwards=?,usedppes=?,usedmanadequate=?,modifiedDate=now()".
" where loginid=? and isactive='1'";
$data=array($usedbeds,$usedicubeds,$usedvents,$usedambs,$usedrooms,$usedwards,$usedppes,$usedmanadequate,$loginid);
$format=array("dddddddds");
$numrows=$db->updateData($sql_facilityusedupdate,$data,$format);
//if update is successfull, redirect to updatesuccesspage
		if($numrows>0){
			header("location:hospitalFacilityInUseSuccess.php");
			exit;
		}else if($numrows==0){
			$msg="You didnt change any data for update! Make some changes and update it!";
			$msg=base64_encode($msg);
			header("location:hospitalFacilityInUseFail.php?f=".$msg);
			exit;
		}
		else{
			$msg="Database Error while updating password! Contact Pradesh Raksha Programmer";
			$msg=base64_encode($msg);
			header("location:hospitalFacilityInUseFail.php?f=".$msg);
			exit;
		}
}

?>

