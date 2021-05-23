<?php
session_start();
$loginid=base64_decode($_SESSION['ses_enc_loginid']);
include("connection.php");
//get the password and new password
$newpassword=$_POST['inputPasswordNew'];

		//hash the new password
		$hashnewpass=password_hash($newpassword,PASSWORD_DEFAULT);
		//update the password to database
		$sql_updatepass="update m_login set password=?,modifiedDate=now() where  loginid=? and isactive='1'";
		$data=array($hashnewpass,$loginid);
		$format=array("sd");
		$numrows=$db->updateData($sql_updatepass,$data,$format);
		
		//if update is successfull, redirect to updatesuccesspage
		if($numrows>0){
			unset($_SESSION['ses_enc_loginid']);
			header("location:userPasswordResetSuccess.php");
		}else if($numrows==0){
			unset($_SESSION['ses_enc_loginid']);
			$msg="Password not updated! You may used old password and new password same!";
			$msg=base64_encode($msg);
		header("location:userPasswordResetFail.php?f=".$msg);
		}
		else{
			unset($_SESSION['ses_enc_loginid']);
			$msg="Database Error while updating password! Contact Pradesh Raksha Programmer";
			$msg=base64_encode($msg);
		header("location:userPasswordResetFail.php?f=".$msg);
		}
?>