<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
//read user login id
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
$sql_profile="select * from m_address where isactive='1' and loginid=?";
$data=array($loginid);
$format=array("d");
$profilelist=$db->selectData($sql_profile,$data,$format);

foreach($profilelist as $profileitem){
$g_proofid=$profileitem['proofid'];
$g_catid=$profileitem['catid'];
$g_distid=$profileitem['districtid'];
$g_proofnum=$profileitem['proofnumber'];
$g_nameofuser=$profileitem['nameofuser'];
$g_dob=$profileitem['dob'];
$g_estname=$profileitem['estname'];
$g_street=$profileitem['street'];
$g_city=$profileitem['city'];
$g_primary=$profileitem['primarycontact'];
$g_secondary=$profileitem['secondarycontact'];
}
?>

<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Profile Update</title>

  <script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <link href="css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />
  <style>
    form .error {
  color: #ff0000;
}
  </style>  
	
  </head>

  <body>
  <div class="container py-3">
  <div class="row">
        <div class="col-md-12">
         
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Profile Update</h3>
                        </div>
						 
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="frmProfileUpdate" name="frmProfileUpdate" method="post" action="serviceProfileUpdate.php">
							<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Valid ID Proof of User</label>
                                    <div class="col-lg-9">
                                        <select id="cboIdproof" name="cboIdproof" class="form-control" size="0">
										<option value="">--Select--</option>
                                     <?php 
											//get the id proof list from database table
											 $prooflist=$db->selectData("select proofid,proofname from m_idproof where isactive='1' order by proofname",null,null);
											 
											  foreach($prooflist as $listitem){
												       if($g_proofid==$listitem['proofid']){
														   echo "<option value='".$listitem['proofid']."' selected>".$listitem['proofname']."</option>";
													   }else{
														echo "<option value='".$listitem['proofid']."'>".$listitem['proofname']."</option>";
													   }
														}     
											?>   
   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">ID Proof Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $g_proofnum; ?>" id="txtIdproofnumber" name="txtIdproofnumber">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">User's name as per ID Proof</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $g_nameofuser; ?>" id="txtName" name="txtName">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Date of Birth</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $g_dob; ?>" id="txtDatepicker" name="txtDatepicker" readonly>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Establishment Category</label>
                                    <div class="col-lg-9">
                                        <select id="cboCategory" name="cboCategory" class="form-control" size="0">
										<option value="">--Select--</option>
										<?php 
											//get the category list from database table
											 $catlist=$db->selectData("select catid,category from m_category where isactive='1' order by category",null,null);
											  foreach($catlist as $listitem){
												        if($g_catid==$listitem['catid']){
															echo "<option value='".$listitem['catid']."' selected>".$listitem['category']."</option>";
														}else{
														echo "<option value='".$listitem['catid']."'>".$listitem['category']."</option>";
														}
														
														}     
											?>   
                                        
                                        </select>
                                    </div>
                                </div>
							
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Establishment District</label>
                                    <div class="col-lg-9">
                                        <select id="cboDistrict" name="cboDistrict" class="form-control" size="0">
										    <option value="">--Select--</option>
                                         <?php 
											//get the district list from database table
											  $list = $db->selectData("select districtid,districtname from m_district where isActive='1' order by districtname",null,null);
											  foreach($list as $listitem){
												  if($g_distid==$listitem['districtid']){
													  echo "<option value='".$listitem['districtid']."' selected>".$listitem['districtname']."</option>";
												  }else{
														echo "<option value='".$listitem['districtid']."'>".$listitem['districtname']."</option>";
												  }
														}     
											?>    
											</select>
									</div>
                                </div>
								
								
                               	<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Establishment Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $g_estname; ?>" id="txtEstName" name="txtEstName">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Ward No / Street</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $g_street; ?>" id="txtStreet" name="txtStreet">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">City / Taluk</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $g_city; ?>" id="txtCity" name="txtCity">
                                    </div>
                                </div>
								
					
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Primary Contact Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $g_primary; ?>" id="txtPhone1" name="txtPhone1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Secondary Contact Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $g_secondary; ?>" id="txtPhone2" name="txtPhone2">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="submit" class="btn btn-primary" value="Update" id="btnUpdate" name="btnSignup">
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
  $("form[name='frmProfileUpdate']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
	  txtIdproofnumber:"required",
	  txtDatepicker:"required",
      txtEstName: "required",
      txtName: "required",
	  cboIdproof:"required",
	  cboDistrict:"required",
	  cboCategory:"required",
	  txtStreet:"required",
	  txtCity:"required",
	  txtPhone1: {
		  required: true,
		  number: true,
		  minlength:10,
		  maxlength:12
	  },
    },
    // Specify validation error messages
    messages: {
		txtIdproofnumber: "Please enter your ID Proof number",
		txtDatepicker: "Please enter your date of birth",
      txtEstName: "Please enter your establishment name",
      txtName: "Please enter your name as per ID Proof",
	  cboIdproof:"Please select an ID proof",
	  cboCategory: "Please select a category",
	  cboDistrict:"Please select a your district",
	  txtStreet:"Please enter your ward / street",
	  txtCity:"Please enter your city / taluk",
	  
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
  
 </script> 
  
  </script>
  </body>
  </html>