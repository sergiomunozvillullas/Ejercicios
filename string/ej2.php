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

$var1=substr($ip,0,3);
echo "$var1.";
$var2=substr($ip,4,2);
echo "$var2.";
$var3=substr($ip,7,2);
echo "$var3.";
$var4=substr($ip,10,13);
echo "$var4";

echo "</br>";
echo "IP en binario: ";


echo decbin($var1);
echo ".";
echo decbin($var2);
echo ".";
echo decbin($var3);
echo ".";
echo decbin($var4);

?>
</BODY>
</HTML>
