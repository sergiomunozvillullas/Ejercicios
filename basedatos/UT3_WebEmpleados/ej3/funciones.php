
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($dni,$nombredept){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombredept = test_input($_POST["nombredept"]);
    $dni = test_input($_POST["dni"]);
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



function arraydepartamentos($conn){
  try {
    $arraydepartamentos=array();
    $stmt = $conn->prepare("SELECT nombre_dpto FROM departamento");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 foreach($stmt->fetchAll() as $row) {
        array_push($arraydepartamentos,$row["nombre_dpto"]);
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
return $arraydepartamentos;
}

function arraydni($conn){
  try {
    $arraydni=array();
    $stmt = $conn->prepare("SELECT dni FROM empleado");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 foreach($stmt->fetchAll() as $row) {
        array_push($arraydni,$row["dni"]);
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
return $arraydni;
}



function añadirempleado($dni,$nombredepartamento,$conn){
    try {
      $fecha=date('Y-m-d');
      $mensaje="";

      $stmt1 = $conn->prepare("SELECT cod_dpto FROM departamento WHERE nombre_dpto='$nombredepartamento'");
         $stmt1->execute();
         $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
         foreach($stmt1->fetchAll() as $row) {
           $codigo=$row["cod_dpto"];
         }

      $stmt = $conn->prepare("UPDATE emple_depart SET  cod_dpto='$codigo'  WHERE dni='$dni'");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $mensaje="<br>"."Empleado reidirigido"."<br>";



}
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  echo "$mensaje";

}


?>
