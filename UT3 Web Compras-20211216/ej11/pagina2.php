<?php
session_start();
//FUNCIONES
require "funciones.php";

//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);
if(isset($_POST['nombre']) && isset($_POST['contra'])){


  //AÑADIMOS PARAMETROS
  $nombre=$_POST['nombre'];
  $contra=$_POST['contra'];


  //FUNCIONES
  revisarparametros($nombre,$contra);

  //COMPROBAMOS LA CONEXION
  $nif=contra($nombre,$contra,$conexion);

  if ($nif!="00000000X" ) {
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['contra'] = $_POST['contra'];
    echo "Has iniciado sesion: " . $_POST['nombre'] . "<br>";
    echo "Contraseña: " . $_POST['contra'] . "<br>";
    echo "Tu NIF es: ".$nif. "<br>";
    echo "<p><a href='../indice.html'>Portal de compras</a></p>";
    echo "<p><a href='comlogincli.php'>Cerrar Sesion</a></p>";

  }else{
    echo "<br>Acceso Restringido debes hacer Login con tu usuario";
    echo "<p><a href='comlogincli.php'>Iniciar Sesion</a></p>";

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
    echo "<p><a href='../indice.html'>Portal de compras</a></p>";
    echo "<p><a href='comlogincli.php'>Cerrar Sesion</a></p>";

  }else{
    echo "<br>Acceso Restringido debes hacer Login con tu usuario";
    echo "<p><a href='comlogincli.php'>Iniciar Sesion</a></p>";

  }
}

?>
