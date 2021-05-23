<?php
session_start();
include("connection.php");
$username=$_POST['txtUsername'];
$proofid=$_POST['cboIdproof'];
$proofnumber=$_POST['txtIdproofnumber'];
$dob=$_POST['txtDatepicker'];
$submit=$_POST['btnSubmit'];
//script execute only when submit clicked

if($submit){
 //check the script against the data in database
 //get the details from database w.r.t username
$sql_loginid="select loginid from m_login where username=? and isactive='1'";
$data=array($username);
$format=array("s");
$list=$db->selectData($sql_loginid,$data,$format);
if(!$list){
	$msg="Username doesnot exits, please try a valid username!";
	$msg=base64_encode($msg);
	header("location:userForgetPassword.php?f=".$msg);
	exit;
}else{
	//fetch the login id of the username
	foreach($list as $listitem){
		$loginid=$listitem['loginid'];
	}
	//fetch the information stored based on the loginid
	$sql_info="select proofid,proofnumber,dob from m_address where loginid=? and isactive='1'";
	$data=array($loginid);
	$format=array("d");
	$info=$db->selectData($sql_info,$data,$format);
	foreach($info as $infoitem){
		$db_proofid=$infoitem['proofid'];
		$db_proofumber=$infoitem['proofnumber'];
		$db_dob=$infoitem['dob'];
	}
$match=true;	
if($db_proofid!=$proofid){
	$match=false;
}
if($db_proofumber!=$proofnumber){
	$match=false;
}
if($db_dob!=$dob){
	$match=false;
}

//if there is atleast one mismatch in the data with original, then redirect 
if(!$match){
	$msg="There is a mismatch in data you provided, kindly verify the data for password reset!";
	$msg=base64_encode($msg);
	header("location:userForgetPassword.php?f=".$msg);
	exit;
}else{
	$enc_loginid=base64_encode($loginid);
	$_SESSION['ses_enc_loginid']=$enc_loginid;
	header("location:userResetPassword.php");
}
}
}
?>