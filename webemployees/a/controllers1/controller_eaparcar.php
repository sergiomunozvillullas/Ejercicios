<?php
//models
  require_once("../db1/db.php");
  require_once ("../models1/models.php");
  session_start();
  //ABRIMOS CONEXIÓN CON LA BASE DE DATOS
  $conn = abrirConexion();
  //INICIAMOS LA SESIÓN


  if(isset($_SESSION["usuario"])){

require_once("../views1/view_eaparcar.php");

if (isset($_POST['devolver'])) { //Si se pulsa el botón de comprar:

  $dni=dniCliente($_SESSION['usuario'],$conn);
   $saldo=saldoCliente($_SESSION['usuario'],$conn); //.
    $fechaHora=fechaHora(); //.
    $matricula = test_input($_POST['patinetes']);
    $precio=precioPatin($matricula,$conn); //.
    $fecha_alquiler=fechaAlquiler($matricula,$dni,$conn);

       $conn = abrirConexion();
       if (aparcarPatin($fechaHora,$precio,$dni,$conn,$matricula,$fecha_alquiler)=="Patín devuelto, pago realizado") {
         $carroCompra = array();
         $_SESSION['CARROCOMPRA'] = $carroCompra;
        header("location:controller_eaparcar.php");
      }



 }
 if (isset($_POST['volver'])) { //Si se pulsa el botón de comprar:

          header("location:../controllers1/controller_einicio.php");
 }
 ?>

<?php
      } else{
          header("location:../index.php");
      }

?>
