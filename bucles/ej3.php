
<?php
echo "<HTML>
<HEAD><TITLE> EJ3B – Conversor Decimal a base 16</TITLE></HEAD>
<BODY>";
$num="222";
echo "$num";
$valores=array('0','1','2','3','4','5','6','7',
               '8','9','A','B','C','D','E','F');
$val='';
while ($num != '0') {
  $val=$valores[bcmod($num,'16')].$val;
  $num=bcdiv($num,'16',0);
}
  echo " </br> En base 16 es:$val";
echo "</BODY>
</HTML>";
?>
