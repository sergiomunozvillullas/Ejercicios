<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <p>NIF:</p>
         <input type='text' name='nif' placeholder='NIF'>
         <p>Nombre:</p>
          <input type='text' name='nombre' placeholder='Nombre de un cliente'>
          <p>apellido:</p>
           <input type='text' name='apellido' placeholder='Apellido de un cliente'>
           <p>Codigo Postal:</p>
            <input type='text' name='cp' placeholder='Codigo Postal'>
            <p>Direccion:</p>
             <input type='text' name='direccion' placeholder='Direccion'>
             <p>Ciudad:</p>
              <input type='text' name='ciudad' placeholder='Ciudad'>
       <br><br>
       <input type="submit" value="Enviar"  name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>



<?php
if (isset($_POST['enviar'])) {
//INTRODUCIMOS LAS FUNCIONES
require "funciones.php";

//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);

//AÑADIMOS PARAMETROS
$nif=$_POST['nif'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$cp=$_POST['cp'];
$direccion=$_POST['direccion'];
$ciudad=$_POST['ciudad'];

//FUNCIONES
revisarparametros($nif,$nombre,$apellido,$cp,$direccion,$ciudad);
$nifvalidado=validarnif($nif);
if (empty($nifvalidado)) {
  echo "<br> NIF incorrecto";
}else {
altacliente($nifvalidado,$nombre,$apellido,$cp,$direccion,$ciudad,$conexion);
}


//CERRAMOS CONEXION
$conexion=null;
}
?>
