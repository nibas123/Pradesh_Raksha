<?php
session_start();
//get the nonce from url referrer
$secret=$_POST['txtNonce'];
//validate the nonce value with current session value of nonce
//if both are not same then exit
//otherwise resume with normal operation
if (strcmp($secret, $_SESSION['ses_secret']) !== 0) { 
    header("location:registerPart1.php");
    exit;	
} 

//include the transaction library
include("transaction.php");
//retrieve the contents from post
$username=$_SESSION['ses_username'];
$password=$_SESSION['ses_password'];
$proofid=$_POST['cboIdproof'];
$proofnumber=$_POST['txtIdproofnumber'];
$nameofuser=$_POST['txtName'];
$dob=$_POST['txtDatepicker'];
$catid=$_POST['cboCategory'];
$districtid=$_POST['cboDistrict'];
$estname=$_POST['txtEstName'];
$street=$_POST['txtStreet'];
$numPh1=$_POST['countries'];
$numPh2=$_POST['states'];
$data="Qurantined";
if($numPh2 ==""){
	$city= $numPh1;
}else{
	$city= $numPh2;
}


$primarycontact=$_POST['txtPhone1'];
$secondarycontact=$_POST['txtPhone2'];


//hash the password
$hashpassword=password_hash($password,PASSWORD_DEFAULT);
$param1=array(":username" => $username, ":password" => $hashpassword);
$param2=array(":proofid" => $proofid,":proofnumber" => $proofnumber,":nameofuser" => $nameofuser,":dob" => $dob,":catid" => $catid,":districtid" => $districtid,":estname" => $estname,":street" => $street,":city" => $city,":primarycontact" => $primarycontact,":secondarycontact" => $secondarycontact);
$obj = new Transaction();
$loginid=$obj->setLoginAccount($param1,$param2);
if($loginid>0){
	header("location:registrationSuccess.html");
	}
else{
	header("location:registrationFail.html");
}

?>