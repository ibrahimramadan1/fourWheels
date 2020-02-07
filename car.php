<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Our Cars</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Four<span>Wheels</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="car.php" class="nav-link">Cars</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>
	<section class="ftco-section bg-light">
   <div class="container">
   <h1>Car</h1>
   <hr>
   <div class="row">  
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $DBname="fourwheels";
            $conn = new mysqli($servername, $username, $password,$DBname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $counter=1;
            $sql="SELECT * FROM car";
            $here=htmlspecialchars($_SERVER["PHP_SELF"]);
            if ($result = $conn -> query($sql)) {
                
                while ($obj = $result -> fetch_object()) {
       			echo'<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end">
                        <img src="data:image/jpeg;base64,'.base64_encode($obj->pic).'" height="100%" width="100%" class="img-thumnail" />
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">'.$obj->mark.'</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">'.$obj->type.'</span>
	    						<p class="price ml-auto">'.$obj->price.'<span>LE</span></p>
    						</div>
                            <form method="post" action="carSingle.php">
                            <input name="ID" type="hidden" value="'.$obj->ID.'">
                            <div class="text-right" style="margin-top: 20px;">
                                <input name="insert" type="submit"  class="w-100 btn btn-success" value="Show more">
                            </div>
                            </form>
    					</div>
    				</div>
                </div>';
                }
                $result -> free_result();                          
              }   
            ?>
            </div>
            </div>
    </section>
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>