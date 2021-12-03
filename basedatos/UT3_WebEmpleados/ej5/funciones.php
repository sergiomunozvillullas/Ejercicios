
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




function mostrarhistorico($nombredepartamento,$conn){
    try {
      $fecha=date('Y-m-d');
      $mensaje="";
      //---------------------------------------------------------------------------

      $stmt1 = $conn->prepare("SELECT cod_dpto FROM departamento WHERE nombre_dpto='$nombredepartamento'");
         $stmt1->execute();
         $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
         foreach($stmt1->fetchAll() as $row) {
           $codigo=$row["cod_dpto"];
         }
         //---------------------------------------------------------------------------

         $stmt2 = $conn->prepare("SELECT dni FROM emple_depart WHERE cod_dpto='$codigo' AND fecha_fin is not null");
            $stmt2->execute();
            $resul2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt2->fetchAll() as $row) {
              $dni=$row["dni"];

            //---------------------------------------------------------------------------
if (!empty($dni)) {
  $stmt3 = $conn->prepare("SELECT nombre FROM empleado WHERE dni='$dni'");
     $stmt3->execute();
     $resul3 = $stmt3->setFetchMode(PDO::FETCH_ASSOC);
     foreach($stmt3->fetchAll() as $row) {
       $nombremep=$row["nombre"];
       echo "<br>"."$nombremep";
     }

 }else {
     echo "No hay empleados";
   }
 }




}
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  echo "$mensaje";

}


?>
