<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Delete Admins</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    echo '<div class="container">
        <h1>Admins</h1>
        <hr>
        <div class="Admins">';
            $counter=1;
            $sql="SELECT * FROM admins";
            $here=htmlspecialchars($_SERVER["PHP_SELF"]);
            if ($result = $conn -> query($sql)) {
                while ($obj = $result -> fetch_object()) {
                  if ($counter==1){
                    $counter++;
                    continue;
                  }
                    echo"<form method='post' action='{$here}'>";
                    echo '<div class="AdminsDetails">
                    <div class="AdminDetails">
                        <h3>Admin '.$counter++.'</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Admin Name</span>
                            </div>
                            <input name="Aname" type="text" class="form-control" placeholder="'.$obj->name.'" value="'.$obj->name.'" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">User Name</span>
                            </div>
                            <input name="Auser" type="text" class="form-control" placeholder="'.$obj->userName.'" value="'.$obj->userName.'" readonly>

                            
                        </div>
    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            </div>
                            <input name="Aemail" type="text" class="form-control" placeholder="'.$obj->email.'" value="'.$obj->email.'" readonly>
                        </div>
                    </div>
                    <div class="text-right" style="margin-top: 20px;">
                    <input style="background: rgb(170,0,0); border: rgb(170,0,0); " type="submit" class="w-100 btn btn-success" value="delete">
                    </div>
                   </form><br>';
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
        
        $n=$_POST["Aname"];
        $u=$_POST["Auser"];
        $e=$_POST["Aemail"];
        $p="";
        $a= new Admin($n,$u,$e,$p);
        $sql="Delete FROM admins WHERE name='{$a->getName()}' AND
        userName='{$a->getUserName()}'AND
        email='{$a->getEmail()}'
        ";
        if ($conn->query($sql) === TRUE){
            echo "<script> alert ('".$a->getName(). " deleted successfully')</script>";
            echo("<script>location.href = 'deleteAdmin.php';</script>");
            exit;
            
          }
          else{
             echo "<script> alert ('".$a->getName(). " didn't deleted')</script>";
          }
    }

    

?>