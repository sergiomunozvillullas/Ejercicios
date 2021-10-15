
<?php
echo "<HTML>
<HEAD><TITLE>BINGO</TITLE></HEAD>
<BODY style=background-color:#F57C3B>";

echo "<H1>BINGO</H1>";
echo "<H2>Sergio Muñoz Villullas</H2>";



//JUGADORES
for ($x=1; $x <5 ; $x++) {
  ${"jugador".$x}=array();
}
//AÑADIMOS CARTONES A JUGADORES
for ($j=1; $j <5 ; $j++) {

for ($i=0; $i <3 ; $i++) {
  array_push(${"jugador".$j},cartones());

      }
}

//------------------------------------------------------------------------------------------------

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
for ($i=0; $i < 15 ; $i++) {
  sort($carton);
    //  var_dump($carton);
}
return $carton;
}
echo "</br>";
echo "</br>";

//------------------------------------------------------------------------------------------------


function cartonganador($jug1,$jug2,$jug3,$jug4){

    echo "</br>";
 $cartonganador=array();
    echo "</br>";
for ($i=1; $i <5 ; $i++) {
  ${"contjug".$i}=array(0,0,0);
}
while($contjug1[0]<15 && $contjug1[1]<15  && $contjug1[2]<15
  && $contjug2[0]<15 && $contjug2[1]<15 && $contjug2[2]<15
&& $contjug3[0]<15 && $contjug3[1]<15 && $contjug3[2]<15
&& $contjug4[0]<15 && $contjug4[1]<15 && $contjug4[2]<15){

  do{//comprobamos que la bola no haya salido antes
    $num_aleatorio=rand(1,60);//sacamos la bola

  }while(in_array($num_aleatorio,$cartonganador)==true);
       for ($j=1; $j <5 ; $j++) {

    if(in_array($num_aleatorio,${"jug".$j}[0])){
      ${"contjug".$j}[0]++;
    }
    if(in_array($num_aleatorio,${"jug".$j}[1])){
      ${"contjug".$j}[1]++;
    }
    if(in_array($num_aleatorio,${"jug".$j}[2])){
      ${"contjug".$j}[2]++;
    }
    if (in_array(15,${"contjug".$j})) {
    $ganador="Jugador $j";
          echo "<center>El $ganador ha sido el ganador</center>";


    }

       }

           array_push($cartonganador,$num_aleatorio);
     }
        //var_dump($contjug1,$contjug2,$contjug3,$contjug4);
     $fila=0;
echo "<center><table border='1'> <caption><h1> BOLAS HASTA QUE EL GANADOR CANTÓ: </h1></caption> <tr>";
for ($i=0; $i <sizeof($cartonganador) ; $i++) {
  if (($fila%15==0)) {
echo "</tr><tr><center><td><img src=imagenes/$cartonganador[$i].png width=40px height=40px/></td></center>";
}else{
        echo "<td><img src=imagenes/$cartonganador[$i].png width=40px height=40px/></td>";}
               $fila++;

}
echo " </tr></table>";
    echo "</br>";

}







//------------------------------------------------------------------------------------------------



function mostrarcartones($jugador){
for ($i=0; $i <3 ; $i++) {
  echo "carton $i";
      echo "</br>";
      echo "<table border='1'><tr>";
  for ($k=0; $k< 15 ; $k++) {

  $cartonesjugador=$jugador[$i];
   echo "<td><img src = imagenes/$cartonesjugador[$k].png width=35px height=35px/> </td>";

}
   echo "</tr></table>";
    echo "</br>";
}
}


//------------------------------------------------------------------------------------------------

echo "<table border='1'> <caption><h1> Bolas </h1></caption> <tr>";
$fila=0;
for ($i=1; $i <= 60 ; $i++) {
       if (($fila%15==0)) {
 echo "</tr><tr><td><img src=imagenes/$i.png width=50px height=50px/></td>";
    }else{
             echo "<td><img src=imagenes/$i.png width=50px height=50px/></td>";     }
                    $fila++; }

echo "</table>";
echo "</br>";
echo "</br>";

//------------------------------------------------------------------------------------------------
echo "</br>";
echo "JUGADOR 1";
echo "</br>";
echo mostrarcartones($jugador1);
echo "</br>";
echo "JUGADOR 2";
echo "</br>";
echo mostrarcartones($jugador2);
echo "</br>";
echo "JUGADOR 3";
echo "</br>";
echo mostrarcartones($jugador3);
echo "</br>";
echo "JUGADOR 4";
echo "</br>";
echo mostrarcartones($jugador4);

//------------------------------------------------------------------------------------------------


echo cartonganador($jugador1,$jugador2,$jugador3,$jugador4);




echo "</BODY>
</HTML>";
?>
