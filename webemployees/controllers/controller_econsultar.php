<?php
//models
  require_once("../db1/db.php");
  require_once ("../models1/models.php");
  session_start();
  $conn = abrirConexion();
  //INICIAMOS LA SESIÓN


  if(isset($_SESSION["usuario"])){


  require_once("../views1/view_econsultar.php");


   if (isset($_POST['Consultar'])) { //Si se pulsa el botón de comprar:
         $conn = abrirConexion();
         $dni=dniCliente($_SESSION['usuario'],$conn);

                        $fechadesde = test_input($_POST['fechadesde']);
                        $fechahasta = test_input($_POST['fechahasta']);

consultaPatin($fechadesde,$fechahasta,$dni,$conn);
   }

   if (isset($_POST['Volver'])) { //Si se pulsa el botón de comprar:
            header("location:../controllers1/controller_einicio.php");
   }

          } else{
              header("location:../index.php");
          }
