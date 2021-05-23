<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");
//get the existing details of facilities
$sql_facilities="select * from m_ccused where loginid=?";
$data=array($loginid);
$format=array("d");
$facility=$db->selectData($sql_facilities,$data,$format);
?>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
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
                            <h3 class="mb-0">COVID CENTERS</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" action="serviceNewCovi.php" autocomplete="off" id="frmAdd" name="frmAdd" novalidate="" method="POST">
                           
                               
                                

                                <div class="form-group row text-center">

                                <label  class="col-lg-10 col-form-label form-control-label" > <h4>No of Inmates Present at CCC</h4></label>
                                 </div>
                                <div class="form-group row">

                                    <label  class="col-lg-4 col-form-label form-control-label" for="nM1">No. of Male</label>
                                    <div class="col-lg-5">
                                    <input type="text"  maxlength="5"class="form-control" id="nM1" name="nM1">
                                    
                                        </div>
                                </div>
                                <div class="form-group row">

                                     <label class="col-lg-4 col-form-label form-control-label" for="nF1">No. of Females</label>
                                     <div class="col-lg-5">
                                     <input type="text" maxlength="5"class="form-control" id="nF1" name="nF1">
                                     </div>
                                </div>

                                <div class="form-group row">

                                  <label  class="col-lg-4 col-form-label form-control-label" for="tIn1">Total No of Inmates</label>
                                   <div class="col-lg-5">
                                  <input type="text" maxlength="5" class="form-control" id="tIn1" name="tIn1">

                                   </div>
                                </div>

                                  <div class="form-group row text-center">

                                <label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h4>Type of Inmates Released as of today</h4></label>
                                 </div>
                                
                                <div class="form-group row">

                                    <label  class="col-lg-4 col-form-label form-control-label" for="nM2">No. of Male</label>
                                    <div class="col-lg-5">
                                    <input type="text"  maxlength="5"class="form-control" id="nM2" name="nM2">
                                    
                                        </div>
                                </div>
                                <div class="form-group row">

                                     <label class="col-lg-4 col-form-label form-control-label" for="nF2">No. of Females</label>
                                     <div class="col-lg-5">
                                     <input type="text" maxlength="5"class="form-control" id="nF2" name="nF2">
                                     </div>
                                </div>

                                <div class="form-group row">

                                  <label  class="col-lg-4 col-form-label form-control-label" for="tIn2">Total No of Inmates</label>
                                   <div class="col-lg-5">
                                  <input type="text" maxlength="5" class="form-control" id="tIn2" name="tIn2">

                                   </div>
                                </div>

                                <div class="form-group row text-center">

                                <label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h4>Number of Pravasi Acomadated</h4></label>
                                 </div>
                                 <div class="form-group row text-center">

                                <label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h5>Ship</h5></label>
                                 </div>
                                 <div class="form-group row">

                                            <label  class="col-lg-4 col-form-label form-control-label" for="nms">No. of Male</label>
                                            <div class="col-lg-5">
                                            <input type="text"  maxlength="5"class="form-control" id="nms" name="nms">

                                                </div>
                                            </div>
                                            <div class="form-group row">

                                            <label class="col-lg-4 col-form-label form-control-label" for="nfs">No. of Females</label>
                                            <div class="col-lg-5">
                                            <input type="text" maxlength="5"class="form-control" id="nfs" name="nfs">
                                            </div>
                                            </div>
                                            <div class="form-group row text-center">

                                        <label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h5>Flight</h5></label>
                                        </div>
                                        <div class="form-group row">

                                                    <label  class="col-lg-4 col-form-label form-control-label" for="nmf">No. of Male</label>
                                                    <div class="col-lg-5">
                                                    <input type="text"  maxlength="5"class="form-control" id="nmf" name="nmf">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                    <label class="col-lg-4 col-form-label form-control-label" for="nff">No. of Females</label>
                                                    <div class="col-lg-5">
                                                    <input type="text" maxlength="5"class="form-control" id="nff" name="nff">
                                                    </div>
                                                    </div>            

                                    
                                                    <div class="form-group row text-center">

<label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h4>No. of Interstate passengers accomodated</h4></label>
 </div>
<div class="form-group row text-center">

