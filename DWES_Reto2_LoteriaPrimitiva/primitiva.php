<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Primitiva HTML</title>
</head>
<body>
	<img src="primitiva.jpg">
	<form action="primitiva.php" method="post">
		<p>Fecha del sorteo <input type='date' name='fechasorteo' size=15><br>
	<p>Recaudación Sorteo <input type='text' name='recaudacion' size=10><br>
		<p>Pulsa para generar combinación ganadora: <input type="submit" value="Combinacion" name="combinacion"></p>
	</form>
</body>
</html>

﻿<?php

include 'r22_funciones.php';
$fecha=$_POST['fechasorteo'];
$recaudacion=$_POST['recaudacion'];

  echo "<h1>Loteria Primitiva de España / Sorteo  ".$fecha."</h1>";

$z=file('r22_primitiva.txt');
$array=combinacion();

echo "<table border='1'> <tr>";
echo "<tr><td>N1</td><td>N2</td><td>N3</td><td>N4</td><td>N5</td><td>N6</td><td>C</td><td>R</td></tr>";
for ($i=0; $i < sizeof($array)-1 ; $i++) {
echo "<td><img src=r22_bolasprimitiva/$array[$i].png width=40px height=40px></td>";
}
echo "<td><img src=r22_bolasprimitiva/rbola$array[$i].png width=40px height=40px></td>";
echo " </tr></table> <br>";


// verfichero($z);
echo "<br>";


numerosfichero($z,$array,$recaudacion,$fecha);

?>
