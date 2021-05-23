<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];

include("connection.php");
//retrieve the contents from post
$userValue=$_POST['firNam'];
$numRoom=$_POST['lasNam'];
$nameLoc=$_POST['Age'];
$nameDes=$_POST['Addres'];
$numPh=$_POST['panc'];
$nameLoc1=$_POST['Phone'];
$nameDes1=$_POST['date'];
$numPh1=$_POST['countries'];
$numPh2=$_POST['states'];
$data="Qurantined";
if($numPh2 ==""){
	$location = $numPh1;
}else{
	$location = $numPh2;
}




	$sql_facilityadd="insert into m_pdetails (loginid,fname,lname,age,address,panch,phno,avvldate,location,stat)".
	" values(?,?,?,?,?,?,?,?,?,?)";
	$data=array($loginid,$userValue,$numRoom,$nameLoc,$nameDes,$numPh,$nameLoc1,$nameDes1,$location,$data);
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