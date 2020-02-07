<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Update Cars</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DBname="fourwheels";
    $conn = new mysqli($servername, $username, $password,$DBname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    $sql="SELECT * FROM admins WHERE userName='{$_SESSION["user"]}'";
    $result = $conn -> query($sql);
    if ($result->num_rows>0){ include "CMS.html";
        echo'
   <section class="ftco-section bg-light">
   <div class="container">
   <h1>Car</h1>
   <hr>

   <div class="row">';
            $counter=1;
            $sql="SELECT * FROM car";
            $here=htmlspecialchars($_SERVER["PHP_SELF"]);
            if ($result = $conn -> query($sql)) {
                
                while ($obj = $result -> fetch_object()) {
                    
                    
                    
                    echo'
                            
                    <div class="col-md-4">
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
                            <form method="post" action="updateCar.php">
                            <input name="ID" type="hidden" value="'.$obj->ID.'">
                            <div class="text-right" style="margin-top: 20px;">
                                <input name="insert" type="submit"  class="w-100 btn btn-success" value="update">
                            </div>
                            </form>
    					</div>
    				</div>
                </div>';
                }
                $result -> free_result();                          
              }
            }
            else{
                echo "<script> alert ('you are not admin please sign in to see this content')</script>";
                echo("<script>location.href = 'adminLogin.php';</script>");
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
  <script src="js/main.js"></script>
</body>
</html>


