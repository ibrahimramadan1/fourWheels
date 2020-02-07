
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
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["insert"])){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $DBname="fourwheels";
      $conn = new mysqli($servername, $username, $password,$DBname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $id=$_POST["ID"];  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));                
      $car= new Car($_POST["Cmark"],$_POST["Ctype"],$_POST["Cseat"],
                    $_POST["Ccapcity"],$file,$_POST["Cdesc"],$_POST["Cprice"]);
      $sql="UPDATE car SET 
            mark='{$car->getMark()}',
            type='{$car->getType()}',
            NoSeats='{$car->getNoSeats()}',
            gasCap='{$car->getGasCap()}',
            pic='{$car->getPic()}',
            describtion='{$car->getDesc()}',
            price='{$car->getPrice()}'
            WHERE ID='{$id}'";

if ($conn->query($sql)===TRUE){
  echo "<script>alert('car updated successfully')</script>";
  echo("<script>location.href = 'veiwCars.php';</script>");

}
else{
  echo "<script>alert('car did not updated ')</script>";
}

}
    }
    else{
        echo "you are not allowed to be here";
    }
?>