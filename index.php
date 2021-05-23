<?php
session_start();
if(isset($_SESSION['ses_loginid'])){
	header("location:home.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Pradesh Raksha</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme9.css">
    <link rel="stylesheet" type="text/css" href="css/svgslider.css">
     <link rel="stylesheet" type="text/css" href="css/detailbox.css">
      <script src="js/jquery.min.js" type="text/javascript"></script>
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
                    <a href='adminportal/index.php'>Click Here to Log in to Admin</a>
                        <div class="website-logo-inside">
                            <a href="index.php">
                                <div class="logo">
                                  <h1 class="">

     <h3>Login to your account</h3>

  
                    </h1>
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <a href="index.php" class="active">Login</a><a href="registerPart1.php">Register</a>
                        </div>
                        <form class="form" role="form" action="serviceLogin.php" autocomplete="off" id="frmLogin" name="frmLogin" novalidate="" method="POST">
                            <input class="form-control" type="text" maxlength="30"  name="txtUsername" placeholder="E-mail Address" id="txtUsername" >
                            <input class="form-control" type="password" maxlength="16" name="txtPassword" placeholder="Password" id="txtPassword" >
                            <div class="form-button">
                                <div id="alert" style="color:#ff0000;font-family:arial;font-size:1em"><?php if(isset($_GET['f'])) echo base64_decode($_GET['f']); ?></div>
                               <!--  <input type="submit" class="btn btn-success btn-lg float-right" id="btnLogin" value="Sign In" /> -->
                            
                                <button id="btnLogin" type="submit" class="ibtn" href="registerPart1.php" value="Sign In">Login</button> 
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Copyright &#169; Collectorate Alappuzha</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/1jquery-3.2.1.min.js"></script>
<script src="js/1bootstrap.min.js"></script>
<script src="js/1jquery.validate.min.js"></script>  
  <script>
  $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='frmLogin']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
     txtUsername : {required: true
    
       },
     
      txtPassword  : {required: true
        },
     

    },
    // Specify validation error messages
    messages: {
        txtUsername  : {required: "Please enter Username",
         


        },
       

txtPassword: {required: "Please enter password",


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
    
         <!-- ICONS -->

             
    
</body>

</html>