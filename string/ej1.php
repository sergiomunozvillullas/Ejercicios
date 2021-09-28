<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ip="192.18.16.204";





echo("IP: $ip");
echo "</br>";
echo "</br>";
echo "Primera parte de la ip($ip)=".substr($ip,0,3)."<br/>";
echo "Segunda parte de la ip($ip)=".substr($ip,4,2)."<br/>";
echo "Tercera parte de la ip($ip)=".substr($ip,7,2)."<br/>";
echo "Tercera parte de la ip($ip)=".substr($ip,10,13)."<br/>";
echo "</br>";
printf("Numero ".substr($ip,0,3)." se representa en binario como %b <br/>",substr($ip,0,3));
printf("Numero ".substr($ip,4,2)." se representa en binario como %b <br/>",substr($ip,4,2));
printf("Numero ".substr($ip,7,2)." se representa en binario como %b <br/>",substr($ip,7,2));
printf("Numero ".substr($ip,10,13)." se representa en binario como %b <br/>",substr($ip,10,13));
echo "</br>";
echo "La IP en binario es:";
printf("%b.",substr($ip,0,3));
printf("%b.",substr($ip,4,2));
printf("%b.",substr($ip,7,2));
printf("%b",substr($ip,10,13));


?>
</BODY>
</HTML>
