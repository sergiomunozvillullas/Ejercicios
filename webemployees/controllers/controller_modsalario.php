<?php
//models
  require_once("../db/db.php");
  require_once ("../models/models.php");
  session_start();
  //ABRIMOS CONEXIÓN CON LA BASE DE DATOS
  $conn = abrirConexion();
  //INICIAMOS LA SESIÓN


  if(isset($_SESSION["usuario"])){

require_once("../views/view_modsalario.php");

if (isset($_POST['Modificar'])) { //Si se pulsa el botón de comprar:

  // $dni=dniCliente($_SESSION['usuario'],$conn);
  //  $saldo=saldoCliente($_SESSION['usuario'],$conn); //.
    $fecha=fechaHora(); //.
    $empleado = test_input($_POST['empleado']);
        $salario = test_input($_POST['salario']);
  //   $precio=precioPatin($matricula,$conn); //.
  //   $fecha_alquiler=fechaAlquiler($matricula,$dni,$conn);

       $conn = abrirConexion();
       modificarSalario($empleado,$fecha,$salario,$conn);



 }
 if (isset($_POST['volver'])) { //Si se pulsa el botón de comprar:

          header("location:../controllers/controller_einicio.php");
 }
 ?>

<?php
      } else{
          header("location:../index.php");
      }

?>
