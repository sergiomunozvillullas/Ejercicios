
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($localidad){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $localidad = test_input($_POST["localidad"]);

}
}

function crearconexion($servername, $username, $password, $dbname){
  // Create connection
  try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "Connected successfully";
   }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }
return $conn;
}



function altaalmacen($localidad,$conn){
  echo "</br>";
  $cont=1;
try {

  $stmt = $conn->prepare("SELECT localidad FROM almacen");
     $stmt->execute();
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


       foreach($stmt->fetchAll() as $row) {
          $cont++;
           }
//-------------

  $cod = $cont*10;

//-----------------------------------------------------
    $stmt1 = $conn->prepare("INSERT INTO almacen (num_almacen,localidad) VALUES ('$cod','$localidad')");
    $stmt1->execute();

    // set the resulting array to associative
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);

 }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }


}



 ?>
