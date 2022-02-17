<?php
    session_start();
    require_once ("funciones/funciones.php");
    $conexion = abrirConexion(); //Se establece la conexión.
    //1.- Se mira si hay o no una sesión abierta.
    if (!isset($_SESSION["usuario"])) {//Si no hay sesión iniciada no nos permite acceder la programa y nos saca un mensaje de error
      //Cerrar sesion
      session_unset();
      session_destroy();
      //Mensaje
      header("location:../pe_login.php");
    } else {
        echo "Bienvenido/a <b>".nombreCliente($_SESSION['usuario'],$conexion)."</b><br><br>";
    }
    // Si el carrito no ha sido inicializando, lo creamos
    if (!isset($_SESSION['CARROCOMPRA'])) {
        $_SESSION['CARROCOMPRA'] = array();
        $carroCompra = $_SESSION['CARROCOMPRA']; //el contenido del array de carroCompra se pasa a la variable $carroCompra sobre la que se va a trabajar.
    } else {$carroCompra = $_SESSION['CARROCOMPRA'];}
?>

<html>

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
		<div class="card-header">Menú Usuario - ALQUILAR PATINETES</div>
		<div class="card-body">


	<!-- INICIO DEL FORMULARIO -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <B>Bienvenido/a:</B> <?php echo $_SESSION['nombre']?>   <BR><BR>
		<B>Saldo Cuenta:</B> <?php echo $_SESSION['saldo'];?>   <BR><BR>

		<B>PATINETES disponibles</B> <?php echo fechaHora();?> <BR>

			<select name="patinetes" class="form-control">
          <?php
          //CREAMOS CONEXION
      $conexion = abrirConexion();

          //CREAMOS EL DESPLEGABLE
          //SELECT
          $stmt = $conexion->prepare("SELECT matricula FROM epatines where disponible='S'");
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


		<BR> <BR><BR><BR><BR><BR>
		<div>
			<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="alquilar" class="btn btn-warning disabled">
			<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
      			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>
	</form>
	<!-- FIN DEL FORMULARIO -->

  <?php
   if($_POST){
      $conexion = abrirConexion();
       //recogida y limpieza de valores introducidos por el usuario.

                   $matriculapatin = test_input($_POST['patinetes']);
       //Ahora hay que establecer las funciones para cada uno de los botones:
       if (isset($_POST['agregar'])) {
 $carroCompra=$_SESSION['CARROCOMPRA'];
       if (in_array($matriculapatin, $carroCompra)) {
                          echo "El artículo ya está en la cesta";

                   }//fin if
                       else {//Si el producto está en el carro de la compra, se avisa al usuario.
                         array_push($carroCompra,$matriculapatin);
                           echo "Patinete añadido correctamente";

                      //     var_dump($carroCompra); //variable de control por pantalla.
                         }



           $_SESSION['CARROCOMPRA'] = $carroCompra; //una vez que se ha añadido al array $carroCompra los productos, pasamos esos datos al array sesión para que se quede ahí guardado.
       }// fin if agregar

       if (isset($_POST['vaciar'])) {//Si se pulsa el botón vaciar. Se vuelve a los orígenes.
               $carroCompra = array();
               $_SESSION['CARROCOMPRA'] = $carroCompra;

       } //fin if vaciar



       if (isset($_POST['alquilar'])) { //Si se pulsa el botón de comprar:
              $dni=dniCliente($_SESSION['usuario'],$conexion);
               $saldo=saldoCliente($_SESSION['usuario'],$conexion);
                $fechaHora=fechaHora();
$_SESSION['CARROCOMPRA'] = $carroCompra;
foreach ($carroCompra as $key ) {
$matricula=$key;



                $precio=precioPatin($matricula,$conexion);


               if (empty($carroCompra) || $saldo<10 ) {
                        echo "No es posible realizar la compra";
                   } else {

                       alquilerPatin($dni,$matricula,$fechaHora,$precio,$conexion);
                       echo "<br>";
                       echo "Compra correcta";

                       }

}

                       //Una vez se haga la compra, se debería reiniciar el carrito.
                       $_SESSION['CARROCOMPRA'] = array();
                       $carroCompra = $_SESSION['CARROCOMPRA'];

                     //--------------
                   }//alquilar
                   if (isset($_POST['volver'])) { //Si se pulsa el botón de comprar:

                            header("location:einicio.php");
                   }
       }//post



  ?>
  </body>

</html>
