
<?php
echo "<HTML>
<HEAD><TITLE>  EJ2B – Conversor Decimal a base n </TITLE></HEAD>
<BODY>";
for ($i=2; $i <10 ; $i++) {
$num="48";
$binario=0;
$completo="";
  echo "</br>";
echo"Número: $num en base: $i: ";
while ($num >= 1) {
$binario=$num%$i;
$completo=$binario."".$completo;
$num=$num/$i;
}
echo "$completo";
}
echo "</BODY>
</HTML>";
?>
