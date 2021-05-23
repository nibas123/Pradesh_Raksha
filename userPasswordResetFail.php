<?php
$hashmsg=$_GET['f'];
$msg=base64_decode($hashmsg);
?>
<html>
<head>
<title>Pradesh Raksha Password Change Failed</title>
</head>
<body>
<div style="width:100%;text-align:center;">
<p style="text-align:center;color:red;font-weight:bold;font-size:24px;font-family:arial">Password Change Failed</p>
<p style="text-align:center;color:red;font-weight:bold;font-size:20px;font-family:arial"><?php echo $msg; ?></p>
<a style="text-align:center;color:blue;font-weight:normal;font-size:16px;font-family:arial" href="userForgetPassword.php">Click to Reset Password</a>
</div>
</body>
</html>