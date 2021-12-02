
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
 echo "Connected successfully";
   }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }
return $conn;
}


function creardepartamento($nombredepartamento,$conn){
  echo "</br>";
  $cont=1;
try {
  $stmt = $conn->prepare("SELECT nombre_dpto FROM departamento");
     $stmt->execute();
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


       foreach($stmt->fetchAll() as $row) {
          $cont++;
           }


  $cod = str_pad($cont, 3, "0", STR_PAD_LEFT);
    $codigodep="D".$cod;


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES ('$codigodep','$nombredepartamento')";
  $conn->exec($sql);



 }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  $conn = null;
}

// function mostrardepartamentos($conn){
//   echo "</br>";
//   $sql = "SELECT nombre_dpto FROM departamento";
//   $result = mysqli_query($conn, $sql);
//
//   if (mysqli_num_rows($result) > 0) {
//       // output data of each row
//       echo "NOMBRES DE DEPARTAMENTOS DE LA EMPRESA:</BR>";
//       while($row = mysqli_fetch_assoc($result)) {
//           echo "Nombre: <b>" . $row["nombre_dpto"]. "</b><br>";
//       }
//   } else {
//       echo "0 results";
//   }
// }



 ?>
