<?php
    session_start();
    require_once ("funciones/funciones.php");
    //ABRIMOS CONEXIÓN CON LA BASE DE DATOS
    $conn = abrirConexion();
    //INICIAMOS LA SESIÓN


    if(isset($_SESSION["usuario"])){
    echo   $_SESSION['usuario'] ." ".$_SESSION['contraseña']."<br>";
?>
﻿<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a EPATIN</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>

  <body>
    <h1>Servicio de ALQUILER PATINETES ELÉCTRICOS</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - APARCAR PATINETE </div>
		<div class="card-body">



	<!-- INICIO DEL FORMULARIO -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <B>Bienvenido/a:</B> <?php echo nombreCliente($_SESSION['usuario'],$conn);?>   <BR><BR>
		<B>Saldo Cuenta:</B> <?php echo saldoCliente($_SESSION['usuario'],$conn);?>   <BR><BR>

			<B>PATINETES ALQUILADOS: </B><select name="patinetes" class="form-control">
        <?php
        //CREAMOS CONEXION
      $conexion = abrirConexion();
      $dni=dniCliente($_SESSION['usuario'],$conexion);

        //CREAMOS EL DESPLEGABLE
        //SELECT
        $stmt = $conexion->prepare("SELECT matricula FROM ealquileres where dni='$dni' AND fecha_devolucion IS NULL");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $row) {
          //OPTIONS
          ?>
          <option value="<?php echo $row['matricula']; ?>"> <?php echo $row['matricula']; ?> </option>';

          <?php
        }
        //CERRAMOS CONEXION
        $conexion=null;
        ?>
			</select>
		<BR><BR>
		<div>
			<input type="submit" value="Aparcar Patinete" name="devolver" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>
	</form>
  <?php
  if (isset($_POST['devolver'])) { //Si se pulsa el botón de comprar:

    $dni=dniCliente($_SESSION['usuario'],$conn);
     $saldo=saldoCliente($_SESSION['usuario'],$conn); //.
      $fechaHora=fechaHora(); //.
      $matricula = test_input($_POST['patinetes']);
      $precio=precioPatin($matricula,$conn); //.
      $fecha_alquiler=fechaAlquiler($matricula,$dni,$conn);

         $conn = abrirConexion();
         aparcarPatin($fechaHora,$precio,$dni,$conn,$matricula,$fecha_alquiler);
         $carroCompra = array();
         $_SESSION['CARROCOMPRA'] = $carroCompra;
         header("location:eaparcar.php");
   }
   if (isset($_POST['volver'])) { //Si se pulsa el botón de comprar:

            header("location:einicio.php");
   }
   ?>
	<!-- FIN DEL FORMULARIO -->
	<a href = "elogin.php">Cerrar Sesion</a>
  <?php
        } else{
            header("location:elogin.php");
        }

  ?>
  </body>

</html>
