
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
    echo "Error: " . $e->getMessage();
  }


}



?>
