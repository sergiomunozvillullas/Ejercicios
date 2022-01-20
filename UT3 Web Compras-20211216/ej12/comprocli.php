
<html>
<head>
	<title>Pagina Login Cookie</title>
</head>
<body>
		<form action="pagina2.php" method="POST">
			<h1> Compra productos </h1>

			<p>Producto:</p>
			<select name="producto">
				<?php require 'funciones.php';
				//CREAMOS CONEXION
				$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
				$conexion=crearconexion($servername, $username, $password, $dbname);

				//CREAMOS EL DESPLEGABLE
				//SELECT
				$stmt = $conexion->prepare("SELECT almacena.id_producto,nombre,num_almacen FROM producto,almacena where almacena.id_producto=producto.id_producto");
				$stmt->execute();
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
				foreach($stmt->fetchAll() as $row) {
					//OPTIONS
					?>
					<option value="<?php echo $row['id_producto']."/".$row['num_almacen']; ?>"> <?php echo $row['nombre']; ?> </option>';

					<?php
				}
				//CERRAMOS CONEXION
				$conexion=null;
				?>
			</select>

			<p>Productos a comprar:</p><input type="text" placeholder="Cantidad" name="cantidad" required/><br /><br />
			<input type="submit" value="Confirmar" name="enviar" />
		</form>
</body>
</html>
