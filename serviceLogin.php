<?php
//get the username 
session_start();
$uname=$_POST['txtUsername'];
$upass=$_POST['txtPassword'];
//$uname="speedtracker@gmail.com";
//$upass="Creagta!2";
include("connection.php");
$sql_password="select loginid,password from m_login where username=? and isactive='1'";
$data=array($uname);
$format=array("s");
$logininfo=$db->selectData($sql_password,$data,$format);
//if a valid row returned against the username then validate the password against the password stored in database
//if no row returned, then redirect to login page
if(!$logininfo){
	//on failed validation
	$msg=base64_encode("User account not existing! Contact Pradesh Raksha Administrator");
	header("location:index.php?f=".$msg);
	exit;
}
//if data exists
foreach($logininfo as $loginitem){
$hashpass=$loginitem['password'];
$loginid=$loginitem['loginid'];
}
//validation begins
if(password_verify($upass,$hashpass)){
	//on successful validation
	//get loginid from database
	$_SESSION['ses_loginid']=$loginid;
	header("location:home.php");
}else{
	//on failed validation
	$msg=base64_encode("Wrong password. Try again or click Forgot password to reset it");
	header("location:index.php?f=".$msg);
}





?>