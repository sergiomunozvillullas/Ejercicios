<?php
$caracteres = 0;
$z=file("../ej2/alumnos2.txt");
foreach($z as $linea=>$texto) {
	echo "Linea: ",$linea," Texto: ",$texto,"<br>";

};

echo "<table border=1 >";
echo "<tr>";

# recorremos el array y lo mostramos por pantalla
foreach($z as $linea=>$texto) {
    $parte=explode("##",$texto);
  echo "<tr>";
  	echo "<td>Nombre:</td>";
    echo "<td>Apellido1:</td>";
    echo "<td>Apellido2:</td>";
    echo "<td>Fecha:</td>";
    echo "<td>Localidad:</td>";
  echo "</tr>";
  echo "<tr>";
  	echo "<td>".$parte[0]."</td>";
    	echo "<td>".$parte[1]."</td>";
      	echo "<td>".$parte[2]."</td>";
        	echo "<td>".$parte[3]."</td>";
          	echo "<td>".$parte[4]."</td>";
  echo "</tr>";
$caracteres += strlen($texto);
};

echo "<br><br>";
  echo "</tr>";
echo "</table>";
echo "Tiene ".($linea+1) ." lineas";
echo "<br><br>";
echo "Caracteres: " . $caracteres;
echo "<br><br>";

?>
