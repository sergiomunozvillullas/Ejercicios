
<?php
echo "<HTML>
<HEAD><TITLE>Inditex</TITLE></HEAD>
<BODY>";


echo "<H1>EMPRESAS</H1>";
echo "<H2>Sergio Muñoz Villullas</H2>";
echo "<table border=1;>";

// echo "Precio ".$empresas['Inditex'][0]." Variación: ".$empresas['Inditex'][1]." Var: ".$empresas['Inditex'][2]." Vol (títulos):".$empresas['Inditex'][3]."Vol (€):
// ".$empresas['Inditex'][4]."<BR>";
// echo "Precio ".$empresas['Mapfre'][0]." Variación: ".$empresas['Mapfre'][1]." Var: ".$empresas['Mapfre'][2]." Vol (títulos):".$empresas['Mapfre'][3]."Vol (€):
// ".$empresas['Mapfre'][4]."<BR>";
for ($j=1; $j <=9; $j++) {
    $empresa="Empresa ".$j;
    $empresas = array (
  $empresa=> (array(rand(0,100),rand(0,100),rand(0,100),rand(0,100),rand(0,100))));

foreach($empresas as $clave => $valor)
{
echo"<tr>";
   echo "<td>".$empresa."</td>";

 foreach ($valor as $indice)

      echo "<td>"." ".$indice."</td>";
echo"</tr>";
}
}


echo"</table>";
echo "</BODY>
</HTML>";
?>
