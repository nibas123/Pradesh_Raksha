<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//retrieve the contents from post
$userValue=$_POST['userValue'];
$numRoom=$_POST['numRoom'];
$nameLoc=$_POST['nameLoc'];
$nameDes=$_POST['nameDes'];
$numPh=$_POST['numPh'];
$nameLoc1=$_POST['nameLoc1'];
$nameDes1=$_POST['nameDes1'];
$numPh1=$_POST['numPh1'];
$userValue2=$_POST['userValue2'];
$userValue3=$_POST['userValue3'];



	$sql_facilityadd="insert into m_covid (loginid,iswork,atbat,lname,ldesg,lphno,gname,gdesg,gphno,fdarg,sani,createdDate,modifiedDate,isactive)".
	" values(?,?,?,?,?,?,?,?,?,?,?,now(),now(),'1')";
	$data=array($loginid,$userValue,$numRoom,$nameLoc,$nameDes,$numPh,$nameLoc1,$nameDes1,$numPh1,$userValue2,$userValue3);
	$format=array();
	$numrows=$db->updateData($sql_facilityadd,$data,$format);
        //if update is successfull, redirect to updatesuccesspage
	
			//insert an entry into facility_used
			//$sql_facilityused="insert into m_hospital_used (loginid,iswork,atbat,lname,ldesg,lphno,gname,gdesg,gphno,fdarg,sani,createdDate,modifiedDate,isactive)".
			//" values(?,?,?,?,?,?,?,?,?,?,?,?,?,'1',now())";
			//$data=array($loginid,"0","0","0","0","0","0","0","1");
			//$format=array("dddddddds");
			//$numrows2=$db->updateData($sql_facilityused,$data,$format);
			if($numrows>0){
			header("location:CovidFacilityAddSuccess.php");
			}
			else{
				$msg="Updation failed due to database error! Partial Update done. Contact Pradesh Raksha Admin";
				$msg=base64_encode($msg);
				header("location:CovidFacilityAddFail.php?f=".$msg);
				}
		
		

?>