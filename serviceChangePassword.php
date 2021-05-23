<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//get the current password and new password
$curpassword=$_POST['inputPasswordOld'];
$newpassword=$_POST['inputPasswordNew'];
//get current password from database
$sql_curpassword="select username,password from m_login where loginid=? and isactive='1'";
$data=array($loginid);
$format=array("d");
$list=$db->selectData($sql_curpassword,$data,$format);
$hashpass="";
$username="";
if(!$list){ $msg="No password existing for this account. Contact Website admin";
	$msg=base64_encode($msg);
	header("location:changePasswordFail.php?f=".$msg);
}else{
		foreach($list as $listitem){
		$hashpass=$listitem['password'];
		$username=$listitem['username'];
		}
	}

	//compare the dbpassword with current password
	if(password_verify($curpassword,$hashpass)){
		//if both are matching, update the password
		//hash the new password
		$hashnewpass=password_hash($newpassword,PASSWORD_DEFAULT);
		//update the password to database
		$sql_updatepass="update m_login set password=?,modifiedDate=now() where  loginid=? and isactive='1'";
		$data=array($hashnewpass,$loginid);
		$format=array("sd");
		$numrows=$db->updateData($sql_updatepass,$data,$format);
		
		//if update is successfull, redirect to updatesuccesspage
		if($numrows>0){
			header("location:changePasswordSuccess.php");
		}else if($numrows==0){
			$msg="Password not updated! You may used old password and new password same!";
			$msg=base64_encode($msg);
		header("location:changePasswordFail.php?f=".$msg);
		}
		else{
			$msg="Database Error while updating password! Contact Pradesh Raksha Programmer";
			$msg=base64_encode($msg);
		header("location:changePasswordFail.php?f=".$msg);
		}
	}else{
		$msg="Current password you entered not matched with your password";
		$msg=base64_encode($msg);	
		header("location:changePasswordFail.php?f=".$msg);
	}
?>