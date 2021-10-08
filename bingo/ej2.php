
<?php
echo "<HTML>
<HEAD><TITLE>BINGO</TITLE></HEAD>
<BODY>";

echo "<H1>BINGO</H1>";
echo "<H2>Sergio Muñoz Villullas</H2>";


echo "Bolas: ";
echo "</br>";
for ($i=1; $i <= 60 ; $i++) {

    //  var_dump($bolas);

echo "<img src = imagenes/$i.png />";

}

echo "</br>";
echo "</br>";

//JUGADORES

$jugador1=array();
$jugador2=array();
$jugador3=array();
$jugador4=array();

//AÑADIMOS CARTONES A JUGADORES

for ($i=0; $i <3 ; $i++) {
  array_push($jugador1,cartones());
    array_push($jugador2,cartones());
      array_push($jugador3,cartones());
        array_push($jugador4,cartones());

}
var_dump($jugador1);
var_dump($jugador2);
var_dump($jugador3);
var_dump($jugador4);

//60 BOLAS






//METER NUMEROS ALEATORIOS SIN REPETIR AL ARRAY . ORDENAR ARRAY Y MOSTRARLO
function cartones (){

$carton=array();
$x = 0;
while ($x<15) {
  $num_aleatorio = rand(1,60);
  if (!in_array($num_aleatorio,$carton)) {
    array_push($carton,$num_aleatorio);
    $x++;
  }
}
echo " </br></br></br></br></br>carton: ";

for ($i=0; $i < 15 ; $i++) {

  sort($carton);
 //echo " ||$carton[$i]||";
 echo "<img src = imagenes/$carton[$i].png />";
    //  var_dump($carton);
}
return $carton;
}


echo "</br>";
echo "</br>";




//JUEGO CON UN CARTON
function ganador(){
$cartonganador=array();
$y=0;
while ($y<15) {
  $num_aleatorio = rand(1,60);
if (!in_array($num_aleatorio,$cartonganador)) {
      if (in_array($num_aleatorio,$carton)){
            array_push($cartonganador,$num_aleatorio);

$y++;

}
}
}

echo "Carton ganador: ";
for ($i=0; $i < 15 ; $i++) {


 echo " ||$cartonganador[$i]||";
    //  var_dump($carton);
}

}








echo "</BODY>
</HTML>";
?>
