<?php
include("connection.php");
?>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Pradsh Raksha Forget Password</title>
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
                            <h3 class="mb-0">Forget Password - Pradesh Raksha</h3>
                        </div>
						 
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="frmForgetPassword" name="frmForgetPassword" method="post" action="serviceUserForgetPassword.php">
							<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter Your Pradesh Raksha Username</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtUsername" name="txtUsername">
                                    </div>
                                </div>
							<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Select Your Pradesh Raksha Registerd ID Proof</label>
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
                                    <label class="col-lg-3 col-form-label form-control-label">Enter Your ID Proof Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtIdproofnumber" name="txtIdproofnumber">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter Your Date of Birth</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtDatepicker" name="txtDatepicker" readonly>
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="submit" class="btn btn-primary" value="Submit" id="btnSubmit" name="btnSubmit">
                                    </div>
                                </div>
								<span id="alert" style="color:#ff0000;font-size:1em;font-family:arial;"><?php if(isset($_GET['f'])) echo base64_decode($_GET['f']); ?></span>
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

 
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script>
              $(document).ready(function () {
                //use to show the date calander
                $('#txtDatepicker').datepicker({
					autoclose: true, 
                    format: "yyyy-mm-dd"
                });  
					
});
  </script>
  <script>
  $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='frmForgetPassword']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
	  txtUsername: {required:true, email:true},
	  txtIdproofnumber:"required",
	  txtDatepicker:"required",
      cboIdproof:"required"
	  
    },
    // Specify validation error messages
    messages: {
		txtIdproofnumber: "Please enter your ID Proof number",
		txtDatepicker: "Please enter your date of birth",
		txtUsername: {required :"Please enter your username", email: "Enter a valid email id" },
		cboIdproof:"Please select an ID proof"
      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
  
 </script> 
  
  </script>
  </body>
  </html>