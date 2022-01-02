
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($categoria,$producto,$precio){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $categoria = test_input($_POST["categoria"]);
    $producto = test_input($_POST["producto"]);
      $precio = test_input($_POST["precio"]);
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



function arraycategoria($conn){
  try {
    $arraycategoria=array();
    $stmt = $conn->prepare("SELECT nombre FROM categoria");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 foreach($stmt->fetchAll() as $row) {
        array_push($arraycategoria,$row["nombre"]);
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
return $arraycategoria;
}


function altaproducto($categoria,$producto,$precio,$conn){
  echo "</br>";
  $cont=1;
try {
  //------------------------------------------------------
  $stmt2 = $conn->prepare("SELECT id_categoria FROM categoria WHERE nombre='$categoria'");
     $stmt2->execute();
     $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
     foreach($stmt2->fetchAll() as $row) {
       $id_categoria=$row["id_categoria"];
     }
  //----------------------------------------------------
  $stmt = $conn->prepare("SELECT max(id_producto) as 'id_producto' FROM producto");
     $stmt->execute();
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       foreach($stmt->fetchAll() as $row) {
         $cont=$row["id_producto"];
         $quitar = explode("P", $cont);
         if(count($quitar)>1){
           $pos0=$quitar[1];
         }else {
           $pos0=$quitar[0];
         }

         $contador=intval($pos0)+1;
         $cod = str_pad($contador, 4, "0", STR_PAD_LEFT);
         $id="P".$cod;
       }

//-----------------------------------------------------
    $stmt1 = $conn->prepare("INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES ('$id','$producto','$precio','$id_categoria')");
    $stmt1->execute();
    echo "Se ha añadido el producto ".$producto." a la categoria ".$categoria;
    // set the resulting array to associative
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);

 }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }


}



 ?>
