<?php

    require_once ("db1/db.php");
    require_once ("models1/models.php");

//controller
    // $conn = abrirConexion();
    //INICIAMOS LA SESIÓN


    if(isset($_SESSION["usuario"])){
    // echo   $_SESSION['usuario'] ." ".$_SESSION['contraseña']."<br>";

    //controller
    // $_SESSION['nombre']=nombreCliente($_SESSION['usuario'],$conn);
    // $_SESSION['saldo']=saldoCliente($_SESSION['usuario'],$conn);

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
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">


		<B>Bienvenido/a:</B> <?php echo  $_SESSION['nombre'] ?>   <BR><BR>
		<B>Saldo Cuenta:</B> <?php echo $_SESSION['saldo'] ?>   <BR><BR>

		<!--Formulario con enlaces -->
		<ul>
			<li><a href="ealquilar.php">Alquilar Patin</a></li>
			<li><a href="econsultar.php">Consultar Alquileres</a></li>
			<li><a href="eaparcar.php">Aparcar Patin</a></li>
		</ul>



		  <BR><a href="../index.php">Cerrar Sesión</a>
	</div>


  <?php
        } else{
            header("location:../index.php");
        }

  ?>
   </body>

</html>
