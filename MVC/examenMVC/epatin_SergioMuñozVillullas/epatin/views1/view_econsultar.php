<html>

 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a MovilMAD</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>

 <body>
    <h1>Servicio de ALQUILER PATINETES ELÉCTRICOS</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - CONSULTA ALQUILERES </div>
		<div class="card-body">




	<!-- INICIO DEL FORMULARIO -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <B>Bienvenido/a:</B> <?php echo $_SESSION['nombre']?>   <BR><BR>
		<B>Saldo Cuenta:</B> <?php echo $_SESSION['saldo'];?>   <BR><BR>

			 Fecha Desde: <input type='date' name='fechadesde' value='' size=10 placeholder="fechadesde" class="form-control">
			 Fecha Hasta: <input type='date' name='fechahasta' value='' size=10 placeholder="fechahasta" class="form-control"><br><br>

		<div>
			<input type="submit" value="Consultar" name="Consultar" class="btn btn-warning disabled">

			<input type="submit" value="Volver" name="Volver" class="btn btn-warning disabled">

		</div>
	</form>

  </body>

</html>
