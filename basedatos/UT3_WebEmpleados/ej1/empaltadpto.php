<?php
//INTRODUCIMOS LAS FUNCIONES
include "funciones.php";

//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="empleadosnn";
$conexion=crearconexion($servername, $username, $password, $dbname);

//AÑADIMOS PARAMETROS
$nombredept=$_POST['nombredept'];

//FUNCIONES
revisarparametros($nombredept);
creardepartamento($nombredept,$conexion);
                    // mostrardepartamentos($conexion);

//CERRAMOS CONEXION
$conexion=null;

?>
