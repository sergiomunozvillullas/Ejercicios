<html>

 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a EPATIN</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
 </head>

 <body>
    <h1>Servicio de ALQUILER PATINETES ELÉCTRICOS</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">


		<B>Bienvenido/a:</B> <?php echo  $_SESSION['nombre'] ?>   <BR><BR>
		<B>Saldo Cuenta:</B> <?php echo $_SESSION['saldo'] ?>   <BR><BR>

		<!--Formulario con enlaces -->
		<ul>
			<li><a href="../controllers1/controller_ealquilar.php">Alquilar Patin</a></li>
			<li><a href="../controllers1/controller_econsultar.php">Consultar Alquileres</a></li>
			<li><a href="../controllers1/controller_eaparcar.php">Aparcar Patin</a></li>
		</ul>



		  <BR><a href="../index.php">Cerrar Sesión</a>
	</div>
   </body>

</html>
