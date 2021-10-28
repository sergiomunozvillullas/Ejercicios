<?php
$caracteres = 0;
$z=file("../ej1/alumnos1.txt");
foreach($z as $linea=>$texto) {
	echo "Linea: ",$linea," Texto: ",$texto,"<br>";
};
echo "<table border=1>";
echo "<tr>";

# recorremos el array y lo mostramos por pantalla
foreach($z as $linea=>$texto) {
	echo "<td>".$texto."</td>";
$caracteres += strlen($texto);

};

echo "<br><br>";
  echo "</tr>";
echo "</table>";
echo "Tiene ".($linea+1) ." lineas";
echo "<br><br>";
echo "Caracteres: " . $caracteres;

























 ?>
