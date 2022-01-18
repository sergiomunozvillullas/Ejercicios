<?php
$cookie_name = "usuario";
$cookie_value = "";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 segundos = 1 día
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
      echo "Has iniciado sesion: " . $_POST['nombre'] . "<br>";
      echo "Contraseña: " . $_POST['contra'] . "<br>";
      echo "Tu NIF es: ".$nif. "<br>";
      echo "<p><a href='../indice.html'>Portal de compras</a></p>";
      echo "<p><a href='pagina3.php'>Cerrar Sesion</a></p>";
      $cookie_value = "$nombre";
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 segundos = 1 día
    }


    else{
      echo "Acceso Restringido debes hacer Login con tu usuario";
    }

  }


  ?>
  <br /><br /><a href="comlogincli.php">Volver a pagina Login</a>
</body>
</html>
