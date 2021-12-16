
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function revisarparametros($categoria){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $categoria = test_input($_POST["categoria"]);
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


function altacategoria($categoria,$conn){
  echo "</br>";
  $cont=1;
try {
  $stmt = $conn->prepare("SELECT nombre FROM categoria");
     $stmt->execute();
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


       foreach($stmt->fetchAll() as $row) {
          $cont++;
           }


  $cod = str_pad($cont, 3, "0", STR_PAD_LEFT);
    $id="C-".$cod;


    $stmt1 = $conn->prepare("INSERT INTO categoria (id_categoria,nombre) VALUES ('$id','$categoria')");
    $stmt1->execute();

    // set the resulting array to associative
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
 }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }


}



 ?>
