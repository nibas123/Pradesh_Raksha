<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//get the existing details of facilities
$sql_facilities="select * from m_hospital_used where loginid=? and isactive='1'";
$data=array($loginid);
$format=array("d");
$facility=$db->selectData($sql_facilities,$data,$format);

//if facilities in hospital not existing , then show messages
if(!$facility){
	echo "<div style='padding-top:50px;text-align:center;width:100%;color:green;font-weight:bold; font-size:16px;font-family:arial'> Facilities not yet added! <br/> Kindly Click on Facility -> Add to add existing facility for use the resources!</div>";
	exit;
}
foreach($facility as $facilityitem){
$usedbeds=$facilityitem['usedbeds'];
$usedicubeds=$facilityitem['usedicubeds'];
$usedvents=$facilityitem['usedvents'];
$usedambs=$facilityitem['usedambs'];
$usedrooms=$facilityitem['usedrooms'];
$usedwards=$facilityitem['usedwards'];
$usedppes=$facilityitem['usedppes'];
$usedmanadequate=$facilityitem['usedmanadequate'];
}

?>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Login to Pradesh Raksha</title>
	<style>
	 form .error{color:#ff0000;}
	</style>
  </head>

  <body>
  <div class="container py-3">
  <div class="row">
        <div class="col-md-12">
         
            <div class="row">
               <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formAdd"></span>
                    <!-- <hr class="mb-5"> -->

                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0"> FACILITY IN USE</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" action="serviceHospitalFacilityInUse.php" autocomplete="off" id="frmAdd" name="frmAdd" novalidate="" method="POST">
                                <div class="form-group row">

                                    <label class="col-lg-5 col-form-label form-control-label" for="numBed">Number of Bed in Use</label>
                                    <div class="col-lg-7">
                                    <input type="text"  maxlength="3" class="form-control" id="numBed" name="numBed" value="<?php echo $usedbeds; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label  class="col-lg-5 col-form-label form-control-label" for="numIcubed">Number of ICU Bed in Use</label>
                                    <div class="col-lg-7">
                                    <input type="text"  maxlength="2"class="form-control" id="numIcubed" name="numIcubed" value="<?php echo $usedicubeds; ?>">
                                    
                                        </div>
                                </div>
                                <div class="form-group row">

                                     <label class="col-lg-5 col-form-label form-control-label" for="numVent">Number of Ventilator in Use</label>
                                     <div class="col-lg-7">
                                     <input type="text" maxlength="2"class="form-control" id="numVent" name="numVent" value="<?php echo $usedvents; ?>">
                                     </div>
                                </div>

                                <div class="form-group row">

                                  <label  class="col-lg-5 col-form-label form-control-label" for="numAmb">Number of Ambulance in Use</label>
                                   <div class="col-lg-7">
                                  <input type="text" maxlength="2" class="form-control" id="numAmb" name="numAmb" value="<?php echo $usedambs; ?>">

                                   </div>
                                </div>

                                <div class="form-group row"> 

                                  <label  class="col-lg-5 col-form-label form-control-label" for="numRoom">Number of Room in Use</label>
                                  <div class="col-lg-7">
                                  <input type="text" maxlength="3" class="form-control" id="numRoom" name="numRoom" value="<?php echo $usedrooms; ?>">

                                  </div> 
                               </div>

                               <div class="form-group row">

                                  <label  class="col-lg-5 col-form-label form-control-label" for="numWard">Number of Ward in Use</label>
                                  <div class="col-lg-7">
                                  <input type="text" maxlength="3" class="form-control" id="numWard" name="numWard" value="<?php echo $usedwards; ?>">

                                  </div> 
                                </div>
                              <div class="form-group row">

                                    <label  class="col-lg-5 col-form-label form-control-label" for="numPpe">Number of PPE in Use</label>
                                    <div class="col-lg-7">
                                    <input type="text" maxlength="4" class="form-control" id="numPpe" name="numPpe" value="<?php echo $usedppes; ?>">

                                     </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-lg-5 col-form-label form-control-label">Whether the Manpower is Adequate</label>
                                    <div class="col-lg-7">
                                        <select id="cboManAdequate" name="cboManAdequate" class="form-control" size="0">
                                        <option value="">-Select-</option>
                                            <option value="yes" <?php if($usedmanadequate==1) echo "selected"; ?>>Yes</option>
                                            <option value="no" <?php if($usedmanadequate==0) echo "selected"; ?>>No</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label form-control-label"></label>
                                    <div class="col-lg-7">
                                    <input type="submit" class="btn btn-primary" id="submitButn" value="Update Data">
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card change password -->

                </div>
</div>
</div>
</div>
</div>
  <script src="js/jquery.validate.min.js"></script>
  <script>
  $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='frmAdd']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
     numBed : {required: true,
     number: true

       },
      numIcubed  : {required: true,
        number: true
       },
       numVent : {required: true,
        number: true
       },
      numAmb  : {required: true,
        number: true
       },
       numRoom : {required: true,
        number: true
        },
      numWard  : {required: true,
        number: true
        },
      numPpe: {
          required: true,
          number: true
      
      },
      cboManAdequate  : {required: true
        },
     

    },
    // Specify validation error messages
    messages: {
        numBed  : {required:"Please enter Number of Bed",
          number: " only number is allowed as input"


        },
        numIcubed : {required: "Please enter Number of ICU Bed",
          number: " only number is allowed as input"

       
      },
      numVent  : {required:"Please enter Number of Ventilator",
        number: " only number is allowed as input"


},
numAmb : {required:"Please enter Number of Ambulance",
  number: " only number is allowed as input"


},
numRoom : {required:"Please enter Number of Room",
  number: " only number is allowed as input"


},
numWard  : {required:"Please enter Number of Ward",
  number: " only number is allowed as input"


},
numPpe : {required:"Please enter Number of PPE Kit",
  number: " only number is allowed as input"


},
cboManAdequate: {required:"Please select an option"

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

  
</body></html>
