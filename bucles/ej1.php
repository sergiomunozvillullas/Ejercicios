
<?php
echo "<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario </TITLE></HEAD>
<BODY>";

$num="168";
echo "$num </br>";
echo"Lo pasamos a binario: ";
   $dividendo=$num;

while ($dividendo>0)
 {

   $resultado=$dividendo/2;
    $dividendo=$dividendo/2;
   $resto=$dividendo%2;
   echo "$resto";

 }

echo "</BODY>
</HTML>";
?>
