<HTML>
<HEAD> <TITLE> Ficheros </TITLE>
</HEAD>
<BODY>
<h1>Ficha de alumnos</h1>
<form name='mi_formulario' action='fichero2.php' method='post'>
Nombre: <input type='text' name='Nombre' value='' size=40><br><br>
Apellido1: <input type='text' name='Apellido1' value='' size=40><br><br>
Apellido2: <input type='text' name='Apellido2' value='' size=40><br><br>
Fecha Nacimiento: <input type='text' name='fechanac' value='' size=9><br><br>
Localidad: <input type='text' name='localidad' value='' size=26><br><br>
<input type="submit" value="Enviar">
<input type="reset" value="Borrar">
</FORM>
</BODY>
</HTML>
<?php

include '../funciones/seguridaddata.php';
//creamos el fichero
$fichero=fopen("alumnos2.txt","w");
// echo "Metodo usado: ",$_SERVER['REQUEST_METHOD'],"<br>";
$nombre= $apellido1 = $apellido2 = $fecha = $localidad= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre=test_input($_POST['Nombre']);
  $apellido1=test_input($_POST['Apellido1']);
  $apellido2=test_input($_POST['Apellido2']);
  $fecha=test_input($_POST['fechanac']);
  $localidad=test_input($_POST['localidad']);
}

echo "Nombre: ";
  fwrite($fichero, $nombre."##");
      echo rellenar($nombre);
  echo "<br>";

echo "Apellido1: ";

  fwrite($fichero,$apellido1."##");
      echo rellenar($apellido1);
  echo "<br>";

echo "Apellido2: ";

  fwrite($fichero,$apellido2."##");
    echo rellenar($apellido2);
  echo "<br>";

echo "Fecha Nacimiento: ";
$fecha1=explode("/",$fecha);
  if (checkdate($fecha1[0],$fecha1[1],$fecha1[2])==true) {
    fwrite($fichero,$fecha."##");
      echo rellenar1($fecha);
    echo "<br>";
  }else{
    echo "<br>";
    fwrite($fichero,"Fecha Errónea ##");
  }


echo "Localidad: ";

  fwrite($fichero,$localidad."## \n");
  echo rellenar2($localidad);
  echo "<br>";

// while(!feof($fichero)){
// $z=fgets($fichero,40);
// echo $z,"<br>";
// }
fclose($fichero);

// echo str_pad($nombre, 40, " ", STR_PAD_LEFT);




?>
