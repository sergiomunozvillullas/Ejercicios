
<?php
echo "<HTML>
<HEAD><TITLE>BINGO</TITLE></HEAD>
<BODY>";

echo "<H1>BINGO</H1>";
echo "<H2>Sergio Muñoz Villullas</H2>";

//CREAR ARRAY 60 BOLAS
$bolas=array();
echo "Bolas: ";
for ($i=1; $i <= 60 ; $i++) {
  $bolas[$i]=$i;


  echo " ||$bolas[$i]||";
    //  var_dump($bolas);
}

echo "</br>";
echo "</br>";



//METER NUMEROS ALEATORIOS SIN REPETIR AL ARRAY
$carton=array();
$x = 0;
while ($x<15) {
  $num_aleatorio = rand(1,60);
  if (!in_array($num_aleatorio,$carton)) {
    array_push($carton,$num_aleatorio);
    $x++;
  }
}




//ORDENAR ARRAY Y MOSTRARLO
echo "Carton: ";
for ($i=0; $i < 15 ; $i++) {

  sort($carton);
 echo " ||$carton[$i]||";
    //  var_dump($carton);
}

echo "</br>";
echo "</br>";

//JUEGO CON UN CARTON
$cartonganador=array();
$y=0;
while ($y<15) {
  $num_aleatorio = rand(1,60);
if (!in_array($num_aleatorio,$cartonganador)) {
  if (in_array($num_aleatorio,$bolas)) {
      if (in_array($num_aleatorio,$carton)){
            array_push($cartonganador,$num_aleatorio);

$y++;
}
}
}
}

//MOSTRAR ARRAY GANADOR

echo "Carton ganador: ";
for ($i=0; $i < 15 ; $i++) {

  sort($cartonganador);
 echo " ||$cartonganador[$i]||";
    //  var_dump($carton);
}




echo "</BODY>
</HTML>";
?>