<label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h5>Ship</h5></label>
 </div>
 <div class="form-group row">

            <label  class="col-lg-4 col-form-label form-control-label" for="nmis">No. of Male</label>
            <div class="col-lg-5">
            <input type="text"  maxlength="5"class="form-control" id="nmis" name="nmis">

                </div>
            </div>
            <div class="form-group row">

            <label class="col-lg-4 col-form-label form-control-label" for="nfis">No. of Females</label>
            <div class="col-lg-5">
            <input type="text" maxlength="5"class="form-control" id="nfis" name="nfis">
            </div>
            </div>

            <div class="form-group row text-center">

<label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h5>Road</h5></label>
 </div>
 <div class="form-group row">

            <label  class="col-lg-4 col-form-label form-control-label" for="nrm">No. of Male</label>
            <div class="col-lg-5">
            <input type="text"  maxlength="5"class="form-control" id="nrm" name="nrm">

                </div>
            </div>
            <div class="form-group row">

            <label class="col-lg-4 col-form-label form-control-label" for="nrf">No. of Females</label>
            <div class="col-lg-5">
            <input type="text" maxlength="5"class="form-control" id="nrf" name="nrf">
            </div>
            </div>     
            
            <div class="form-group row text-center">

<label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h5>Rail</h5></label>
 </div>
 <div class="form-group row">

            <label  class="col-lg-4 col-form-label form-control-label" for="nrlm">No. of Male</label>
            <div class="col-lg-5">
            <input type="text"  maxlength="5"class="form-control" id="nrlm" name="nrlm">

                </div>
            </div>
            <div class="form-group row">

            <label class="col-lg-4 col-form-label form-control-label" for="nrlf">No. of Females</label>
            <div class="col-lg-5">
            <input type="text" maxlength="5"class="form-control" id="nrlf" name="nrlf">
            </div>
            </div>     
                                 

                                  <div class="form-group row text-center">

                                <label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h4>No. of Interdistrict passengers (Within kerala) Accomodated</h4></label>
                                 </div>
                                
                                <div class="form-group row">

                                    <label  class="col-lg-4 col-form-label form-control-label" for="nim">No. of Male</label>
                                    <div class="col-lg-5">
                                    <input type="text"  maxlength="5"class="form-control" id="nim" name="nim">
                                    
                                        </div>
                                </div>
                                <div class="form-group row">

                                     <label class="col-lg-4 col-form-label form-control-label" for="nif">No. of Females</label>
                                     <div class="col-lg-5">
                                     <input type="text" maxlength="5"class="form-control" id="nif" name="nif">
                                     </div>
                                </div>

                                
                                </div>
                                  <div class="form-group row text-center">

                                <label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h4>No.of primary and secondary contacts of positive case accomodated</h4></label>
                                 </div>
                                
                                <div class="form-group row">

                                    <label  class="col-lg-4 col-form-label form-control-label" for="npsm">No. of Male</label>
                                    <div class="col-lg-5">
                                    <input type="text"  maxlength="5"class="form-control" id="npsm" name="npsm">
                                    
                                        </div>
                                </div>
                                <div class="form-group row">

                                     <label class="col-lg-4 col-form-label form-control-label" for="npsf">No. of Females</label>
                                     <div class="col-lg-5">
                                     <input type="text" maxlength="5"class="form-control" id="npsf" name="npsf">
                                     </div>
                                </div>

                                

                                <div class="form-group row text-center">

<label  class="col-lg-10 col-form-label form-control-label" for="numIcube"> <h4></h4></label>
 </div>
 <div class="form-group row">

     <label class="col-lg-4 col-form-label form-control-label" for="symp"><h5>Symptomatic</h5></label>
     <div class="col-lg-5">
     <input type="text" maxlength="5"class="form-control" id="symp" name="symp">
     </div>
</div>

<div class="form-group row">

     <label class="col-lg-4 col-form-label form-control-label" for="td"><h5>Test Done</h5></label>
     <div class="col-lg-5">
     <input type="text" maxlength="5"class="form-control" id="td" name="td">
     </div>
</div>

<div class="form-group row">

     <label class="col-lg-4 col-form-label form-control-label" for="nopc"><h5>No.of Positive</h5></label>
     <div class="col-lg-5">
     <input type="text" maxlength="5"class="form-control" id="nopc" name="nopc">
     </div>
</div>

