
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($almacen){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

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


function mostraralmacen($almacen,$conn){
  echo "</br>";
  try {

    $stmt1 = $conn->prepare("SELECT localidad FROM almacen WHERE num_almacen='$almacen'");
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt1->fetchAll() as $row) {
      $localidad=$row["localidad"];


    //-----------------------------------------------------

    $stmt = $conn->prepare("SELECT id_producto,cantidad FROM almacena WHERE num_almacen='$almacen'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
    $id_prod=$row["id_producto"];
    $cantidad=$row["cantidad"];


  //-----------------------------------------------------

  $stmt2 = $conn->prepare("SELECT nombre,precio,id_categoria FROM producto WHERE id_producto='$id_prod'");
  $stmt2->execute();
  $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
  foreach($stmt2->fetchAll() as $row) {
  $producto=$row["nombre"];
  $precio=$row["precio"];
  $id_cat=$row["id_categoria"];



  ?>
  <!-- TABLA -->
  <table border=1>
    <tr>
      <td> <?php echo "NUM_ALMACEN" ?> </td>
      <td> <?php echo "LOCALIDAD" ?> </td>
      <td> <?php echo "ID_PRODUCTO" ?> </td>
      <td> <?php echo "PRODUCTO" ?> </td>
      <td> <?php echo "PRECIO" ?> </td>
      <td> <?php echo "ID_CATEGORIA" ?> </td>
      <td> <?php echo "CANTIDAD" ?> </td>
    </tr>
    <tr>
      <td> <?php echo $almacen ?> </td>
      <td> <?php echo $localidad ?> </td>
      <td> <?php echo $id_prod ?> </td>
      <td> <?php echo $producto ?> </td>
      <td> <?php echo $precio ?> </td>
      <td> <?php echo $id_cat ?> </td>
      <td> <?php echo $cantidad ?> </td>
    </tr>
  </table>




  <?php
}//foreach1
}//foreach2
}//foreach3

  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }



}



?>
