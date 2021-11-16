<?php

function combinacion (){

	$combinacion=array();
	$x = 0;
	while ($x<7) {
		$num_aleatorio = rand(1,49);
		if (!in_array($num_aleatorio,$combinacion)) {
			array_push($combinacion,$num_aleatorio);
			$x++;
		}
	}
	$numaleatorio = rand(0,9);
	array_push($combinacion,$numaleatorio);

	// var_dump($combinacion);
	return $combinacion;
}

function verfichero($fichero){
	echo "<table border=1><tr>";
	foreach($fichero as $linea=>$texto) {
		echo "<td>".$texto."</tr>";
	};

	echo "</td></table>";
}

function numerosfichero ($fichero,$array){

	$cont0=$cont1=$cont2=$cont3=$cont4=$cont5=$cont5c=$cont6=0;
	foreach($fichero as $linea=>$texto) {
			$cont=0;
		if ($linea>0) {

			$dividir= explode("-",$texto);
			$id=$dividir[0];
			$num1=intval($dividir[1]);
			$num2=intval($dividir[2]);
			$num3=intval($dividir[3]);
			$num4=intval($dividir[4]);
			$num5=intval($dividir[5]);
			$num6=intval($dividir[6]);
			$c=intval($dividir[7]);
			$r=intval($dividir[8]);

			unset($dividir[8]);
		// echo "NUMEROS QUE HAN COINCIDIDO DEL JUGADOR ".$id."<br>";
			for ($i=0; $i <sizeof($array)-1 ; $i++) {
				for ($i=1; $i < sizeof($dividir)-1 ; $i++) {
					if (in_array($array[$i],$dividir)) {
						$cont++;

						// echo $array[$i] ." <br>";
					}
									// echo "!!"."$cont" ." <br>";
				}

			}
		}
		$final=end($array);

			for ($j=0; $j <7 ; $j++) {

		if ($cont==$j) {
		${"cont".$j}++;
		}
		if ($cont==5) {
			if ($final==$r) {
		$cont5c++;
			}
		}
		}

	};
	$linea=$linea-1;
	echo "Apuestas jugadas: ".$linea."<br>";
echo "Acertantes 6 numeros: ".$cont6."<br>";
echo "Acertantes 5 numeros + Complementario: ".$cont5c."<br>";
echo "Acertantes 5 numeros: ".$cont5."<br>";
echo "Acertantes 4 numeros: ".$cont4."<br>";
echo "Acertantes 3 numeros: ".$cont3."<br>";
echo "Acertantes 2 numeros: ".$cont2."<br>";
echo "Acertantes 1 numeros: ".$cont1."<br>";
echo "Acertantes 0 numeros: ".$cont0."<br>";



}



















?>
