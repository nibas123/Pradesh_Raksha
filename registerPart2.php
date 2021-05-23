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
else { 
    //start the next parts
	//fetch the username, password 
	$username=$_POST['txtUsername'];
	$password=$_POST['txtPassword'];
	//check whether the username already exists or not
include("connection.php");
$sql="select username from m_login,place where username=?";
$data=array($username);
$format=array("s");
$res=$db->selectData($sql,$data,$format);


//if username exists
if($res){
	$msg=base64_encode("Username already exists");
	header("location:registerPart1.php?f=".$msg);
	exit;
}
//if no data received for username
if(!isset($username)){
	$msg= base64_encode("Someone trying to breach security!");
	header("location:registerPart1.php?f=".$msg);
	exit;
}
//if no data received for password
if(!isset($password)){
	$msg= base64_encode("Someone trying to breach security!");
	header("location:registerPart1.php?f=".$msg);
	exit;
}

//if all testing conditions satisfied, perform normal operation
//show the page
//store the username and password to session
$_SESSION['ses_username']=$username;
$_SESSION['ses_password']=$password;
?>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Sign Up to Pradesh Raksha</title>
<script src="js/jquery-3.2.1.min.js"></script>   
  <script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />
  <style>
    form .error {
  color: #ff0000;
}
  </style>  
	
  </head>

  <body>
  <div class="container py-5">
  <div class="row">
        <div class="col-md-12">
         
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Sign Up - Pradesh Raksha</h3>
                        </div>
						 
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="frmRegisterPart2" name="frmRegisterPart2" method="post" action="serviceRegister.php">
							<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Select A Valid ID Proof of User</label>
                                    <div class="col-lg-9">
                                        <select id="cboIdproof" name="cboIdproof" class="form-control" size="0">
										<option value="">--Select--</option>
                                        <?php 
											//get the id proof list from database table
											 $list = $db->select("select proofid,proofname from m_idproof where isActive='1' order by proofname");
											  foreach($list as $listitem){
														echo "<option value='".$listitem['proofid']."'>".$listitem['proofname']."</option>";
														}     
											?>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter ID Proof Number of user</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtIdproofnumber" name="txtIdproofnumber">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter user's name as per ID Proof</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtName" name="txtName">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter user's Date of Birth</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="date" value="" id="txtDatepicker" name="txtDatepicker" >
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Select Establishment Category</label>
                                    <div class="col-lg-9">
                                        <select id="cboCategory" name="cboCategory" class="form-control" size="0">
										<option value="">--Select--</option>
                                        <?php 
											//get the category list from database table
											 $list = $db->select("select catid,category from m_category where isactive='1' order by category");
											  foreach($list as $listitem){
														echo "<option value='".$listitem['catid']."'>".$listitem['category']."</option>";
														}     
											?>   
                                        </select>
                                    </div>
                                </div>
							
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Select Establishment District</label>
                                    <div class="col-lg-9">
                                        <select id="cboDistrict" name="cboDistrict" class="form-control" size="0">
										    <option value="">--Select--</option>
                                           <?php 
											//get the district list from database table
											 $list = $db->select("select districtid,districtname from m_district where isActive='1' order by districtname");
											  foreach($list as $listitem){
														echo "<option value='".$listitem['districtid']."'>".$listitem['districtname']."</option>";
														}     
											?>  
											</select>
									</div>
                                </div>
								
								
                               	<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter Establishment Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtEstName" name="txtEstName">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter Ward No / Street</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtStreet" name="txtStreet">
                                    </div>
                                </div>
								<div class="form-group row">

<label class="col-lg-5 col-form-label form-control-label" for="numRoom">Which LSG</label>
<div class="col-sm-2 col-md-3 text-center">
  <input type="radio" value="oindia" class="" id="outside" name="outside"><label for="numRoom">Panchayat</label>
</div>
<div class="col-sm-2 col-md-4 text-center">
  <input type="radio" value="instate" class="" id="instate" name="outside"><label class="" for="numRoom">Muncipality</label>
</div>
</div>

<div class="form-group row" id="country">
<label class="col-lg-5 col-form-label form-control-label">Panchayat</label>
<div class="col-lg-7">
  <select id="countries" name="countries" class="form-control" size="0">
  <option value="">--Select--</option>
  <?php

        

        $result = $db->select("select name from place");
        foreach($result as $row){
                  echo "<option value='".$row['name']."'>".$row['name']."</option>";
                  }    

 ?>

  </select>
</div>
</div>
<div class="form-group row" id="state">
<label class="col-lg-5 col-form-label form-control-label">Muncipality</label>
<div class="col-lg-7">
  <select id="states" name="states" class="form-control" size="0">
  <option value="">--Select--</option>
  <option value="Alappuzha">Alappuzha</option>
  <option value="Chengannur">Chengannur</option>
  <option value="Cherthala">Cherthala</option>
  <option value="Haripad">Haripad</option>
  <option value="Kayamkulam">Kayamkulam</option>
  <option value="Kayamkulam">Mavelikara</option>
  </select>
</div>

  </select>
</div>
 						
					
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter Primary Contact Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtPhone1" name="txtPhone1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Secondary Contact Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtPhone2" name="txtPhone2">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel" id="btnCancel" name="btnCancel">
                                        <input type="submit" class="btn btn-primary" value="Register" id="btnSignup" name="btnSignup">
                                    </div>
                                </div>
								<input type="hidden" id=txtNonce" name="txtNonce" value="<?php echo $_SESSION['ses_secret']; ?>" />
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                <!--/col-->
</div>
</div>
</div>
</div>

 
<script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.js"></script>
  <script>
              $(document).ready(function () {
                //use to show the date calander
                // $('#txtDatepicker').datepicker({
				// 	autoclose: true, 
                //     format: "yyyy-mm-dd"
                // });  



                $(document).ready(function() {
                    $("#country").hide();
                    $("#state").hide();
                    console.log("fgvvgcfxcd")
                });
                $("input[name='outside']").click(function(e) {
                    console.log("ee",e.target.value)
                    if (e.target.value == "oindia") {
                    $("#country").show();
                    $("#state").hide();
                    }
                    if (e.target.value == "instate") {
                    $("#country").hide();
                    $("#state").show();
                    }
        console.log('e', e.target.value, $(this).val())
        // Do something interesting here
      });
					
});
  </script>
  <!-- <script>
  $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='frmRegisterPart2']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
	//   txtIdproofnumber:"required",
	//   txtDatepicker:"required",
    //   txtEstName: "required",
    //   txtName: "required",
	//   cboIdproof:"required",
	//   cboDistrict:"required",
	//   cboCategory:"required",
	//   txtStreet:"required",
	//   txtCity:"required",
	  txtPhone1: {
		  required: true,
		  number: true,
		  minlength:10,
		  maxlength:12
	  },
    },
    // Specify validation error messages
    // messages: {
	// 	txtIdproofnumber: "Please enter your ID Proof number",
	// 	txtDatepicker: "Please enter your date of birth",
    //   txtEstName: "Please enter your establishment name",
    //   txtName: "Please enter your name as per ID Proof",
	//   cboIdproof:"Please select an ID proof",
	//   cboDistrict:"Please select a your district",
	//   cboCategory:"Please select a Category",
	//   txtStreet:"Please enter your ward / street",
	//   txtCity:"Please enter your city / taluk",
	  
	  txtPhone1: {
		  required: "Please enter your mobile number",
		  number: "Only numbers allowed",
		  minlength:"Minimum of 10 digits required",
		  maxlength:"Maximum of 12 digits only allowed"
	  },  
      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
  
 </script>  -->
  
  </script>
  </body>
  </html>
<?php
}
?>