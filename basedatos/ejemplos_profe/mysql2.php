<?php
/*Inserción en tabla - MySQLi procedural*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleados1n";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO departamento (nombre_d) VALUES ('FINANZAS')";

if (mysqli_query($conn, $sql)) {
    echo "Se ha creado un nuevo departamento";
} else {
    echo "Error al crear departamento: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

