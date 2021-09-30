
<?php
echo "<HTML>
<HEAD><TITLE> EJ6B – Factorial</TITLE></HEAD>
<BODY>";

$num="5";
echo"El factorial de $num es:";


$factorial = 1;
 for ($i = 1; $i <= $num; $i++){
   $factorial = $factorial * $i;
 }
echo"$factorial";



echo "</BODY>
</HTML>";
?>
