<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];

include("connection.php");
//retrieve the contents from post
$status=$_POST['userValue'];
$pid = $_POST['pid'];


	$sql_facilityadd="update m_pdetails SET stat=? WHERE pid=?";
	$data=array($status,$pid);
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
			header("location:CCCUpdateSuccess.php");
			
			}
			else{
				$msg="Updation failed due to database error! Partial Update done. Contact Pradesh Raksha Admin";
				$msg=base64_encode($msg);
				header("location:CovidFacilityAddFail.php?f=".$msg);

				}
		
		

?>