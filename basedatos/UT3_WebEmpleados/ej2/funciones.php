
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function desplegable ($conn){
  $sql = "SELECT nombre_dpto FROM departamento";
  $result = mysqli_query($conn, $sql);
  $salida="";
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    //      echo "NOMBRES DE DEPARTAMENTOS DE LA EMPRESA:</BR>";
    while($row = mysqli_fetch_assoc($result)) {
      //      echo "Nombre: <b>" . $row["nombre_d"]. "</b><br>";
      $salida=$salida . "<option value=".$row["nombre_dpto"].">". $row["nombre_dpto"]."</option><br>";
    }
  }
  return $salida;
}

function crearconexion($servername, $username, $password, $dbname){
  // Create connection
  echo "Servidor: $servername, Usuario: $username, Contraseña: $password, Base de datos en uso: $dbname";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
  }
  return $conn;
}


function añadirempleado($dni,$nombre,$fechanac,$nombredepartamento,$salario,$conn){
  echo "</br>";
  // echo "Departamento escrito: $nombredepartamento";
  $sql1 = "SELECT nombre_dpto FROM departamento";
  $result = mysqli_query($conn, $sql1);
  $arraydepartamentos=array();
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "NOMBRES DE DEPARTAMENTOS DE LA EMPRESA:</BR>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "Nombre: <b>" . $row["nombre_dpto"]. "</b><br>";
      array_push($arraydepartamentos,$row["nombre_dpto"]);
    }
  } else {
    echo "0 results";
  }
  var_dump($arraydepartamentos);
  $tamaño=sizeof($arraydepartamentos);

  $mensaje="";
  for ($i=0; $i <$tamaño ; $i++) {
    if ($nombredepartamento==$arraydepartamentos[$i]) {
      $sql = "INSERT INTO empleado (dni,nombre,apellidos,fecha_nac,salario) VALUES ('$dni','$nombre','$apellido','$fechanac','$salario')";
      $result = mysqli_query($conn, $sql);
      $mensaje="Empleado añadido"."<br>";
    }else {
      $mensaje="Error, departamento inexistente";
    }
    for ($i=0; $i <$tamaño ; $i++) {
      if ($nombredepartamento==$arraydepartamentos[$i]) {
        $codigo="D".$i;
    $sql2 = "INSERT INTO emple_depart (dni,cod_dpto,fecha_ini,fecha_fin) VALUES ('$dni','$codigo','2000/01/01','2000/01/02')";
    $result2 = mysqli_query($conn, $sql2);
  }
    // if (mysqli_query($conn, $sql)) {
    //     echo "Nuevo departamento creado correctamente";
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }
  }


  }
  echo "$mensaje";


  // if (mysqli_query($conn, $sql)) {
  //     echo "Nuevo departamento creado correctamente";
  // } else {
  //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  // }
}






//
//
//
// function creardepartamento($nombredepartamento,$conn){
//   echo "</br>";
//   // echo "Departamento escrito: $nombredepartamento";
//   $sql = "INSERT INTO departamento (nombre_dpto) VALUES ('$nombredepartamento')";
//   $result = mysqli_query($conn, $sql);
//   // if (mysqli_query($conn, $sql)) {
//   //     echo "Nuevo departamento creado correctamente";
//   // } else {
//   //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//   // }
// }
//
// function mostrardepartamentos($conn){
//   echo "</br>";
//   $sql = "SELECT nombre_dpto FROM departamento";
//   $result = mysqli_query($conn, $sql);
//
//   if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     echo "NOMBRES DE DEPARTAMENTOS DE LA EMPRESA:</BR>";
//     while($row = mysqli_fetch_assoc($result)) {
//       echo "Nombre: <b>" . $row["nombre_dpto"]. "</b><br>";
//     }
//   } else {
//     echo "0 results";
//   }
// }
//
// function mostrartablas($conn){
//   echo "</br>";
//   $sql = "show tables";
//   $result = mysqli_query($conn, $sql);
//
//   if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     echo "TABLAS DE LA BASE DE DATOS:</br>";
//     while($row = mysqli_fetch_assoc($result)) {
//       echo "Nombre: <b>" . $row['Tables_in_empleadosnn']. "</b><br>";
//     }
//   } else {
//     echo "0 results";
//   }
// }

// function mostrarempleados($conn){
//   echo "</br>";
//   $sql = "SELECT dni, nombre_e, fec_nac, nombre_d FROM empleado";
//   $result = mysqli_query($conn, $sql);
//
//   if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     echo "EMPLEADOS:</br>";
//     while($row = mysqli_fetch_assoc($result)) {
//       echo "Dni: <b>" . $row['dni']. "</b><br>";
//       echo "Nombre: <b>" . $row['nombre_e']. "</b><br>";
//       echo "Fecha de nacimiento: <b>" . $row['fec_nac']. "</b><br>";
//       echo "Nombre departamento: <b>" . $row['nombre_dpto']. "</b><br>";
//       echo "</br>";
//     }
//   } else {
//     echo "0 results";
//   }
// }
//

?>
