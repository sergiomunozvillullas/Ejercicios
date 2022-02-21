<?php
function abrirConexion() {//Devolvemos la conexión con el servidor si ha sido posible realizarla si no mostramos un mensaje
// $servername = "localhost";
// $username = "id18363069_pedidosroot";
// $password = "LeonardoDaVinci123$";
// $dbname = "id18363069_pedidos";

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "employees";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
{
	echo "Error: " . $e->getMessage();
}

return $conn;
}//de function
?>
