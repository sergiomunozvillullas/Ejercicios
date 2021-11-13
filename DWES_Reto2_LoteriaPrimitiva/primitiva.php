<?php

include 'r22_funciones.php';
$fecha=$_POST['fechasorteo'];
$recaudacion=$_POST['recaudacion'];
  echo "<h1>Loteria Primitiva de España / Sorteo  ".$fecha."</h1>";
$z=file('r22_primitiva.txt');
$array=combinacion();
echo "<table border='1'> <tr>";
echo "<tr><td>N1</td><td>N2</td><td>N3</td><td>N4</td><td>N5</td><td>N6</td><td>C</td><td>R</td></tr>";
for ($i=0; $i < sizeof($array) ; $i++) {
echo "<td><img src=r22_bolasprimitiva/$array[$i].png width=40px height=40px></td>";
}
echo " </tr></table> <br>";


// verfichero($z);
echo "<br>";


numerosfichero($z,$array,$recaudacion,$fecha);








?>
