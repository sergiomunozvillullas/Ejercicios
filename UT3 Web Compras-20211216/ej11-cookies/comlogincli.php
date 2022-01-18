<?php

$cookie_name = "usuario";
$cookie_value = "";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 segundos = 1 día
?>

<html>
<head>
	<title>Pagina Login Cookie</title>
</head>
<body>
	<?php
	if(!isset($_COOKIE[$cookie_name])) {
		?>
		<form action="pagina2.php" method="POST">
			<h1> Login </h1>
			<p>Usuario:<input type="text" placeholder="Introduce usuario" name="nombre" required/></p>
			<p>Contraseña:<input type="text" placeholder="Introduce la contraseña" name="contra" required/></p><br />
			<input type="submit" value="Login" />
		</form>
		<?php

	}
	else {
		if(isset($_POST['nombre']) && isset($_POST['contra'])){


	    //AÑADIMOS PARAMETROS
	    $nombre=$_POST['nombre'];
	    $contra=$_POST['contra'];

		}
	echo "Cookie " . $cookie_name . " definida!!!<br>";
	echo "Nombre de la cookie: " . $_COOKIE[$cookie_name];
					echo "<p><a href='pagina3.php'>Cerrar Sesion</a></p>";

	}
	?>
</body>
</html>