<div class="form-group row">

     <label class="col-lg-4 col-form-label form-control-label" for="tnra"><h5>Total No of Rooms Avilable</h5></label>
     <div class="col-lg-5">
     <input type="text" maxlength="5"class="form-control" id="tnra" name="tnra">
     </div>
</div>

<div class="form-group row">

     <label class="col-lg-4 col-form-label form-control-label" for="tno"><h5>Total NO of Rooms Occupied</h5></label>
     <div class="col-lg-5">
     <input type="text" maxlength="5"class="form-control" id="tno" name="tno">
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
     nM1 : {required: true,
      number: true
       },
      nF1  : {required: true,
        number:true
       },
       tIn1 : {required: true,
       number: true
       },
      nP : {required: true,
        number: true
       },
       nIs  : {required: true,
        number:true
       },
      nM2 : {required: true,
       number: true
       },
     nF2 : {required: true,
        number: true
       },
     
     tIn2  : {required: true,
      number: true
        },
        nms  : {required: true,
      number: true
        },   
        nfs  : {required: true,
      number: true
        },
        nmf  : {required: true,
      number: true
        },
       
        nff  : {required: true,
      number: true
        },
        nmis  : {required: true,
      number: true
        },
        nfis  : {required: true,
      number: true
        },
        nrm  : {required: true,
      number: true
        },
        nrf  : {required: true,
      number: true
        },
        nrlm  : {required: true,
      number: true
        },
        nrlf  : {required: true,
      number: true
        },
        nim  : {required: true,
      number: true
        },
        nif  : {required: true,
      number: true
        },
        npsm  : {required: true,
      number: true
        },
        npsf  : {required: true,
      number: true
        },
        symp  : {required: true,
      number: true
        },
        td  : {required: true,
      number: true
        },
        nopc  : {required: true,
      number: true
        },
        tno  : {required: true,
      number: true
        },
        




    },
    // Specify validation error messages
    messages: {
        nM1  : {required:"Please enter Number of Males",
          number: " only number is allowed as input"

        },
        nF1 : {required: "Please enter Number of Females",
         number: " only number is allowed as input"
       
      },
      tIn1  : {required:" Please enter Total No of Inmates ",
        number: " only number is allowed as input"

},
nM2  : {required:"Please enter Number of Males",
          number: " only number is allowed as input"

        },
        nF2 : {required: "Please enter Number of Females",
         number: " only number is allowed as input"
       
      },
      tIn2  : {required:" Please enter Total No of Inmates ",
        number: " only number is allowed as input"

},

nms  : {required: "Please enter Number of Males",
         number: " only number is allowed as input"
        },   
        nfs  : {required: "Please enter Number of Females",
         number: " only number is allowed as input"
        },
        nmf  : {required: "Please enter Number of Males",
         number: " only number is allowed as input"
        },
        nff  : {required: "Please enter Number of Females",
         number: " only number is allowed as input"
        },
       
        nmis  :{required: "Please enter Number of Males",
         number: " only number is allowed as input"
        },
        nfis  : {required: "Please enter Number of Females",
         number: " only number is allowed as input"
        },
        nrm  :{required: "Please enter Number of Males",
         number: " only number is allowed as input"
        },
        nrf  : {required: "Please enter Number of Females",
         number: " only number is allowed as input"
        },
        nrlm  : {required: "Please enter Number of Males",
         number: " only number is allowed as input"
        },
        nrlf  :{required: "Please enter Number of Females",
         number: " only number is allowed as input"
        },
        nim  : {required: "Please enter Number of Males",
         number: " only number is allowed as input"
        },
        nif  :{required: "Please enter Number of Females",
         number: " only number is allowed as input"
        },
        npsm  : {required: "Please enter Number of Males",
         number: " only number is allowed as input"
        },
        npsf  : {required: "Please enter Number of Females",
         number: " only number is allowed as input"
        },
        symp  :{required:"Please enter Total No of Symptomatic Inmates",
  number: " only number is allowed as input"

        },
        td  :{required:"Please enter the count of Test Done",
  number: " only number is allowed as input"

        },
        nopc  : {required:"Please enter Total No of Rooms",
  number: " only number is allowed as input"

        },
        tno  : {required: "Please enter No of Rooms Occupied",
         number: " only number is allowed as input"
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

  
</html>
