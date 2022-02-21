<?php
//models
  require_once("../db/db.php");
  require_once ("../models/models.php");
  session_start();
  //controller
      $conn = abrirConexion();
      //controller


      if(isset($_SESSION["usuario"])){
        $_SESSION['numcliente']=numeroCliente($_SESSION['usuario'],$_SESSION['contraseña'],$conn);
        if (RecursosHumanos($_SESSION['numcliente'],$conn)=="d003") {
          require_once("../views/view_einicio.php");
              }else {
          require_once("../views/view_norecursos.php");
        }


      } else{
          header("location:../index.php");
      }

 ?>
