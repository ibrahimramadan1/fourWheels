<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Delete Car</title>
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
    if ($result->num_rows>0){ include "CMS.html";
        echo '
    <div class="container">
        <h1>Car</h1>
        <hr>
        <div class="Car">';
        
            $counter=1;
            $sql="SELECT * FROM car";
            $here=htmlspecialchars($_SERVER["PHP_SELF"]);
            if ($result = $conn -> query($sql)) {
                while ($obj = $result -> fetch_object()) {
                    echo"<form method='post' action='{$here}'>";
                    echo '<div class="CarDetails">
                    <div class="CarDetails">
                        <h3>Car '.$counter++.'</h3>
                        <input name="ID" type="hidden" value="'.$obj->ID.'">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Car Mark</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->mark.'</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Car Type</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->type.'</span>
                            </div>
                            
                        </div>
    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">No. Seats</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->NoSeats.'</span>
                            </div>                        
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Gas capcity</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->gasCap.'</span>
                            </div>                        
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Picture</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.
                            '<img src="data:image/jpeg;base64,'.base64_encode($obj->pic).'" height="100%" width="100%" class="img-thumnail" />'
                            .'</span>
                            </div>                        
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">describtion</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->describtion.'</span>
                            </div>                        
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Price</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->price.'</span>
                            </div>                        
                        </div>
    
                    </div>  
                    </div>
                    <div class="text-right" style="margin-top: 20px;">
                    <input style="background: rgb(170,0,0); border: rgb(170,0,0); " type="submit" class="w-100 btn btn-success" value="delete">
                    </div>
                   </form>
                   <br>';
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
    class Car{
        public $ID;
        function __construct($ID) {
          $this->ID = $ID;
        }
        function getID(){
          return $this->ID;
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
        $ID=0;
        if (isset($_POST["ID"]))
            $ID=$_POST["ID"];
        $a= new Car($ID);
        $sql="DELETE FROM Car WHERE ID='{$a->getID()}'";
        if ($conn->query($sql) === TRUE){
            echo "<script> alert ('deleted successfully')</script>";
            echo("<script>location.href = 'deleteCar.php';</script>");
            exit;
          }
          else{
             echo "<script> alert ('did not deleted')</script>";
          }
    }

    

?>