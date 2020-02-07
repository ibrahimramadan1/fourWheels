<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Admins</title>
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
            if ($result = $conn -> query($sql)) {
                while ($obj = $result -> fetch_object()) {
                    echo '<div class="AdminsDetails">
                    <div class="AdminDetails">
                        <h3>Admin '.$counter++.'</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Admin Name</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->name.'</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">User Name</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->userName.'</span>
                            </div>
                            
                        </div>
    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            </div>
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">'.$obj->email.'</span>
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
</body>
</html>