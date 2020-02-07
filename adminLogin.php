<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <style>
      *{
       
      }
    </style>
</head>
<body>
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <form class="container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <hr>
        <div style="width: 70%; position:absolute; top:50%; left:50%; transform: translate(-50%,-50%); backdrop-filter: blur(10px); border-radius: 20px;  background-color: rgba(255, 255, 255, 0.698);" class="card p-4 Admins ml-auto mr-auto">   
          <div class="text-center"><h1>Admin</h1></div>
           <div class="AdminsDetails">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">User Name</span>
                    </div>
                    <input name="Auser" type="text" class="form-control" placeholder="User Name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    </div>
                    <input name="Apassword" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="text-right" style="margin-top: 20px;">
                    <input type="submit" onclick="return checkLogin()" class="w-100 btn btn-success" value="Login">
                </div>
            </div>
        </div>
    </form>
    </div>
  
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
  <script src="js/scrollax.min.js"></script>
  <script src="js/checkLogin.js"></script>
</body>
</html>
<?php
class Admin{
    public $name;
    public $userName;
    public $email;
    public $password;
    function __construct($userName,$password) {
      $this->userName = $userName;
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
    
    $u=$_POST["Auser"];
    $p=$_POST["Apassword"];
    $a= new Admin($u,$p);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DBname="fourwheels";
    $conn = new mysqli($servername, $username, $password,$DBname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    $_SESSION["user"]=$a->getUserName();

    $sql="SELECT * FROM admins WHERE 
    userName='{$a->getUserName()}' AND 
    PASSWORD='{$a->getPassword()}'";
    $result = $conn -> query($sql);
    if ($result->num_rows>0){
        echo "<script> alert ('".$_SESSION["user"]. "  Welcome')</script>";
        echo("<script>location.href = 'viewAdmins.php';</script>");
        exit;
    }
    else{
        echo "<script> alert ('this is not admin info')</script>";
    }
    

}
?>