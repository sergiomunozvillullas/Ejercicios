<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <title>Empresa</title>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <p>Número de almacen:</p>
    <select name="almacen">
      <?php require 'funciones.php';
      //CREAMOS CONEXION
      $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
      $conexion=crearconexion($servername, $username, $password, $dbname);

      //CREAMOS EL DESPLEGABLE
      //SELECT
      $stmt = $conexion->prepare("SELECT num_almacen FROM almacen");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach($stmt->fetchAll() as $row) {
        //OPTIONS
        ?>
        <option value="<?php echo $row['num_almacen']; ?>"> <?php echo $row['num_almacen']; ?> </option>';

        <?php
      }
      //CERRAMOS CONEXION
      $conexion=null;
      ?>
    </select>


    <br><br>
    <input type="submit" value="Enviar"  name="enviar">
    <input type="reset" value="Borrar">
  </form>
</body>
</html>



<?php
if (isset($_POST['enviar'])) {
  //INTRODUCIMOS LAS FUNCIONES

  //CREAMOS CONEXION
  echo "Creamos la conexion: ";
  $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
  $conexion=crearconexion($servername, $username, $password, $dbname);

  //AÑADIMOS PARAMETROS
    $almacen=$_POST['almacen'];


  //FUNCIONES
  revisarparametros($almacen);
  mostraralmacen($almacen,$conexion);

  //CERRAMOS CONEXION
  $conexion=null;
}
?>
