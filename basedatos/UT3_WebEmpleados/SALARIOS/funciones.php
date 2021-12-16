
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($nombredept){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombredept = test_input($_POST["nombredept"]);
}
}


function crearconexion($servername, $username, $password, $dbname){
  // Create connection
  try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "Connected successfully"."<br>";
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






function salario($nombredepartamento,$conn){
    try {
echo "<table border=1>";
echo "<tr> <td>NOMBRE</td><td>SALARIO</td></tr>";
      //---------------------------------------------------------------------------

      $stmt1 = $conn->prepare("SELECT nombre,salario FROM empleado,departamento,emple_depart WHERE departamento.cod_dpto=emple_depart.cod_dpto AND empleado.dni=emple_depart.dni AND nombre_dpto='$nombredepartamento' AND fecha_fin is null;");
         $stmt1->execute();
         $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
         foreach($stmt1->fetchAll() as $row) {
          echo "<tr><td> ".$row["nombre"]."</td><td> ".$row["salario"]."</td></tr>";
         }
         //---------------------------------------------------------------------------

         $stmt = $conn->prepare("SELECT sum(salario) FROM empleado,departamento,emple_depart WHERE departamento.cod_dpto=emple_depart.cod_dpto AND empleado.dni=emple_depart.dni AND nombre_dpto='$nombredepartamento' AND fecha_fin is null;");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
             echo "<tr><td>-SALARIO TOTAL-</td><td> ".$row["sum(salario)"]."</td></tr>";

            }


}
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }

echo "</table>";
}


?>
