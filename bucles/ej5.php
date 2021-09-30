
<?php
echo "<HTML>
<HEAD><TITLE> EJ5B – Tabla multiplicar con TD</TITLE></HEAD>
<BODY>
<table border=1;>";
$num="8";
echo"La tabla de multiplicar del $num es:";

for ($i=0; $i <=10 ; $i++) {
$var=0;
$var=$num*$i;
echo "<tr>";
echo "<td>$num x $i</td>";

echo"<td>$var</td>";
echo "</tr>";

}


echo "</table>
</BODY>
</HTML>";
?>
