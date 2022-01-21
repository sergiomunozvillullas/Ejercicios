<?php

if (isset($_POST['enviar'])) {

//INTRODUCIMOS LAS FUNCIONES
require "funciones.php";
//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);

//AÑADIMOS PARAMETROS
$producto=$_POST['producto'];
$cantidad=$_POST['cantidad'];

//COOKIE Y PARAMETROS COOKIE
$cookie= "$_COOKIE[usuario]";
  $nombrecontra= explode(" ",$cookie);
  $nombre=$nombrecontra[0];
  $contra=$nombrecontra[1];

//FUNCIONES
revisarparametros($producto,$cantidad);
$nif=contra($nombre,$contra,$conexion);
compra($nif,$producto,$cantidad,$conexion);

//EJECUCIÓN
$cesta="cesta";
$carrito=array();

setcookie($cesta, json_encode($carrito), time()+3600);
$data = json_decode($_COOKIE[$cesta], true);
array_push($carrito,$data);
array_push($carrito,$cantidad);
setcookie($cesta, json_encode($carrito), time()+3600);
$data = json_decode($_COOKIE[$cesta], true);
for ($i=0; $i <sizeof($data) ; $i++) {
echo "$data[$i]";
}


echo "<br /><a href='comprocli.php'>Volver a comprar</a>";
//CERRAMOS CONEXION
$conexion=null;
}
 ?>
