<?php
session_start();
?>
<html>
<head>
<title>Pagina Login</title>
</head>
<body>
<?php
if(isset($_SESSION['nombre']) && isset($_SESSION['contra'])){
echo "<p>Has iniciado sesion: " . $_SESSION['nombre'] . "";
echo "<p>Contraseña: " . $_SESSION['contra'] . "";
echo "<p><a href='pagina3.php'>Cerrar Sesion</a></p>";
}
else {
?>
<form action="pagina2.php" method="POST">
<h1> Login </h1>
<p>Usuario:<input type="text" placeholder="Introduce usuario" name="nombre" required/></p>
<p>Contraseña:<input type="text" placeholder="Introduce la contraseña" name="contra" required/></p><br />
<input type="submit" value="Login" />
</form>
<?php
	}
?>
</body>
</html>
