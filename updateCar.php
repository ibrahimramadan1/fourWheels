<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Car Info</title>
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
<body>';

     include "CMS.html";
     $id=$_POST["ID"];
     $servername = "localhost";
                $username = "root";
                $password = "";
                $DBname="fourwheels";
                $conn = new mysqli($servername, $username, $password,$DBname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
     $sql="SELECT * FROM car WHERE ID='{$id}'";
     if ($result = $conn -> query($sql)) {
      while ($obj = $result -> fetch_object()) {
     echo '<form class="container" method="post" enctype="multipart/form-data" action="Cupdate.php">
              <div class="Cars">   
                <div class="CarsDetails">
                  <div class="CarDetails">
                    <h3>Car</h3>
                      <hr>
                        <input name="ID" type="hidden" value="'.$obj->ID.'">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Old Car Mark</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->mark.'</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">New Car Mark</span>
                        </div>
                        <input name="Cmark" type="text" class="form-control" placeholder="Car Mark">
                        </div>

                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Old Car Type</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->type.'</span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">New Car Type</span>
                        </div>
                        <select name="Ctype" style="margin-right: 0px !important;" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option value="manual">manual</option>
                        <option value="Auto">Auto</option>
                        </select>
                        </div>

                        
    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Old No. Seats</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->NoSeats.'</span>
                            </div>                        
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">New Number of seats</span>
                        </div>
                        <input name="Cseat" type="number" class="form-control" placeholder="Number of seats" value="4">
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Old Gas capcity</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->gasCap.'</span>
                            </div>                        
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">New Gas Capcity</span>
                        </div>
                        <input name="Ccapcity" type="number" class="form-control" placeholder="Gas Capcity" value="20">
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Old Picture</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.
                            '<img src="data:image/jpeg;base64,'.base64_encode($obj->pic).'" height="100%" width="100%" class="img-thumnail" />'
                            .'</span>
                            </div>                        
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">New Picture</span>
                        </div>
                        <input name="image" type="file" id="image" class="form-control">
                        </div>



                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Old describtion</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->describtion.'</span>
                            </div>                        
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">New description</span>
                        </div>
                        <textarea name="Cdesc" type="text" class="form-control" placeholder="description"></textarea>
                    </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Old Price</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->price.'</span>
                            </div>                        
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">New Price</span>
                        </div>
                        <input name="Cprice" type="number" class="form-control" placeholder="Price">
                    </div>

    
                    </div>  
                    </div>
                    <div class="text-right" style="margin-top: 20px;">
                        <input name="insert" type="submit"  class="w-100 btn btn-success" value="update" onclick="return checkNewCar()">
                    </div>
                   </form>
                   <br>
                   <script src="js/checkNewCar.js"></script>  
                   </body>
                    </html>';
                  }
                
              }
  }
  else{
    echo "You are not allowed to be here ";
  }

?>

