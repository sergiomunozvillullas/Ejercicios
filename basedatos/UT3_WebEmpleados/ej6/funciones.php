
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($nombreemp,$porcentaje){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreemp = test_input($_POST["nombreemp"]);
        $porcentaje = test_input($_POST["porcentaje"]);
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



function arrayempleados($conn){
  try {
    $arrayempleados=array();
    $stmt = $conn->prepare("SELECT nombre FROM empleado");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 foreach($stmt->fetchAll() as $row) {
        array_push($arrayempleados,$row["nombre"]);
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
return $arrayempleados;
}




function incremento($nombreemp,$porcentaje,$conn){
    try {
      // $fecha=date('Y-m-d');
      // $mensaje="";

      //---------------------------------------------------------------------------

      $stmt1 = $conn->prepare("SELECT nombre FROM empleado WHERE nombre='$nombreemp'");
         $stmt1->execute();
         $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
         foreach($stmt1->fetchAll() as $row) {
           $nombre=$row["nombre"];
         }
         //---------------------------------------------------------------------------

  $stmt2 = $conn->prepare("UPDATE empleado set salario = salario * $porcentaje WHERE nombre='$nombre'");
            $stmt2->execute();
            $resul2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt2->fetchAll() as $row) {
              $salario=$row["salario"];
}
            //---------------------------------------------------------------------------

}
  catch(PDOException $e) {
    //SALE ERROR NO SE POR QUE
      echo "Errorx: " . $e->getMessage();
  }
  // echo "$mensaje";

}


?>
