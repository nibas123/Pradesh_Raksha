<?php
session_start();
//get a random nonce
$str=rand(); 
$result = md5($str); 
$_SESSION['ses_secret']=$result;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up to Pradesh Raksha</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme9.css">
    <link rel="stylesheet" type="text/css" href="css/svgslider.css">
    
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    
                    <!-- text animation   -->
                    <h1 class="ml9">
  <span class="text-wrapper">
    <span class="letters"> <h3>Welcome to Pradesh Raksha</h3></span>
      <span class="subletters"> 
      <h6>A digital optimization of administrative systems.</h6></span>
  </span>
                    </h1>

<script src="js/anime.min.js"></script>
                    
                
                    
                     <!-- text animation close    -->
                    
       <!--              <h3>Welcome to Pradesh Raksha</h3>
                     <p>A digital optimization of administrative systems.</p><p>Pradesh Raksha helps fight against covid-19.</p>


                -->
<br>
                    <br>
                    
                    
                    
                    
                    <!--SVG slider -->
                    
                    
                    <header class="intro">
  <div class="intro-slideshow">
    <img src="images/graphic5.svg">
    <img src="images/tourister.svg">
  </div>
</header>
                  
                    <script>const slideshowImages = document.querySelectorAll(".intro-slideshow img");

const nextImageDelay = 5000;
let currentImageCounter = 0; // setting a variable to keep track of the current image (slide)

// slideshowImages[currentImageCounter].style.display = "block";
slideshowImages[currentImageCounter].style.opacity = 1;

setInterval(nextImage, nextImageDelay);

function nextImage() {
  // slideshowImages[currentImageCounter].style.display = "none";
  slideshowImages[currentImageCounter].style.opacity = 0;

  currentImageCounter = (currentImageCounter+1) % slideshowImages.length;

  // slideshowImages[currentImageCounter].style.display = "block";
  slideshowImages[currentImageCounter].style.opacity = 1;
}</script>
                    <!-- SVG slider close -->
                    
                    
                    
                    
                    
                    
                    
                    
                  
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="index.html">
                                <div class="logo">
                                    <h1 class="">

     <h3>Login to your account</h3>

  
                    </h1>
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <a href="index.php">Login</a><a href="registerPart1.php" class="active">Register</a>
                        </div>
                        <form class="form" role="form" autocomplete="off" id="frmRegisterPart1" name="frmRegisterPart1" method="post" action="registerPart2.php">
                            <input class="form-control" type="text" name="txtUsername" placeholder="E-mail Address" id="txtUsername" required>
                            <input class="form-control" type="password" name="txtPassword" placeholder="Password" id="txtPassword" required>
                            <input class="form-control" type="password" name="txtRPassword" placeholder="Re-Enter Password" id="txtRPassword" required>
                            <div class="form-button">
                                <button id="btnSignup" type="submit" class="ibtn" value="Proceed">Register</button>
                            </div>
                            <span id="alert" style="color:#ff0000;font-size:1em;font-family:arial;"><?php if(isset($_GET['f'])) echo base64_decode($_GET['f']); ?></span>
								
								<input type="hidden" id="txtNonce" name="txtNonce" value="<?php echo $_SESSION['ses_secret']; ?>" />
                        </form>
                        <div class="other-links">
                          <span>Copyright &#169; Collectorate Alappuzha</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/1jquery.min.js"></script>
<script src="js/1popper.min.js"></script>
<script src="js/1bootstrap.min.js"></script>
<script src="js/1main.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  
  <script>
  $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='frmRegisterPart1']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
	  
      txtUsername: {required:true, email:true},
      
      txtPassword: {
        required: true,
        minlength: 8
      },
	  txtRPassword: {
        required: true,
		equalTo: "#txtPassword",
        minlength: 8
      }
    },
    // Specify validation error messages
    messages: {
	  
      txtUsername: {required :"Please enter your username", email: "Enter a valid email id" },
      txtPassword: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
	  txtRPassword: {
        required: "Please re-enter password",
		equalTo: "Your passwords are not matching!",
        minlength: "Your password must be at least 8 characters long"
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

 
  <script>// Wrap every letter in a span
var textWrapper = document.querySelector('.ml9 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml9 .letter',
    scale: [0, 1],
    duration: 1500,
    elasticity: 600,
    delay: (el, i) => 45 * (i+1)
  })
    .add({
    targets: '.ml9 .subletter',
    scale: [0, 1],
    duration: 1500,
    elasticity: 600,
    delay: (el, i) => 100 * (i+1)
  })
    
    
    
    .add({
    targets: '.ml9',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 5000
  });</script> 
                   
                      
</body>
</html>