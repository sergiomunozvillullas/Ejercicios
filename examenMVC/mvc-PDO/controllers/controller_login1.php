<?php
echo "Inicio controller"."<br>";
//Llamada al modelo -- Intermediario entre vista y modelo !!!
require_once("models/funciones.php");

// $email=$_POST['email'];
// $password=$_POST['password'];
// $idcliente=validar($email,$password,$conexion);
$devuelve=prueba();
//Llamada a la vista -- Intermediario entre vista y modelo !!!
require_once("views/views_login.phtml");
echo "Fin controller"."<br>";
?>
