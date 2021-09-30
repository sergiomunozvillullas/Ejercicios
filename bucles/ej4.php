
<?php
echo "<HTML>
<HEAD><TITLE> EJ4B – Tabla Multiplicar<</TITLE></HEAD>
<BODY>";

$num="8";
echo"La tabla de multiplicar del $num es:";

for ($i=0; $i <=10 ; $i++) {
$var=0;
$var=$num*$i;
echo "$num x $i = $var";
echo "</br>";
}


echo "</BODY>
</HTML>";
?>
