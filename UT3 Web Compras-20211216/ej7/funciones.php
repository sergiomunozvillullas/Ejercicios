
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($nif,$desde,$hasta){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nif = test_input($_POST["nif"]);
    $desde = test_input($_POST["desde"]);
  $hasta = test_input($_POST["hasta"]);
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


function mostrarcompras($nif,$desde,$hasta,$conn){
  echo "</br>";
  try {
$cont=0;
        $stmt = $conn->prepare("SELECT id_producto FROM compra WHERE nif='$nif' AND fecha_compra BETWEEN '$desde' AND '$hasta' ");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $row) {
        $id=$row["id_producto"];
$cont++;

      //-----------------------------------------------------

    $stmt1 = $conn->prepare("SELECT id_producto,nombre,precio FROM producto WHERE id_producto='$id'");
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt1->fetchAll() as $row) {
      $idprod=$row["id_producto"];
      $nombreprod=$row["nombre"];
      $precioprod=$row["precio"];
    }

    ?>
    <!-- TABLA -->
    <table border=1>
      <tr>
        <td> <?php echo "NIF" ?> </td>
        <td> <?php echo "ID_PRODUCTO" ?> </td>
        <td> <?php echo "PRODUCTO" ?> </td>
        <td> <?php echo "PRECIO" ?> </td>
        <td> <?php echo "SUMA COMPRA TOTAL" ?> </td>
      </tr>
      <tr>
        <td> <?php echo $nif ?> </td>
        <td> <?php echo $idprod ?> </td>
        <td> <?php echo $nombreprod ?> </td>
        <td> <?php echo $precioprod ?> </td>
        <td> <?php echo $cont ?> </td>
      </tr>
    </table>




    <?php

}
    //-----------------------------------------------------

  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }



}



?>
