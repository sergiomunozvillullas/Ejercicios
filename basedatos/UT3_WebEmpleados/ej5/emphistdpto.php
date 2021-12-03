<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <title>Empresa</title>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>NOMBRE DPTO</h1>
    <p>Departamento:</p>
    <select name="nombredept">
      <?php require 'funciones.php';
      //CREAMOS CONEXION
      $servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnn";
      $conexion=crearconexion($servername, $username, $password, $dbname);

      //CREAMOS EL DESPLEGABLE
      //FUNCTION
      $arraydep=arraydepartamentos($conexion);
      //OPTIONS
      foreach ($arraydep as $key) {
        ?> <option> <?php echo $key ?> </option>
        <?php
      }
      //CERRAMOS CONEXION
      $conexion=null;
      ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Enviar" name="enviar">
    <input type="reset" value="Borrar">
  </form>
</body>
</html>

<?php
if (isset($_POST['enviar'])) {
  //CREAMOS CONEXION
  echo "Creamos la conexion: ";
  $servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnn";
  $conexion=crearconexion($servername, $username, $password, $dbname);

  //PARAMETROS
  $nombredept=$_POST['nombredept'];

  // //FUNCIONES
  revisarparametros($nombredept);
mostrarhistorico($nombredept,$conexion);

      // creardepartamento($nombredept,$conexion);
      //mostrardepartamentos($conexion);
      // mostrartablas($conexion);
      // mostrarempleados($conexion);


  //CERRAMOS CONEXION
  $conexion=null;
}
?>


<!-- select nombre from 3 tablas where empleado.dni, dep.dni and departamaneto.cod_deprat. empledepart.cod_depart and departamento.nombre_dep=marketing -->
