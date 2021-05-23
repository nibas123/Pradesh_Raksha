<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//retrieve the contents from post
$nobeds=$_POST['numBed'];
$noicubeds=$_POST['numIcubed'];
$novents=$_POST['numVent'];
$noambs=$_POST['numAmb'];
$norooms=$_POST['numRoom'];
$nowards=$_POST['numWard'];
$noppes=$_POST['numPpe'];
$manadequate=$_POST['cboManAdequate'];

$sql_facilityadd="insert into m_hospital (loginid,nobeds,noicubeds,novents,noambs,norooms,nowards,noppes,manadequate,isactive,createdDate)".
" values(?,?,?,?,?,?,?,?,?,'1',now())";
$data=array($loginid,$nobeds,$noicubeds,$novents,$noambs,$norooms,$nowards,$noppes,$manadequate);
$format=array("dddddddds");
$numrows=$db->updateData($sql_facilityadd,$data,$format);
//if update is successfull, redirect to updatesuccesspage
		if($numrows>0){
			//insert an entry into facility_used
			$sql_facilityused="insert into m_hospital_used (loginid,usedbeds,usedicubeds,usedvents,usedambs,usedrooms,usedwards,usedppes,usedmanadequate,isactive,createdDate)".
			" values(?,?,?,?,?,?,?,?,?,'1',now())";
			$data=array($loginid,"0","0","0","0","0","0","0","1");
			$format=array("dddddddds");
			$numrows2=$db->updateData($sql_facilityused,$data,$format);
			if($numrows2>0){
			header("location:hospitalFacilityAddSuccess.php");
			}else{
				$msg="Updation failed due to database error! Partial Update done. Contact Pradesh Raksha Admin";
				$msg=base64_encode($msg);
				header("location:hospitalFacilityAddFail.php?f=".$msg);
			}
		}else if($numrows==0){
			$msg="You didnt change any data for update! Make some changes and update it!";
			$msg=base64_encode($msg);
		header("location:hospitalFacilityAddFail.php?f=".$msg);
		}
		else{
			$msg="Database Error while updating password! Contact Pradesh Raksha Programmer";
			$msg=base64_encode($msg);
		header("location:hospitalFacilityAddFail.php?f=".$msg);
		}

?>