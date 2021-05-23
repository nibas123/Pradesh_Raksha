<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}

$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//check whether facilities already added
//if facilities already added, then show a messages
$sql_facility="select loginid from m_hospital where loginid=? and isactive='1' and createdDate is not null";
$data=array($loginid);
$format=array("d");
$faclist=$db->selectData($sql_facility,$data,$format);
if($faclist){
	echo "<div style='padding-top:50px;text-align:center;width:100%;color:green;font-weight:bold; font-size:16px;font-family:arial'> Facilities already added! <br/> Kindly Click on Facility -> Update to update facility</div>";
	exit;
	}
?>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Facility add</title>


    <!-- Bootstrap core CSS -->
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
                            <h3 class="mb-0">ADD FACILITY</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" action="serviceHospitalFacilityAdd.php" autocomplete="off" id="frmFacilityAdd" name="frmFacilityAdd" novalidate="" method="POST">
                                <div class="form-group row">

                                    <label class="col-lg-5 col-form-label form-control-label" for="numBed">Total Number of Bed</label>
                                    <div class="col-lg-7">
                                    <input type="text"  maxlength="3" class="form-control" id="numBed" name="numBed">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label  class="col-lg-5 col-form-label form-control-label" for="numIcubed">Total Number of ICU Bed</label>
                                    <div class="col-lg-7">
                                    <input type="text"  maxlength="2"class="form-control" id="numIcubed" name="numIcubed">
                                    
                                        </div>
                                </div>
                                <div class="form-group row">

                                     <label class="col-lg-5 col-form-label form-control-label" for="numVent">Total Number of Ventilator</label>
                                     <div class="col-lg-7">
                                     <input type="text" maxlength="2"class="form-control" id="numVent" name="numVent">
                                     </div>
                                </div>

                                <div class="form-group row">

                                  <label  class="col-lg-5 col-form-label form-control-label" for="numAmb">Total Number of Ambulance</label>
                                   <div class="col-lg-7">
                                  <input type="text" maxlength="2" class="form-control" id="numAmb" name="numAmb">

                                   </div>
                                </div>

                                <div class="form-group row"> 

                                  <label  class="col-lg-5 col-form-label form-control-label" for="numRoom">Total Number of Room</label>
                                  <div class="col-lg-7">
                                  <input type="text" maxlength="3" class="form-control" id="numRoom" name="numRoom">

                                  </div> 
                               </div>

                               <div class="form-group row">

                                  <label  class="col-lg-5 col-form-label form-control-label" for="numWard">Total Number of Ward</label>
                                  <div class="col-lg-7">
                                  <input type="text" maxlength="3" class="form-control" id="numWard" name="numWard">

                                  </div> 
                                </div>
                              <div class="form-group row">

                                    <label  class="col-lg-5 col-form-label form-control-label" for="numPpe">Total Number of PPE</label>
                                    <div class="col-lg-7">
                                    <input type="text" maxlength="4" class="form-control" id="numPpe" name="numPpe">

                                     </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-lg-5 col-form-label form-control-label">Whether the Manpower is Adequate</label>
                                    <div class="col-lg-7">
                                        <select id="cboManAdequate" name="cboManAdequate" class="form-control" size="0">
                                        <option value="">-Select-</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label form-control-label"></label>
                                    <div class="col-lg-7">
                                    <input type="submit" class="btn btn-primary" id="submitButn" value="Save Data">         
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
  $("form[name='frmFacilityAdd']").validate({
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
