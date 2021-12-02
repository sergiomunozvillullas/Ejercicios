
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($dni,$nombreemp,$fecha,$nombredept,$salario,$apellido){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombredept = test_input($_POST["nombredept"]);
      $salario = test_input($_POST["salario"]);
    $nombreemp = test_input($_POST["nombre"]);
    $apellido = test_input($_POST["apellido"]);
    $fecha = test_input($_POST["fechnac"]);
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



function añadirempleado($dni,$nombre,$fechanac,$nombredepartamento,$salario,$apellido,$conn,$arraydepartamentos){
      var_dump($arraydepartamentos);
    try {
      $fecha=date('Y-m-d');
      $cont=0;
      $mensaje="";

      $stmt = $conn->prepare("INSERT INTO empleado (dni,nombre,apellidos,fecha_nac,salario) VALUES ('$dni','$nombre','$apellido','$fechanac','$salario')");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $mensaje="Empleado añadido"."<br>";

      $stmt1 = $conn->prepare("SELECT cod_dpto FROM departamento WHERE nombre_dpto='$nombredepartamento'");
         $stmt1->execute();
         $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
         foreach($stmt1->fetchAll() as $row) {
           $codigo=$row["cod_dpto"];
         }

        $cont++;
        $cod = str_pad($cont, 3, "0", STR_PAD_LEFT);
          $codigo="D".$cod;

        $stmt2 = $conn->prepare("INSERT INTO emple_depart (dni,cod_dpto,fecha_ini,fecha_fin) VALUES ('$dni','$codigo','$fecha','2000/11/02')");
        $stmt2->execute();

        // set the resulting array to associative
        $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);

}
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  echo "$mensaje";

}


?>
