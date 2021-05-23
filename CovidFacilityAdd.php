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
$sql_facility="select loginid from m_covid where loginid=? and isactive='1' and createdDate is not null";
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

    <title>Login to Pradesh Raksha</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
	 form .error{color:#ff0000;}
	</style>
  </head>

  <body>
  <div class="container py-5">
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
                            <form class="form" role="form" action="serviceCovidFacilityAdd.php" autocomplete="off" id="frmAdd" name="frmAdd" novalidate="" method="POST">
                            <div class="form-group row">
                                    <label class="col-lg-5 col-form-label form-control-label">Is the covid center functional?</label>
                                    <div class="col-lg-7">
                                        <select id="userValue" name="userValue" class="form-control" size="0">
                                        <option value="">-Select-</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group row">

                                    <label class="col-lg-5 col-form-label form-control-label" for="numRoom">Number of rooms with attached bathroom</label>
                                    <div class="col-lg-7">
                                    <input type="text"  maxlength="3" class="form-control" id="numRoom" name="numRoom">
                                    </div>
                                </div>

                                
              

                                <div class="form-group row text-center">

                                <label  class="col-lg-10 col-form-label form-control-label" > <h4>Details of concerned Govt: Authority</h4></label>
                                 </div>
                                <div class="form-group row">

                                    <label  class="col-lg-4 col-form-label form-control-label" for="nameLoc">Name:</label>
                                    <div class="col-lg-5">
                                    <input type="text"  maxlength="16"class="form-control" id="nameLoc" name="nameLoc">
                                    
                                        </div>
                                </div>
                                <div class="form-group row">

                                     <label class="col-lg-4 col-form-label form-control-label" for="nameDes">Designation:</label>
                                     <div class="col-lg-5">
                                     <input type="text" maxlength="20"class="form-control" id="nameDes" name="nameDes">
                                     </div>
                                </div>

                                <div class="form-group row">

                                  <label  class="col-lg-4 col-form-label form-control-label" for="numPh">Contact No:</label>
                                   <div class="col-lg-5">
                                  <input type="text" maxlength="10" class="form-control" id="numPh" name="numPh">

                                   </div>
                                </div>

                                  <div class="form-group row text-center">

                                <label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h4>Details of concerned Govt: hospital</h4></label>
                                 </div>
                                <div class="form-group row">

                                  <label  class="col-lg-4 col-form-label form-control-label" for="nameLoc1">Name:</label>
                                   <div class="col-lg-5">
                                    <input type="text"  maxlength="16"class="form-control" id="nameLoc1" name="nameLoc1">

                                     </div>
                                      </div>
                                <div class="form-group row">

                               <label class="col-lg-4 col-form-label form-control-label" for="nameDes1">Designation:</label>
                                    <div class="col-lg-5">
                                <input type="text" maxlength="20"class="form-control" id="nameDes1" name="nameDes1">
                                </div>
                                   </div>

                         <div class="form-group row">

                         <label  class="col-lg-4 col-form-label form-control-label" for="numPh1">Contact No</label>
                        <div class="col-lg-5">
                         <input type="text" maxlength="10" class="form-control" id="numPh1" name="numPh1">

                            </div>
                           </div>

                                    <div class="form-group row">
                                    <label class="col-lg-5 col-form-label form-control-label">Whether you have the provision for food and water: </label>
                                    <div class="col-lg-7">
                                        <select id="userValue2" name="userValue2" class="form-control" size="0">
                                        <option value="">-Select-</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label form-control-label">Whether you have the provision for sanitaion and proper Waste disposal</label>
                                    <div class="col-lg-7">
                                        <select id="userValue3" name="userValue3" class="form-control" size="0">
                                        <option value="">-Select-</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                    <input type="submit" class="btn btn-primary" id="submitButn" value="Save Data">
                                        <input type="reset" class="btn btn-secondary" id="resetButn" value="Reset Data">
                                       
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
<script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.js"></script>
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
     numRoom : {required: true,
      number: true
       },
      nameLoc  : {required: true,
        lettersonly:false
       },
       nameDes : {required: true,
       lettersonly: false
       },
      numPh : {required: true,
        number: true
       },
       nameLoc1  : {required: true,
        lettersonly:false
       },
       nameDes1 : {required: true,
       lettersonly: true
       },
      numPh1 : {required: true,
        number: true
       },
     
      userValue  : {required: true
        },
        userValue2  : {required: true
        },
        userValue3  : {required: true
        },
     

    },
    // Specify validation error messages
    messages: {
        numRoom  : {required:"Please enter Number of Rooms",
          number: " only number is allowed as input"

        },
        nameLoc : {required: "Please enter name",
         lettersonly: " only text is allowed as input"
       
      },
      nameDes  : {required:"Please enter the designation",
        lettersonly: " only text is allowed as input"

},
numPh : {required:"Please enter the phone number",
  number: " only number is allowed as input"

},
nameLoc1 : {required: "Please enter name",
         lettersonly: " only text is allowed as input"
       
      },
      nameDes1 : {required:"Please enter the designation",
        lettersonly: " only text is allowed as input"
      },

      numPh1 : {required:"Please enter the phone number",
  number: " only number is allowed as input"

},
userValue: {required:"Please select an option"

},
userValue2: {required:"Please select an option"

},
userValue3: {required:"Please select an option"

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
