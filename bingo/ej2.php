
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
echo " </br></br></br></br></br>carton : ";

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
function ganador($jugador1,$jugador2,$jugador3,$jugador4){
$cartonganador=array();
$cont0=0;
$cont1=0;
$cont2=0;
$cont3=0;
$cont4=0;
$cont5=0;
$cont6=0;
$cont7=0;
$cont8=0;
$cont9=0;
$cont10=0;
$cont11=0;

$carton0=$jugador1[0];
$carton1=$jugador1[1];
$carton2=$jugador1[2];



$y=0;
$cartonganador=array();
while ($y<60) {
$num_aleatorio = rand(1,60);
if (!in_array($num_aleatorio,$cartonganador)) {
          array_push($cartonganador,$num_aleatorio);

$y++;
}
while ($cont0>15 || $cont1>15 ||$cont2>15 ||$cont3>15 ||$cont4>15 ||$cont5>15 ||$cont6>15 ||$cont7>15 ||$cont8>15 ||$cont9>15 ||$cont10>15 ||$cont1>15) {
for ($k=0; $k <60 ; $k++) {
  for ($j=0; $j <12 ; $j++) {
  if (in_array($cartonganador[$k],$carton0[$j])) {
  $cont0++;

  }
  if (in_array($cartonganador[$k],$carton1)) {
  $cont1++;

  }
  if (in_array($cartonganador[$k],$carton2)) {
  $cont2++;
}

}
}
}
}


for ($j=0; $j <60 ; $j++) {
echo "||$cartonganador[$j]||";
}
echo "</br>";
echo "||$cont0||";echo "||$cont1||";echo "||$cont2||";
}


echo ganador($jugador1,$jugador2,$jugador3,$jugador4);


echo "</BODY>
</HTML>";
?>
