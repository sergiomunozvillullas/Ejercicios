<?php

 include("config.php");
   
 if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      //Se recuperan del formulario el usuario y la clave del cliente
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT nif FROM cliente WHERE username = '$myusername' and clave = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
   	 // Si el número de filas devuelto es 1 indica que se ha encontrado un cliente con ese usuario y esa clave
	 // Se abre una pantalla "welcome.php" con las diferentes opciones del menó Compras
	   
      if($count == 1) {
		  // Se crea sesión y variables de sesión
          session_start();
         $_SESSION['login_cliente'] = $myusername;
		 $_SESSION['nif_cliente'] = $row['nif'];
         
         header("location: comwelcome.php");
      }
	  else // Si no, el usuario/contraseña no son correctos y por tanto no se loguea al cliente -> muestra mensaje de error
	  { 
         $error = "Usuario o password incorrectos !!!";
		 echo $error;
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                  <label>Usuario  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Clave  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = "Login"/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>