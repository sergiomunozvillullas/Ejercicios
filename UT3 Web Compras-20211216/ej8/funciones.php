
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($nif,$nombre,$apellido,$cp,$direccion,$ciudad){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nif = test_input($_POST["nif"]);
    $nombre = test_input($_POST["nombre"]);
    $apellido = test_input($_POST["apellido"]);
    $cp = test_input($_POST["cp"]);
    $direccion = test_input($_POST["direccion"]);
    $ciudad = test_input($_POST["ciudad"]);
  }
}

function crearconexion($servername, $username, $password, $dbname){
  // Create connection
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }
  return $conn;
}

function validarnif($nif){
  if (empty($nif)) {
  }else{
    $nifnumeros=substr($nif,0,8);
    $nifletra=substr($nif,8,1);
    // echo "$nifnumeros - $nifletra </br>";
    if (is_numeric($nifnumeros) && ctype_alpha($nifletra)) {
      return $nif;
    }
  }
}

function altacliente($nif,$nombre,$apellido,$cp,$direccion,$ciudad,$conn){
  echo "</br>";

  try {

    $stmt1 = $conn->prepare("INSERT INTO cliente (nif,nombre,apellido,cp,direccion,ciudad) VALUES ('$nif','$nombre','$apellido','$cp','$direccion','$ciudad')");
    $stmt1->execute();

    // set the resulting array to associative
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    echo "Se ha añadido el cliente: ".$nombre." ".$apellido."   (".$nif.")";
  }
  catch(PDOException $e) {

//echo "El código de excepción es: " . $e->getCode();

    if ($e->getCode() == 23000) { //primary key duplicated
          echo "Clave primaria duplicada, NIF";
        }elseif ($e->getCode() == 22001) { //data too long
          echo "NIF excede los parametros";
        }else {
            echo "Error: " . $e->getMessage();
        }

}
}



?>
