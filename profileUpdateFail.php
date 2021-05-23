<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$hashmsg=$_GET['f'];
$msg=base64_decode($hashmsg);
?>
<html>
<head>
<title>Pradesh Raksha Profile Update Failed</title>
</head>
<body>
<div style="width:100%;text-align:center;">
<p style="text-align:center;color:red;font-weight:bold;font-size:24px;font-family:arial">Pradesh Raksha Profile Update Failed</p>
<p style="text-align:center;color:red;font-weight:bold;font-size:20px;font-family:arial"><?php echo $msg; ?></p>
<a style="text-align:center;color:blue;font-weight:normal;font-size:16px;font-family:arial" href="home.php">Click to View Home</a>
</div>
</body>
</html>