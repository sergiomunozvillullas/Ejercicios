
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($producto){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $producto = test_input($_POST["producto"]);

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

function mostrarprod($producto,$conn){
  echo "</br>";
  try {

    $stmt = $conn->prepare("SELECT id_producto FROM producto WHERE nombre='$producto'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
      $id_producto=$row["id_producto"];


    //-----------------------------------------------------
    $stmt1 = $conn->prepare("SELECT cantidad,num_almacen FROM almacena WHERE id_producto='$id_producto'");
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt1->fetchAll() as $row) {
      $cantidad=$row["cantidad"];
      $almacen=$row["num_almacen"];

      ?>
      <!-- TABLA -->
      <table border=1>
        <tr>
          <td> <?php echo "PRODUCTO" ?> </td>
          <td> <?php echo "CANTIDAD" ?> </td>
          <td> <?php echo "ALMACEN" ?> </td>
        </tr>
        <tr>
          <td> <?php echo $producto ?> </td>
          <td> <?php echo $cantidad ?> </td>
          <td> <?php echo $almacen ?> </td>
        </tr>
      </table>




      <?php

  }
  }


  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }


}



?>
