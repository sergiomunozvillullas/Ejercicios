<?php
//models
  require_once("../db1/db.php");
  require_once ("../models1/models.php");
      session_start();
      $conexion = abrirConexion(); //Se establece la conexión.
      //1.- Se mira si hay o no una sesión abierta.
      if (!isset($_SESSION["usuario"])) {//Si no hay sesión iniciada no nos permite acceder la programa y nos saca un mensaje de error
        //Cerrar sesion
        session_unset();
        session_destroy();
        //Mensaje
        header("location:../index.php");
      }
      // Si el carrito no ha sido inicializando, lo creamos
      if (!isset($_SESSION['CARROCOMPRA'])) {
          $_SESSION['CARROCOMPRA'] = array();
          $carroCompra = $_SESSION['CARROCOMPRA']; //el contenido del array de carroCompra se pasa a la variable $carroCompra sobre la que se va a trabajar.
      } else {$carroCompra = $_SESSION['CARROCOMPRA'];
      }

      require_once("../views1/view_ealquiler.php");


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

                                header("location:../controllers1/controller_einicio.php");
                       }
           }//post




  ?>
