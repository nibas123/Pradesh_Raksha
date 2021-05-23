<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//retrieve the contents from post
$nM1=$_POST['nM1'];
$nF1=$_POST['nF1'];
$tIn1=$_POST['tIn1'];
$nM2=$_POST['nM2'];
$nF2=$_POST['nF2'];
$tIn2=$_POST['tIn2'];
$nms=$_POST['nms'];
$nfs=$_POST['nfs'];
$nmf=$_POST['nmf'];
$nff=$_POST['nff'];
$nmis=$_POST['nmis'];
$nfis=$_POST['nfis'];
$nrm=$_POST['nrm'];
$nrf=$_POST['nrf'];
$nrlm=$_POST['nrlm'];
$nrlf=$_POST['nrlf'];
$nim=$_POST['nim'];
$nif=$_POST['nif'];
$npsm=$_POST['npsm'];
$npsf=$_POST['npsf'];
$symp=$_POST['symp'];
$td=$_POST['td'];
$nopc=$_POST['nopc'];
$trna=$_POST['tnra'];
$tno=$_POST['tno'];


	$sql_facilityadd="insert INTO m_ciused(loginid, date, nM1, nF1, tIn1, nM2, nF2, tIn2, nms, nfs, nmf, nff, nmis, nfis, nrm, nrf, nrlm, nrlf, nim, nif, npsm, npsf, symp, td, nopc, trna, tno)".
" values(?,CURDATE(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$data=array($loginid,$nM1,$nF1,$tIn1,$nM2,$nF2,$tIn2,$nms,$nfs,$nmf,$nff,$nmis,$nfis,$nrm,$nrf,$nrlm,$nrlf,$nim,$nif,$npsm,$npsf,$symp,$td,$nopc,$trna,$tno);
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