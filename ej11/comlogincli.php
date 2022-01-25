<?php
session_start();
session_unset();
session_destroy();
?>
<html>
<head>
	<title>Pagina Login</title>
</head>
<body>
		<form action="pagina2.php" method="POST">
			<h1> Login </h1>
			<p>Usuario:<input type="text" placeholder="Introduce usuario" name="nombre" required/></p>
			<p>Contraseña:<input type="text" placeholder="Introduce la contraseña" name="contra" required/></p><br />
			<input type="submit" value="Login" />
		</form>

</body>
</html>
