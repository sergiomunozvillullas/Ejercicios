<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <title>Empresa</title>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <p>NIF:</p>
    <select name="nif">
      <?php require 'funciones.php';
      //CREAMOS CONEXION
      $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
      $conexion=crearconexion($servername, $username, $password, $dbname);

      //CREAMOS EL DESPLEGABLE
      //SELECT
      $stmt = $conexion->prepare("SELECT NIF FROM cliente");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach($stmt->fetchAll() as $row) {
        //OPTIONS
        ?>
        <option value="<?php echo $row['NIF']; ?>"> <?php echo $row['NIF']; ?> </option>';

        <?php
      }
      //CERRAMOS CONEXION
      $conexion=null;
      ?>
    </select>

    <p>Fecha desde:</p>
    <input type='date' name='desde' placeholder='Fecha desde'>
    <p>Fecha hasta:</p>
    <input type='date' name='hasta' placeholder='Fecha hasta'>

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
    $nif=$_POST['nif'];
    $desde=$_POST['desde'];
    $hasta=$_POST['hasta'];
echo "$desde";

  //FUNCIONES
  revisarparametros($nif,$desde,$hasta);
  mostrarcompras($nif,$desde,$hasta,$conexion);

  //CERRAMOS CONEXION
  $conexion=null;
}
?>
