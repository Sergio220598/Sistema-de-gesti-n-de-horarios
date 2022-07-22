<?php
function hora_ini_fin($dia){
	$aux_hora=[];
	//$aux_campus=[];

	for ($i=0; $i <sizeof($dia) ; $i++) { 
		if ($dia[$i]!='ND') {
			array_push($aux_hora, $i);
			//array_push($aux_campus, $dia[$i]);
		}	

	}
	if(empty($aux_hora)){ //si aux_hora esta vacio es porque se ha marcado no disponible en todos los campos
	return null;	
	}
	else{
	$hora_ini=[];
	$hora_fin=[];
	array_push($hora_ini, $aux_hora[0]);//agrego el primer valor

	for ($i=0; $i <sizeof($aux_hora) ; $i++) {
		if ($aux_hora[$i]==max($aux_hora)) {
			break;
		}
		
		else if ($aux_hora[$i+1]-$aux_hora[$i]!=1){
				array_push($hora_ini, $aux_hora[$i+1]);
				array_push($hora_fin, $aux_hora[$i]);
			}
		}
	

	array_push($hora_fin, $aux_hora[sizeof($aux_hora)-1]);//agrego el ultimo valor

	$horas_str=["7-8","8-9","9-10","10-11","11-12","12-13","13-14","14-15","15-16","16-17","17-18","18-19","19-20","20-21","21-22","22-23"];

	$str_hora_ini=[];
	for ($i=0; $i <sizeof($hora_ini) ; $i++) { 
		 $var=$horas_str[$hora_ini[$i]]; //obtengo "8-9"
		 $guion=strpos($var, "-"); //obtengo la posicion del guion
		 $var2=substr($var, 0,$guion);
		 array_push($str_hora_ini, $var2);
	}

	$str_hora_fin=[];
	for ($i=0; $i <sizeof($hora_fin) ; $i++) { 
		 $var3=$horas_str[$hora_fin[$i]]; //obtengo "14-15"
		 $guion=strpos($var3, "-"); //obtengo la posicion del guion
		 $var4=substr($var3, $guion+1,strlen($var3));
		 array_push($str_hora_fin, $var4);
	}
}

	return array($hora_ini,$hora_fin,$str_hora_ini,$str_hora_fin);
}

/*$aux_hora=[];
	$aux_campus=[];

	for ($i=0; $i <sizeof($lunes) ; $i++) { 
		if ($lunes[$i]!='ND') {
			array_push($aux_hora, $i);
			array_push($aux_campus, $lunes[$i]);
		}	

	}
	$hora_ini=[];
	$hora_fin=[];
	array_push($hora_ini, $aux_hora[0]);//agrego el primer valor

	for ($i=0; $i <sizeof($aux_hora) ; $i++) {
		if ($aux_hora[$i]==max($aux_hora)) {
			break;
		}
		
		else if ($aux_hora[$i+1]-$aux_hora[$i]!=1){
				array_push($hora_ini, $aux_hora[$i+1]);
				array_push($hora_fin, $aux_hora[$i]);
			}
		}
	

	array_push($hora_fin, $aux_hora[sizeof($aux_hora)-1]);//agrego el ultimo valor



	echo "hola";
	var_dump($aux_hora); //[1,2,3,  8,9,10]
	var_dump($aux_campus); //para saber el campus buscar en div_lunes los indices desde hora_ini hasta hora_fin
	echo "chau";
	var_dump($hora_ini); //[1,8] -> [8:00-9:00, 15:00-16:00]
	var_dump($hora_fin); //[3,10] -> [10:00-11:00, 17:00-18:00]
	//hora->[7-8,8-9,9-10,10-11,11-12,12-13,13-14,14-15,15-16,16-17,17-18,18-19,19-20,20-21,21-22,22-23]
	//indic-[0    1    2     3     4    5     6     7     8     9     10    11    12    13    14     15]
	 */
?>