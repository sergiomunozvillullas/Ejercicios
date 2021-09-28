
<?php
echo "<HTML>
<HEAD><TITLE> EJ2-Direccion Red – Broadcast y Rango </TITLE></HEAD>
<BODY>";

$ip="192.168.16.100/16";
echo "<b>IP= $ip </b>";
$ip20= explode('/',$ip);
$primerNumero=$ip20[0];
$mascara=$ip20[1];
$bits=32;
$bitsip=$bits-$mascara;
$segundoNumero= explode('.',$primerNumero);
$unobinario=$segundoNumero[0];
$dosbinario=$segundoNumero[1];
$tresbinario=$segundoNumero[2];
$cuatrobinario=$segundoNumero[3];

echo "</br>Ip sin mascara: $primerNumero</br>";
echo "Ip sin puntos: $unobinario$dosbinario$tresbinario$cuatrobinario</br>";
$primera= sprintf ("%b",$unobinario);
$segunda=sprintf ("%b",$dosbinario);
$tercera=sprintf ("%b",$tresbinario);
$cuarta=sprintf ("%b",$cuatrobinario);
$primera2=str_pad($primera,8,"0",STR_PAD_LEFT);
$segunda2=str_pad($segunda,8,"0",STR_PAD_LEFT);
$tercera2=str_pad($tercera,8,"0",STR_PAD_LEFT);
$cuarta2=str_pad($cuarta,8,"0",STR_PAD_LEFT);
$todojunto=$primera2.$segunda2.$tercera2.$cuarta2;
echo "IP en binario todo junto:$todojunto </br>";
echo "Las IPs tienen 32 bits por lo que se le han de restar los bits de la máscara, que en este caso son: ";
echo "$bitsip</br>";
echo "string</br>";
//Direccion de red
for ($i=1; $i <=$bitsip; $i++) {
$todojunto[strlen($todojunto)-$i]="0";
}
echo "Ahora tenemos la Direccion de red en binario: ".$todojunto;
echo "</br>";
$primerocteto=substr($todojunto,0,8);
$segundoocteto=substr($todojunto,8,8);
$tercerocteto=substr($todojunto,16,8);
$cuartoocteto=substr($todojunto,24,8);
echo "Direccion de red: ";
echo bindec($primerocteto).".";
echo bindec($segundoocteto).".";
echo bindec($tercerocteto).".";
echo bindec($cuartoocteto);
$primerared=bindec($primerocteto);
$segundared=bindec($segundoocteto);
$tercerared=bindec($tercerocteto);
$cuartored=bindec($cuartoocteto);
//Broadcast
for ($i=1; $i <=$bitsip; $i++) {
$todojunto[strlen($todojunto)-$i]="1";
}
echo "</br>Ahora tenemos el Broadcast en binario: ".$todojunto;
echo "</br>";
$primerocteto=substr($todojunto,0,8);
$segundoocteto=substr($todojunto,8,8);
$tercerocteto=substr($todojunto,16,8);
$cuartoocteto=substr($todojunto,24,8);
echo "Broadcast: ";
echo bindec($primerocteto).".";
echo bindec($segundoocteto).".";
echo bindec($tercerocteto).".";
echo bindec($cuartoocteto);
echo "</br>Rango:";
//pondremos un 0 donde sea el primer 255
//pondremos un 1 en el ultimo 255
//para la segunda parte, tendremos que poner un 254 en el ultimo 255
//para los rangos
$primeronormal=bindec($primerocteto);
$segundonormal=bindec($segundoocteto);
$terceronormal=bindec($tercerocteto);
$cuartonormal=bindec($cuartoocteto);

//primera parte con direccion de red
$rango1=$cuartored+1;
$rango2=$cuartonormal-1;
echo "$primerared.$segundared.$tercerared.$rango1 a $primeronormal.$segundonormal.$terceronormal.$rango2";

echo "</BODY>
</HTML>";
?>
