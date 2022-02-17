<?php
//models
  require_once("../db1/db.php");
  require_once ("../models1/models.php");
       session_start();
       session_unset();
       session_destroy();

  $conexion = abrirConexion();
  if($_POST){ //Cuando se completan los datos, se viene aquí.
      $usuario= test_input($_POST['email']);
      $password= test_input($_POST['password']);
      //Consulta: ¿Hay algún cliente con el usuario y la contraseña introducidas? Si es que sí, entonces entra en el if, si no dice que son incorrectos.
      $query=$conexion->prepare("SELECT email, dni FROM eclientes WHERE email= :usuario AND dni = :password and fecha_alta is NOT NULL and fecha_baja is NULL");

    //  customerNumber=USUARIO    -----   contactLastName=CONTRASEÑA

      $query->bindParam(":usuario", $usuario); //Esto es simplemente una asociación de variables. Hasta que no se ejecuta, no se hace.
      $query->bindParam(":password", $password); //Se asocia el password introducido por el usuario a :password.
      $query->execute();
      $usuarioLogin=$query->fetch(PDO::FETCH_ASSOC); //Crea un array indexado: $usuarioLogin[customerNumber] = daría el usuario solicitado en la consulta.

      if ($usuarioLogin){
          session_start();
          $_SESSION['usuario'] = $usuarioLogin["email"];
          $_SESSION['contraseña'] = $usuarioLogin["dni"];
require_once("../views1/view_logincorrecto.php");

      }else{
        require_once("../views1/view_loginincorrecto.php");

          // echo "Usuario o password incorrecto";
      }
  }
 ?>
