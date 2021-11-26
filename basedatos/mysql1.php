<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname="empleados1n";

// Creamos conexion
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Se comprueba conexión
if (!$conn) {
    die("Fallo en la conexion: " . mysqli_connect_error());
}
echo "Conexion Correcta!!!";
?>