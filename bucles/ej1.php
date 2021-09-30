
<?php
echo "<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario </TITLE></HEAD>
<BODY>";

$num="168";
echo "$num </br>";
echo"Lo pasamos a binario: ";
$binario=0;
$completo="";

while ($num >= 1) {
$binario=$num%2;
$completo=$binario."".$completo;
$num=$num/2;
}
echo "$completo";


echo "</BODY>
</HTML>";
?>
