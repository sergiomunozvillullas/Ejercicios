<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <title>Empresa</title>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>PORCENTAJE</h1>
    <p>Nombre empleado:</p>
    <select name="nombreemp">
      <?php require 'funciones.php';
      //CREAMOS CONEXION
      $servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnn";
      $conexion=crearconexion($servername, $username, $password, $dbname);

      //CREAMOS EL DESPLEGABLE
      //FUNCTION
      $arrayemp=arrayempleados($conexion);
      //OPTIONS
      foreach ($arrayemp as $key) {
        ?> <option> <?php echo $key ?> </option>
        <?php
      }
      //CERRAMOS CONEXION
      $conexion=null;
      ?>
    </select>
    <p>Porcentaje a cambiar:</p>
<input type='text' name='porcentaje' placeholder='Rellene con el porcentaje'>
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
  $nombreemp=$_POST['nombreemp'];
    $porcentaje=$_POST['porcentaje'];

    $porc= explode("%", $porcentaje);
  $porcen= floatval($porc[0]);
  $porcentaje=$porcen/100;

  // //FUNCIONES
  revisarparametros($nombreemp,$porcentaje);
incremento($nombreemp,$porcentaje,$conexion);

      // creardepartamento($nombredept,$conexion);
      //mostrardepartamentos($conexion);
      // mostrartablas($conexion);
      // mostrarempleados($conexion);


  //CERRAMOS CONEXION
  $conexion=null;
}
?>


<!-- select nombre from 3 tablas where empleado.dni, dep.dni and departamaneto.cod_deprat. empledepart.cod_depart and departamento.nombre_dep=marketing -->
