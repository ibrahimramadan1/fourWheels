<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Admins</title>
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
    
    echo '<form class="container" method="post" action="'.$here.'">
        <h1>Admins</h1>
        <hr>
        <div class="Admins">   
           <div class="AdminsDetails">
                
                <div class="AdminDetails">
                    <h3>Admin</h3>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Admin Name</span>
                        </div>
                        <input name="Aname[]" type="text" class="form-control" placeholder="Admin Name">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">User Name</span>
                        </div>
                        <input name="Auser[]" type="text" class="form-control" placeholder="User Name">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Email</span>
                        </div>
                        <input name="Aemail[]" type="Email" class="form-control" placeholder="Email">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Password</span>
                        </div>
                        <input name="Apassword[]" type="password" class="form-control" placeholder="Password">
                    </div>

                </div>
           
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-primary" onclick="newadmin()">+</button>
            </div>
        
       </div>
       <div class="text-right" style="margin-top: 20px;">
        <input type="submit" class="w-100 btn btn-success" value="Submit" onclick="return checkNewAdmins()">
       </div>

    </form>';}
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
    <script src="js/Admin.js"></script>
    <script src="js/checkNewAdmins.js"></script>
    
</body>
</html>


<?php
  class Admin{
    public $name;
    public $userName;
    public $email;
    public $password;

    function __construct($name,$userName,$email,$password) {
      $this->name = $name;
      $this->userName = $userName;
      $this->email = $email;
      $this->password=$password;
    }
    function getName(){
      return $this->name;
    }
    function getUserName(){
      return $this->userName;
    }
    function getEmail(){
      return $this->email;
    }
    function getPassword(){
      return $this->password;
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $DBname="fourwheels";
      $conn = new mysqli($servername, $username, $password,$DBname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $name=$_POST["Aname"];
      $userName=$_POST["Auser"];
      $email=$_POST["Aemail"];
      $password=$_POST["Apassword"];
      $counter=0;
      foreach($name as $n){
        $u=$userName[$counter];
        $e=$email[$counter];
        $p=$password[$counter];
        $counter++;
        $admin= new Admin($n,$u,$e,$p);
        $sql="INSERT INTO admins(name,userName,email,PASSWORD)VALUES(
         '{$admin->getName()}',
         '{$admin->getUserName()}',
         '{$admin->getEmail()}',
         '{$admin->getPassword()}')";
         if ($conn->query($sql) === TRUE){
           echo "<script> alert ('".$admin->getName(). " Added successfully')</script>";
         }
         else{
            echo "<script> alert ('".$admin->getName(). " didn't added')</script>";
         }

      }
  }
?>