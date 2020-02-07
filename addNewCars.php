<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Cars</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .red{
            background: red;
        }
        .container{ 
            padding: 50px;
        }
        *{
            transition: all ease-in-out 1s;
        }
    </style>
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
    if ($result->num_rows>0){
    include "CMS.html";
    $here=htmlspecialchars($_SERVER["PHP_SELF"]);
    echo '<form class="container" method="post" enctype="multipart/form-data" action="'.$here.'">
        <h1>Car</h1>
        <hr>
        <div class="Cars">   
           <div class="CarsDetails">
                <div class="CarDetails">
                    <h3>Car</h3>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Car Mark</span>
                        </div>
                        <input name="Cmark" type="text" class="form-control" placeholder="Car Mark">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Type</span>
                        </div>
                        <select name="Ctype" style="margin-right: 0px !important;" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option value="manual">manual</option>
                        <option value="Auto">Auto</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Number of seats</span>
                        </div>
                        <input name="Cseat" type="number" class="form-control" placeholder="Number of seats" value="4">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Gas Capcity</span>
                        </div>
                        <input name="Ccapcity" type="number" class="form-control" placeholder="Gas Capcity" value="20">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Picture</span>
                        </div>
                        <input name="image" type="file" id="image" class="form-control">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">description</span>
                        </div>
                        <textarea name="Cdesc" type="text" class="form-control" placeholder="description"></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Price</span>
                        </div>
                        <input name="Cprice" type="number" class="form-control" placeholder="Price">
                    </div>



                </div>
           
            </div>
        </div>
       <div class="text-right" style="margin-top: 20px;">
        <input name="insert" type="submit"  class="w-100 btn btn-success" value="Submit" onclick="return checkNewCar()">
       </div>
    </form>';
    }
    else{

        echo "<script> alert ('you are not admin please sign in to see this content')</script>";
        echo("<script>location.href = 'adminLogin.php';</script>");
    }
    ?>
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
    <script src="js/checkNewCar.js"></script>    
</body>
</html>

<?php
   class Car{
        private $mark,$type,$noSeats,$gasCap,$pic,$desc,$price;
        function __construct($mark,$type,$noSeats,$gasCap,$pic,$desc,$price) {
          $this->mark = $mark;
          $this->type = $type;
          $this->noSeats = $noSeats;
          $this->gasCap=$gasCap;
          $this->pic = $pic;
          $this->desc = $desc;
          $this->price = $price;
        }
        function getMark(){
            return $this->mark;
        }
        function getType(){
            return $this->type;
        }

        function getNoSeats(){
            return $this->noSeats;
        }

        function getGasCap(){
            return $this->gasCap;
        }
        function getPic(){
            return $this->pic;
        }

        function getDesc(){
            return $this->desc;
        }

        function getPrice(){
            return $this->price;
        }
      }
          if (isset($_POST["insert"])){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $DBname="fourwheels";
                $conn = new mysqli($servername, $username, $password,$DBname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
            
            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));                
            $car= new Car($_POST["Cmark"],$_POST["Ctype"],$_POST["Cseat"],
                            $_POST["Ccapcity"],$file,$_POST["Cdesc"],$_POST["Cprice"]);
            
            $sql="INSERT INTO car(mark,type,NoSeats,gasCap,pic,describtion,price)VALUES(
                '{$car->getMark()}','{$car->getType()}','{$car->getNoSeats()}','{$car->getGasCap()}',
                '{$car->getPic()}','{$car->getDesc()}','{$car->getPrice()}')";
                if ($conn->query($sql)===TRUE){
                    echo "<script>alert('car added successfully')</script>";
                }
                else{
                    echo "<script>alert('car did not added ')</script>";
                }
            }      

?>


