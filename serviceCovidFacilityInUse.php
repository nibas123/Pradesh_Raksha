<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//retrieve the contents from post
$userValue=$_POST['nM1'];
$numRoom=$_POST['nF1'];
$nameLoc=$_POST['tIn1'];
$nameDes=$_POST['nM2'];
$numPh=$_POST['nF2'];
$nameLoc1=$_POST['tIn2'];
$nameDes1=$_POST['nP'];
$numPh1=$_POST['nIs'];
$userValue2=$_POST['nM3'];
$userValue3=$_POST['nF3'];
$tIn3=$_POST['tIn3'];
$nM4=$_POST['nM4'];
$nF4=$_POST['nF4'];
$tIn4=$_POST['tIn4'];
$nTr3=$_POST['nTr3'];
$nRo3=$_POST['nRo3'];



	$sql_facilityadd="insert into m_ccused (loginid,date,ipmale,ipfemale,iptot,rmale,rfemale,rtot,pvasi,istate,smale,sfemale,stot,tmale,tfemale,ttot,totrooms,romocc)".
	" values(?,CURDATE(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$data=array($loginid,$userValue,$numRoom,$nameLoc,$nameDes,$numPh,$nameLoc1,$nameDes1,$numPh1,$userValue2,$userValue3,$tIn3,$nM4,$nF4,$tIn4,$nTr3,$nRo3);
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