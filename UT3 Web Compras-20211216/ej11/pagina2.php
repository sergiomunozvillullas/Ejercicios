<?php
session_start();
//FUNCIONES
require "funciones.php";

//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);
?>
<html>
<head>
<title>Pagina 2</title>
</head>
<body>
<?php
if(isset($_POST['nombre']) && isset($_POST['contra'])){


  //AÑADIMOS PARAMETROS
  $nombre=$_POST['nombre'];
  $contra=$_POST['contra'];


  //FUNCIONES
  revisarparametros($nombre,$contra);

//COMPROBAMOS LA CONEXION
$nif=contra($nombre,$contra,$conexion);

if ($nif!="" ) {
  $_SESSION['nombre'] = $_POST['nombre'];
  $_SESSION['contra'] = $_POST['contra'];
  echo "Has iniciado sesion: " . $_POST['nombre'] . "<br>";
  echo "Contraseña: " . $_POST['contra'] . "<br>";
  echo "Tu NIF es: ".$nif. "<br>";
  echo "<p><a href='pagina3.php'>Cerrar Sesion</a></p>";

}


}else{
  if(isset($_SESSION['nombre']) && isset($_SESSION['contra'])){
    //AÑADIMOS PARAMETROS

    $nombre = $_SESSION['nombre'];
    $contra = $_SESSION['contra'];

  echo "<br> Has iniciado sesion con: " . $_SESSION['nombre'] . "<br>";
  echo "Contraseña: " . $_SESSION['contra'] . "<br>";

  $nif=contra($nombre,$contra,$conexion);
  echo "Tu NIF es: ".$nif. "<br>";
  echo "<p><a href='pagina3.php'>Cerrar Sesion</a></p>";

}else{
echo "Acceso Restringido debes hacer Login con tu usuario";
}
}



?>
<br /><br /><a href="comlogincli.php">Volver a pagina Login</a>
</body>
</html>
