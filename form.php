
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Sign Up to Ticket</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
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
                            <h3 class="mb-0">User Information</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="frmRegisterPart1" method="post" action="registerPart2.php">
                                
							<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Select A Valid ID Proof</label>
                                    <div class="col-lg-9">
                                        <select id="cboidproof" class="form-control" size="0">
                                            <option value="Hawaii">Driving License</option>
                                            <option value="Alaska">Aadhar Card</option>
                                            <option value="Pacific Time (US &amp; Canada)">Ration Card</option>
                                            
                                        </select>
										<div class="invalid-feedback">Please select a valid id proof</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter ID Proof Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtidproofnumber" name="idproofnumber" required="">
										<div class="invalid-feedback">Please enter ID Proof number</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter your name as per ID Proof</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtName" name="txtName">
										<div class="invalid-feedback">Please enter your name as per ID Proof</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter your Date of Birth</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtDatepicker" name="txtDatepicker">
										<div class="invalid-feedback">Please enter your Date of Birth</div>
										 <script>
        $('#txtDatepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
	
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Select your District</label>
                                    <div class="col-lg-9">
                                        <select id="cboidproof" class="form-control" size="0">
                                            <option value="Hawaii">Alappuzha</option>
                                            <option value="Alaska">Pathanamthitta</option>
                                            <option value="Pacific Time (US &amp; Canada)">Kollam</option>
											</select>
											<div class="invalid-feedback">Please select your district</div>


                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Select your Police Station</label>
                                    <div class="col-lg-9">
                                        <select id="cboidproof" class="form-control" size="0">
                                            <option value="Hawaii">Cherthala</option>
                                            <option value="Alaska">Poochakkal</option>
                                            <option value="Pacific Time (US &amp; Canada)">Arthunkal</option>
                                        </select>
										<div class="invalid-feedback">Please select your police station</div>
                                    </div>
                                </div>
                               	<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter House Name / Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtHouse" name="txtHouse">
										<div class="invalid-feedback">Please enter your house name / number</div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter Ward No / Street</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtStreet" name="txtStreet">
										<div class="invalid-feedback">Please enter your ward / street</div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter Post Office</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtPostoffice" name="txtPostoffice">
										<div class="invalid-feedback">Please enter your post office</div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Enter Pincode</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtPincode" name="txtPincode">
										<div class="invalid-feedback">Please enter your pincode</div>
                                    </div>
                                </div>
                               							
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Primary Contact Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="txtPhone1" name="txtPhone1">
										<div class="invalid-feedback">Please enter your Primary Contact Number</div>
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
  
  <script>
  // validation example for Signup form
$("#btnSignup").click(function(event) {
    
    var form = $("#frmRegisterPart1");
    
    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    
    // if validation passed form
    // would post to the server here
    
    form.addClass('was-validated');
});
  </script>
  
  	<script>
		var allowsubmit = false;
		$(function(){
			//on keypress 
			$('#txtRPassword').keyup(function(e){
				//get values 
				var pass = $('#txtPassword').val();
				var confpass = $(this).val();
				
				//check the strings
				if(pass == confpass){
					//if both are same remove the error and allow to submit
					$('.error').text('');
					allowsubmit = true;
				}else{
					//if not matching show error and not allow to submit
					$('.error').text('Password not matching');
					allowsubmit = false;
				}
			});
			
			//jquery form submit
			$('#frmRegisterPart1').submit(function(){
			
				var pass = $('#txtPassword').val();
				var confpass = $('#txtRPassword').val();
 
				//just to make sure once again during submit
				//if both are true then only allow submit
				if(pass == confpass){
					allowsubmit = true;
				}
				if(allowsubmit){
					return true;
				}else{
					return false;
				}
			});
		});
	</script>

  
</body></html>
