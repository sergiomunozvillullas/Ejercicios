<?php
//models
  require_once("../db/db.php");
  require_once ("../models/models.php");
       session_start();
       session_unset();
       session_destroy();

  $conexion = abrirConexion();
  if($_POST){ //Cuando se completan los datos, se viene aquí.
      $usuario= test_input($_POST['username']);
      $password= test_input($_POST['lastname']);
      //Consulta: ¿Hay algún cliente con el usuario y la contraseña introducidas? Si es que sí, entonces entra en el if, si no dice que son incorrectos.
      $query=$conexion->prepare("SELECT first_name, last_name FROM employees WHERE first_name= :usuario AND last_name = :password");

    //  customerNumber=USUARIO    -----   contactLastName=CONTRASEÑA

      $query->bindParam(":usuario", $usuario); //Esto es simplemente una asociación de variables. Hasta que no se ejecuta, no se hace.
      $query->bindParam(":password", $password); //Se asocia el password introducido por el usuario a :password.
      $query->execute();
      $usuarioLogin=$query->fetch(PDO::FETCH_ASSOC); //Crea un array indexado: $usuarioLogin[customerNumber] = daría el usuario solicitado en la consulta.

      if ($usuarioLogin){
          session_start();
          $_SESSION['usuario'] = $usuarioLogin["first_name"];
          $_SESSION['contraseña'] = $usuarioLogin["last_name"];

require_once("../views/view_logincorrecto.php");

      }else{
        header("location:../index.php");


          // echo "Usuario o password incorrecto";
      }
  }
 ?>
