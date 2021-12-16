<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <p>Localidad:</p>
         <input type='text' name='localidad' placeholder='Nombre de una localidad'>

<br><br>
       <input type="submit" value="Enviar"  name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>



<?php
 require 'funciones.php';
if (isset($_POST['enviar'])) {
//INTRODUCIMOS LAS FUNCIONES

//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);

//AÑADIMOS PARAMETROS
$localidad=$_POST['localidad'];


//FUNCIONES
revisarparametros($localidad);
altaalmacen($localidad,$conexion);

//CERRAMOS CONEXION
$conexion=null;
}
?>
