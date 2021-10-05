
<?php
echo "<HTML>
<HEAD><TITLE>Inditex<</TITLE></HEAD>
<BODY>";

echo "<H1>EMPRESAS</H1>";



$empresas = array (
"Inditex" => array(31.790, -0.41, -0.13, 501365,15848288.11),
"Repsol"=>array(1.887,0.11,0.0,568323,1066263.99),
"Cepsa"=>array(43.357,0.41,0.23,342743,456243.25),
"Endesa"=>array(1.54,0.12,0.5,23541,316435.43),
"Mapfre"=>array(34.364,0.43,0.2,568323,254624.59),
"Corte Inglés"=>array(45.462,0.11,0.5,62545,73457.45));

// echo "Precio ".$empresas['Inditex'][0]." Variación: ".$empresas['Inditex'][1]." Var: ".$empresas['Inditex'][2]." Vol (títulos):".$empresas['Inditex'][3]."Vol (€):
// ".$empresas['Inditex'][4]."<BR>";
// echo "Precio ".$empresas['Mapfre'][0]." Variación: ".$empresas['Mapfre'][1]." Var: ".$empresas['Mapfre'][2]." Vol (títulos):".$empresas['Mapfre'][3]."Vol (€):
// ".$empresas['Mapfre'][4]."<BR>";
echo "<table border=1;>";
foreach($empresas as $clave => $valor)
{
echo"<tr>";
   echo "<td>".$clave."</td>";

 foreach ($valor as $indice => $i)

      echo "<td>"." ".$i."</td>";
echo"</tr>";

}


echo"</table>";
echo "</BODY>
</HTML>";
?>
