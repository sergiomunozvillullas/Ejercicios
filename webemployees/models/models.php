<?php
  function test_input($data) {//Limpiamos los datos que nos pasan
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }



  function cerrarConexión($conn) {
    $conn = null;//Cerramos la conexión
  }

  function numeroCliente($nombre,$apellido,$conn) {//Le pasamos le ID del cliente y devolvemos su nombre
  try {
    $stmt = $conn->prepare("SELECT emp_no FROM employees WHERE first_name = '$nombre' and last_name='$apellido'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
      foreach($stmt->fetchAll() as $row) {
        $emp_no = $row["emp_no"];
     }
     return $emp_no;
  }
  catch(PDOException $e) {
      echo "Error: ".$e->getMessage();
  }
  }

  function RecursosHumanos($emp_no,$conn) {//Le pasamos le ID del cliente y devolvemos su nombre
  try {
    $stmt = $conn->prepare("SELECT departments.dept_no as numerodept FROM employees, dept_emp, departments WHERE departments.dept_no=dept_emp.dept_no and dept_emp.emp_no=employees.emp_no and employees.emp_no='$emp_no' and departments.dept_name='Human Resources' ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
    $dept_no="";
      foreach($stmt->fetchAll() as $row) {
        $dept_no= $row["numerodept"];
     }

  }
  catch(PDOException $e) {
      echo "Error: ".$e->getMessage();
  }
  return $dept_no;
  }

  function modificarSalario($empleado,$fecha,$salario,$conn) {//Le pasamos le ID del cliente y devolvemos su nombre
  try {
    $stmt = $conn->prepare("UPDATE salaries SET to_date='$fecha' where emp_no='$empleado' and to_date='9999-01-01'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados

    $stmt1 = $conn->prepare("INSERT INTO salaries (emp_no,salary,from_date,to_date) VALUES ('$empleado','$salario','$fecha','9999-01-01')");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
  }
  catch(PDOException $e) {
      echo "Error: ".$e->getMessage();
  }

  }

  function fechaHora(){
  $fecha = date("Y-m-d");
  return $fecha;
  }


  // function saldoCliente($cliente,$conn) {//Le pasamos le ID del cliente y devolvemos su nombre
  // try {
  //   $stmt = $conn->prepare("SELECT saldo FROM eclientes WHERE email = '$cliente'");
  //   $stmt->execute();
  //
  //   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
  //     foreach($stmt->fetchAll() as $row) {
  //       $saldo = $row["saldo"];
  //
  //    }
  //
  //    return $saldo;
  // }
  // catch(PDOException $e) {
  //     echo "Error: ".$e->getMessage();
  // }
  // }

//   function dniCliente($cliente,$conn) {//Le pasamos le ID del cliente y devolvemos su nombre
//   try {
//     $stmt = $conn->prepare("SELECT dni FROM eclientes WHERE email = '$cliente'");
//     $stmt->execute();
//
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//       foreach($stmt->fetchAll() as $row) {
//         $dni = $row["dni"];
//
//      }
//
//      return $dni;
//   }
//   catch(PDOException $e) {
//       echo "Error: ".$e->getMessage();
//   }
//   }
//
//   function precioPatin($matricula,$conn) {//Le pasamos le ID del cliente y devolvemos su nombre
//   try {
//     $stmt = $conn->prepare("SELECT preciobase FROM epatines WHERE matricula = '$matricula'");
//     $stmt->execute();
//
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//       foreach($stmt->fetchAll() as $row) {
//         $precio = $row["preciobase"];
//
//      }
//
//      return $precio;
//   }
//   catch(PDOException $e) {
//       echo "Error: ".$e->getMessage();
//   }
//   }
//
//
//     function fechaAlquiler($matricula,$dni,$conn) {//Le pasamos le ID del cliente y devolvemos su nombre
//     try {
//       $stmt = $conn->prepare("SELECT fecha_alquiler FROM ealquileres WHERE matricula = '$matricula' AND dni='$dni'");
//       $stmt->execute();
//
//       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//         foreach($stmt->fetchAll() as $row) {
//           $fecha_alquiler = $row["fecha_alquiler"];
//
//        }
//
//        return $fecha_alquiler;
//     }
//     catch(PDOException $e) {
//         echo "Error: ".$e->getMessage();
//     }
//     }
//

//
//
// //---------------------------------------------------------------------------------------------------------------------------
//
//
// function alquilerPatin($dni,$matricula,$fechaHora,$precio,$conn){
//   try {
//
//     $stmt = $conn->prepare("INSERT INTO ealquileres (dni,matricula,fecha_alquiler) VALUES('$dni','$matricula','$fechaHora')");
//     $stmt->execute();
//
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//
//     $stmt1 = $conn->prepare("UPDATE epatines SET disponible = 'N' WHERE matricula='$matricula'");
//     $stmt1->execute();
//
//     $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//
//
//
//   }
//   catch(PDOException $e) {
//       echo "Error: ".$e->getMessage();
//   }
//   }
//
// function consultaPatin($fechadesde,$fechahasta,$dni,$conn){
//   try {
//
//     $stmt = $conn->prepare("SELECT epatines.matricula,bateria,fecha_alquiler,fecha_devolucion,preciototal from epatines,ealquileres WHERE epatines.matricula=ealquileres.matricula AND dni='$dni' AND fecha_devolucion IS NOT NULL AND fecha_alquiler BETWEEN '$fechadesde' AND '$fechahasta'  ORDER BY matricula,fecha_alquiler");
//     $stmt->execute();
//
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//       foreach($stmt->fetchAll() as $row) {
//         $matricula = $row["matricula"];
//           $bateria = $row["bateria"];
//             $fecha_alquiler = $row["fecha_alquiler"];
//               $fecha_devolucion = $row["fecha_devolucion"];
//                 $preciototal = $row["preciototal"];
//                 echo "matricula: ".$matricula." bateria: ". $bateria." fecha_alquiler: ". $fecha_alquiler." fecha_devolucion: ". $fecha_devolucion." preciototal: ". $preciototal."<br>";
//
//      }
//
//   }
//   catch(PDOException $e) {
//       echo "Error: ".$e->getMessage();
//   }
//   }
//
// function aparcarPatin($fechaHora,$precio,$dni,$conn,$matricula,$fecha_alquiler){
//   try {
//     $stmt = $conn->prepare("SELECT TIMESTAMPDIFF(MINUTE,fecha_alquiler,'$fechaHora') as horas ,preciobase FROM epatines,ealquileres WHERE epatines.matricula=ealquileres.matricula  AND dni='$dni' AND epatines.matricula='$matricula' AND fecha_alquiler='$fecha_alquiler'");
//     $stmt->execute();
//
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//         foreach($stmt->fetchAll() as $row) {
//   $horas = $row["horas"];
//     $preciobase = $row["preciobase"];
//     $preciototal= $preciobase*$horas;
//
//     $stmt3 = $conn->prepare("SELECT saldo FROM eclientes WHERE dni='$dni'");
//     $stmt3->execute();
//
//     $result3 = $stmt3->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//         foreach($stmt3->fetchAll() as $row) {
// $saldo= $row["saldo"];
// if ($saldo>=$preciototal) {
//
//
//     $stmt1 = $conn->prepare("UPDATE ealquileres SET fecha_devolucion='$fechaHora',preciototal='$preciototal' WHERE dni='$dni' AND matricula='$matricula' AND fecha_alquiler='$fecha_alquiler'");
//     $stmt1->execute();
//
//     $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//
//     $stmt2 = $conn->prepare("UPDATE eclientes SET saldo=saldo-'$preciototal' WHERE dni='$dni'");
//     $stmt2->execute();
//
//     $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//
//     $stmt3 = $conn->prepare("UPDATE epatines SET disponible = 'S' WHERE matricula='$matricula'");
//     $stmt3->execute();
//
//     $result3 = $stmt3->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
//     echo "Patín devuelto, pago realizado";
//
// }else {
//   echo "NO hay saldo suficiente";
// }
// }
// }
//   }
//
//   catch(PDOException $e) {
//       echo "Error: ".$e->getMessage();
//   }
//   }

 ?>
