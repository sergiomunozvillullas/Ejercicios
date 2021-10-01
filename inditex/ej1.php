
<?php
echo "<HTML>
<HEAD><TITLE>Inditex<</TITLE></HEAD>
<BODY>";
$empresa="INDITEX";
echo "<H1>$empresa</H1>";


$inditex = [
    "Precio" => 31.790,
    "Variación" => -0.41."%",
    "Var" => -0.13."€",
    "Vol (títulos)" => 501365,
    "Vol (€)" => 15848288.11
];

foreach($inditex as $clave => $valor)
 {
    echo $clave.": ".$valor;
    echo "<br>";
 }




echo "</BODY>
</HTML>";
?>
