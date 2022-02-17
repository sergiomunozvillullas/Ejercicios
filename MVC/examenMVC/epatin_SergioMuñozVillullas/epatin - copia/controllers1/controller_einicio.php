<?php
//models
  require_once("../db1/db.php");
  require_once ("../models1/models.php");
  session_start();
  //controller
      $conn = abrirConexion();
      //controller


      if(isset($_SESSION["usuario"])){
        $_SESSION['nombre']=nombreCliente($_SESSION['usuario'],$conn);
        $_SESSION['saldo']=saldoCliente($_SESSION['usuario'],$conn);
        require_once("../views1/view_einicio.php");

      } else{
          header("location:../index.php");
      }

 ?>
