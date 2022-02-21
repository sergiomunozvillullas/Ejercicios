<?php
//models
  require_once("../db/db.php");
  require_once ("../models/models.php");
  session_start();
  //ABRIMOS CONEXIÓN CON LA BASE DE DATOS
  $conn = abrirConexion();
  //INICIAMOS LA SESIÓN


  if(isset($_SESSION["usuario"])){

require_once("../views/view_infodep.php");

if (isset($_POST['ver'])) { //Si se pulsa el botón de comprar:



    $departamento = test_input($_POST['departamento']);
       $conn = abrirConexion();
       $ver=explode(" ",$departamento);
echo "<br> dept_no:".$ver[0]."<br> dept_name:".$ver[1];


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
