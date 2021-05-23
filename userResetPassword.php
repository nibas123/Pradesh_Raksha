<?php
session_start();

?>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Pradesh Raksha - Reset Password</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
	 form .error{color:#ff0000;}
	</style>
  </head>

  <body>
  <div class="container py-3">
  <div class="row">
        <div class="col-md-12">
         
            <div class="row">
               <div class="col-md-6 offset-md-3">
                    <!--<span class="anchor" id="formChangePassword"></span> -->
                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Reset Password</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" action="serviceUserPasswordReset.php" autocomplete="off" id="frmPassword" name="frmPassword" novalidate="" method="POST">
                                
                                <div class="form-group">
                                    <label for="inputPasswordNew">New Password</label>
                                    <input type="password" class="form-control" id="inputPasswordNew" name="inputPasswordNew">
                                    <!--<span class="form-text small text-muted">
                                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                        </span> -->
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNewVerify">Verify</label>
                                    <input type="password" class="form-control" id="inputPasswordNewVerify" name="inputPasswordNewVerify">
                                    <!-- <span class="form-text small text-muted">
                                            To confirm, type the new password again.
                                        </span> -->
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right">Reset Password</button>
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
  <script src="js/jquery-3.2.1.min.js">
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script>
  $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='frmPassword']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      inputPasswordNew: {
          required: true,
        minlength:8
      },
      inputPasswordNewVerify: {
        required: true,
        equalTo: "#inputPasswordNew",
        minlength:8
      }

    },
    // Specify validation error messages
    messages: {
        inputPasswordNew: {required: "Please enter new password",
        minlength: "Minmum of 8 characters required"
      },
      inputPasswordNewVerify: {required: "Please re-enter password",
        equalTo: "password doesnt match",
        minlength:"Minmum of 8 characters required"
      }
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
