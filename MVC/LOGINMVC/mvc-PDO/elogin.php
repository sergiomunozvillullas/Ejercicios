<?php
  require_once ("funciones/funciones.php");
       session_start();
       session_unset();
       session_destroy();

  $conexion = abrirConexion();
  if($_POST){ //Cuando se completan los datos, se viene aquí.
      $usuario= test_input($_POST['email']);
      $password= test_input($_POST['password']);
      //Consulta: ¿Hay algún cliente con el usuario y la contraseña introducidas? Si es que sí, entonces entra en el if, si no dice que son incorrectos.
      $query=$conexion->prepare("SELECT email, last_name FROM customer WHERE email= :usuario AND last_name = :password");

    //  customerNumber=USUARIO    -----   contactLastName=CONTRASEÑA

      $query->bindParam(":usuario", $usuario); //Esto es simplemente una asociación de variables. Hasta que no se ejecuta, no se hace.
      $query->bindParam(":password", $password); //Se asocia el password introducido por el usuario a :password.
      $query->execute();
      $usuarioLogin=$query->fetch(PDO::FETCH_ASSOC); //Crea un array indexado: $usuarioLogin[customerNumber] = daría el usuario solicitado en la consulta.

      if ($usuarioLogin){
          session_start();
          $_SESSION['usuario'] = $usuarioLogin["email"];
          $_SESSION['contraseña'] = $usuarioLogin["last_name"];
          header("location:einicio.php"); //La función header() se puede utilizar para redirigir automáticamente a otra página, enviando como argumento la cadena Location:

      }else{
          echo "Usuario o password incorrecto";
      }
  }
 ?>
<html>

 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page - EPATIN</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>

<body>
    <h1>ALQUILER PATINETES ELÉCTRICOS</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Login Usuario</div>
		<div class="card-body">

		<form id="" name="" action="" method="post" class="card-body">

		<div class="form-group">
			Email <input type="text" name="email" placeholder="email" class="form-control">
        </div>
		<div class="form-group">
			Clave <input type="password" name="password" placeholder="password" class="form-control">
        </div>

		<input type="submit" name="submit" value="Login" class="btn btn-warning disabled">
        </form>

	    </div>
    </div>
    </div>
    </div>

</body>
</html>
