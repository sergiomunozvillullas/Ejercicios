
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($cantidad,$producto,$almacen){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cantidad = test_input($_POST["cantidad"]);
    $producto = test_input($_POST["producto"]);
      $almacen = test_input($_POST["almacen"]);

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

function arraynombreprod($conn){
  try {
    $arraynombreprod=array();
    $stmt = $conn->prepare("SELECT nombre FROM producto");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 foreach($stmt->fetchAll() as $row) {
        array_push($arraynombreprod,$row["nombre"]);
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
return $arraynombreprod;
}

function altaalmacen($cantidad,$producto,$almacen,$conn){
  echo "</br>";
try {

  $stmt = $conn->prepare("SELECT id_producto FROM producto WHERE nombre='$producto'");
     $stmt->execute();
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       foreach($stmt->fetchAll() as $row) {
         $id_producto=$row["id_producto"];
}

//-----------------------------------------------------
    $stmt1 = $conn->prepare("INSERT INTO almacena (num_almacen,id_producto,cantidad) VALUES ('$almacen','$id_producto','$cantidad')");
    $stmt1->execute();

    // set the resulting array to associative
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    echo "Se han añadido ".$cantidad." de ".$producto." en el almacen número ".$almacen;

 }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }


}



 ?>
