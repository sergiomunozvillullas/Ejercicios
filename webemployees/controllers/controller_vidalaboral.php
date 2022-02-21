<?php
//models
  require_once("../db/db.php");
  require_once ("../models/models.php");
  session_start();
  //ABRIMOS CONEXIÓN CON LA BASE DE DATOS
  $conn = abrirConexion();
  //INICIAMOS LA SESIÓN


  if(isset($_SESSION["usuario"])){

require_once("../views/view_vidalaboral.php");

if (isset($_POST['ver'])) { //Si se pulsa el botón de comprar:



    $empleado = test_input($_POST['empleado']);
       $conn = abrirConexion();
       $ver=explode(" ",$empleado);
echo "<br> emp_no:".$ver[0]."<br> birth_date:".$ver[1]."<br> first_name:".$ver[2]."<br> last_name:".$ver[3]."<br> gender:".$ver[4]."<br> hire_date:".$ver[5];


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
