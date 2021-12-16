<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Empresa</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <p>Producto:</p>
         <input type='text' name='producto' placeholder='Nombre de un producto'>
       <br><br>

       <p>Precio:</p>
        <input type='text' name='precio' placeholder='Precio'>
      <br><br>

       <p>Categoria:</p>
       <select name="categoria">
         <?php require 'funciones.php';
         //CREAMOS CONEXION
         $servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
         $conexion=crearconexion($servername, $username, $password, $dbname);

         //CREAMOS EL DESPLEGABLE
         //FUNCTION
         $arraycat=arraycategoria($conexion);
         //OPTIONS
         foreach ($arraycat as $key) {
           ?> <option> <?php echo $key ?> </option>
           <?php
         }
         //CERRAMOS CONEXION
         $conexion=null;
         ?>
       </select>
<br><br>
       <input type="submit" value="Enviar"  name="enviar">
       <input type="reset" value="Borrar">
    </form>
  </body>
</html>



<?php
if (isset($_POST['enviar'])) {
//INTRODUCIMOS LAS FUNCIONES

//CREAMOS CONEXION
echo "Creamos la conexion: ";
$servername="localhost"; $username="root"; $password="rootroot"; $dbname="comprasweb";
$conexion=crearconexion($servername, $username, $password, $dbname);

//AÑADIMOS PARAMETROS
$categoria=$_POST['categoria'];
$producto=$_POST['producto'];
$precio=$_POST['precio'];

$eur= explode("€", $precio);
$precio= floatval($eur[0]);

//FUNCIONES
revisarparametros($categoria,$producto,$precio);
altaproducto($categoria,$producto,$precio,$conexion);

//CERRAMOS CONEXION
$conexion=null;
}
?>
