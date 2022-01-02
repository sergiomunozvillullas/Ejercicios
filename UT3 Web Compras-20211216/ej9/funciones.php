
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($nif,$producto,$cantidadd){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nif = test_input($_POST["nif"]);
    $producto = test_input($_POST["producto"]);
    $cantidad = test_input($_POST["cantidad"]);
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


function compra($nif,$producto,$cantidad,$conn){
  echo "</br>";
  $fecha=date('Y-m-d');
  try {

    $stmt1 = $conn->prepare("SELECT cantidad FROM almacena WHERE id_producto='$producto'");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt1->fetchAll() as $row) {
      $cantidadprod=$row["cantidad"];

      //--------------------------------------------
      if ($cantidad<$cantidadprod) {
        $cantidadtotal=$cantidadprod-$cantidad;
        $stmt = $conn->prepare("UPDATE almacena SET cantidad='$cantidadtotal' WHERE id_producto='$producto'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        //--------------------------------------------

        $stmt3 = $conn->prepare("SELECT nif FROM compra WHERE nif='$nif'");
        $stmt3->execute();
        $result3 = $stmt3->setFetchMode(PDO::FETCH_ASSOC);

        foreach($stmt3->fetchAll() as $row) {
          $nifusado=$row["nif"];
        }
        echo "$nifusado";
        //--------------------------------------------
        if (empty($nifusado)) {


          $stmt2 = $conn->prepare("INSERT INTO compra (nif,id_producto,fecha_compra,unidades) VALUES ('$nif','$producto','$fecha','$cantidad')");
          $stmt2->execute();

          // set the resulting array to associative
          $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
          echo "El cliente con nif ".$nif." ha comprado ".$cantidad." productos con el id ".$producto;
          //--------------------------------------------

        }else {

          $stmt = $conn->prepare("UPDATE compra SET unidades=unidades+'$cantidad' WHERE nif='$nif'");
          $stmt->execute();
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          echo "El cliente con nif ".$nif." ha comprado ".$cantidad." productos con el id ".$producto;
        }




      }else {
        echo "NO se pudo hacer la compra <br>";
        echo "La cantidad maxima a comprar de este producto es ".$cantidadprod;
      }

    }//foreach cantidad
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }


}



?>
