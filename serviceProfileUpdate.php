<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//retrieve the contents from post
$proofid=$_POST['cboIdproof'];
$proofnumber=$_POST['txtIdproofnumber'];
$nameofuser=$_POST['txtName'];
$dob=$_POST['txtDatepicker'];
$catid=$_POST['cboCategory'];
$districtid=$_POST['cboDistrict'];
$estname=$_POST['txtEstName'];
$street=$_POST['txtStreet'];
$city=$_POST['txtCity'];
$primarycontact=$_POST['txtPhone1'];
$secondarycontact=$_POST['txtPhone2'];

$sql_profileupdate="update m_address set proofid=?,proofnumber=?,nameofuser=?,dob=?,catid=?,districtid=?,estname=?,street=?,city=?,primarycontact=?,secondarycontact=?,modifiedDate=now()".
" where loginid=? and isactive='1'";
$data=array($proofid,$proofnumber,$nameofuser,$dob,$catid,$districtid,$estname,$street,$city,$primarycontact,$secondarycontact,$loginid);
//$format=array("d","s","s","s","d","d","s","s","s","s","s");
$format=array("dsssddsssssd");
$numrows=$db->updateData($sql_profileupdate,$data,$format);
//if update is successfull, redirect to updatesuccesspage
		if($numrows>0){
			header("location:profileUpdateSuccess.php");
		}else if($numrows==0){
			$msg="You didnt change any data for update! Make some changes and update it!";
			$msg=base64_encode($msg);
		header("location:profileUpdateFail.php?f=".$msg);
		}
		else{
			$msg="Database Error while updating password! Contact Pradesh Raksha Programmer";
			$msg=base64_encode($msg);
		header("location:profileUpdateFail.php?f=".$msg);
		}


?>