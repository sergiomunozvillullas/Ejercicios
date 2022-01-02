<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <title>Empresa</title>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


    <p>Producto:</p>
    <select name="producto">
      <?php require 'funciones.php';
      //CREAMOS CONEXION
      $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
      $conexion=crearconexion($servername, $username, $password, $dbname);

      //CREAMOS EL DESPLEGABLE
      //FUNCTION
      $arraynombreprod=arraynombreprod($conexion);
      //OPTIONS
      foreach ($arraynombreprod as $key) {
        ?> <option> <?php echo $key;?> </option>
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
    $producto=$_POST['producto'];


  //FUNCIONES
  revisarparametros($producto);
  mostrarprod($producto,$conexion);

  //CERRAMOS CONEXION
  $conexion=null;
}
?>
