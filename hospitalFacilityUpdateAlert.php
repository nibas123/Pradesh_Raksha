<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$msgs=$_SESSION['ses_errors'];
?>
<html>
<head>
<title>Pradesh Raksha Hospital Facility Update Errors</title>
</head>
<body>
<div style="width:100%;text-align:center;">
<p style="text-align:center;color:red;font-weight:bold;font-size:24px;font-family:arial">Hospital Facility Update Failed with Following Errors</p>
<div style="text-align:center;color:navy;font-weight:normal;font-size:20px;font-family:arial;text-transform:lowercase"><ol>
<?php 
foreach($msgs as $msgsitem){
	echo "<li>".$msgsitem."</li>";
}
?>
</ol>
</div>
<a style="text-align:center;color:blue;font-weight:normal;font-size:16px;font-family:arial" href="home.php">Click to View Home Page</a>
</div>
</body>
</html>