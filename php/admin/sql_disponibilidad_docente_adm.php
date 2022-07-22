<?php
	date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//session_start();
       //var_dump($_POST);
		$i=0;
		$lunes=[];
		$martes=[];
		$miercoles=[];
		$jueves=[];
		$viernes=[];
		$sab=[];

		//recordar que los indices 0 y 1 del post son docente y ciclo
       foreach ($_POST as $dia => $valor) {
       	if($i==0){
   			$iddocente=$valor;
		}
		
		if($i==1){
			$ciclo=$valor;
		}
		//recordar restar los indices del viernes de 1 a 3pm
       	if ($i==2||$i==8||$i==14||$i==20||$i==26||$i==32||$i==38|| $i==43||$i==48||$i==54||$i==60||$i==66||$i==72||$i==78||$i==84||$i==90)  {
       	array_push($lunes, $valor);
       	}
    	if ($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39|| $i==44||$i==49||$i==55||$i==61||$i==67||$i==73||$i==79||$i==85||$i==91)  {
       	array_push($martes, $valor);
       	}   	
       	if ($i==4||$i==10||$i==16||$i==22||$i==28||$i==34||$i==40|| $i==45||$i==50||$i==56||$i==62||$i==68||$i==74||$i==80||$i==86||$i==92)  {
       	array_push($miercoles, $valor);
       	}
       	if ($i==5||$i==11||$i==17||$i==23||$i==29||$i==35||$i==41|| $i==46||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93)  {
       	array_push($jueves, $valor);
       	}

       	//tener cuidado hay 2 indices menos por la hora 1 a 3pm
       	if ($i==6||$i==12||$i==18||$i==24||$i==30||$i==36|| $i==52||$i==58||$i==64||$i==70||$i==76||$i==82||$i==88||$i==94)  {
       	array_push($viernes, $valor);
       	}
       	 if ($i==36) { //Se hace este if para llenar los indices vacios de los viernes
       		array_push($viernes, 'ND');
       		array_push($viernes, 'ND');
       	}
       	if ($i==7||$i==13||$i==19||$i==25||$i==31||$i==37||$i==42|| $i==47||$i==53||$i==59||$i==65||$i==71||$i==77||$i==83||$i==89||$i==95)  {
       	array_push($sab, $valor);
       	}
       
    	$i++;

}
	/*var_dump($lunes);
	var_dump($martes);
	var_dump($miercoles);
	var_dump($jueves);
	var_dump($viernes);
	var_dump($sab);
	var_dump($_POST);*/


 include_once ('funcion_horario.php');
 //var_dump(hora_ini_fin($lunes));
 $horas_lun=hora_ini_fin($lunes); //hacer lo mismo para martes miercoes juves etc
 $horas_mar=hora_ini_fin($martes);
 $horas_mie=hora_ini_fin($miercoles);
 $horas_jue=hora_ini_fin($jueves);
 $horas_vie=hora_ini_fin($viernes);
 $horas_sab=hora_ini_fin($sab);


$cont=0;
 //los indices sirven para saber en que sede escogio al compararlo con el arreglo dia ($lunes,$martes,....)
if(!is_null($horas_lun)){
 $dia="LUNES";
 $lun_ind_hora_ini=$horas_lun[0]; 
 $lun_ind_hora_fin=$horas_lun[1];
 $lun_str_hora_ini=$horas_lun[2];
 $lun_str_hora_fin=$horas_lun[3];

 for ($i=0; $i <sizeof($lun_str_hora_ini) ; $i++) { 

       $sql = "INSERT INTO disponibilidad(iddocente, dia, hora_inicio, hora_fin, ciclo,campus) VALUES ('$iddocente','$dia','".$lun_str_hora_ini[$i].":00:00','".$lun_str_hora_fin[$i].":00:00','$ciclo','".$lunes[$lun_ind_hora_ini[$i]]."')";
      
      if($mysqli->query($sql)){
      	$cont++;
      }
	}
}

if(!is_null($horas_mar)){
 $dia="MARTES";
 $mar_ind_hora_ini=$horas_mar[0]; 
 $mar_ind_hora_fin=$horas_mar[1];
 $mar_str_hora_ini=$horas_mar[2];
 $mar_str_hora_fin=$horas_mar[3];

 for ($i=0; $i <sizeof($mar_str_hora_ini) ; $i++) { 

       $sql = "INSERT INTO disponibilidad(iddocente, dia, hora_inicio, hora_fin, ciclo,campus) VALUES ('$iddocente','$dia','".$mar_str_hora_ini[$i].":00:00','".$mar_str_hora_fin[$i].":00:00','$ciclo','".$martes[$mar_ind_hora_ini[$i]]."')";
      
      if($mysqli->query($sql)){
      	$cont++;
      }
	}
}
if(!is_null($horas_mie)){
 $dia="MIERCOLES";
 $mie_ind_hora_ini=$horas_mie[0]; 
 $mie_ind_hora_fin=$horas_mie[1];
 $mie_str_hora_ini=$horas_mie[2];
 $mie_str_hora_fin=$horas_mie[3];
 for ($i=0; $i <sizeof($mie_str_hora_ini) ; $i++) { 

       $sql = "INSERT INTO disponibilidad(iddocente, dia, hora_inicio, hora_fin, ciclo,campus) VALUES ('$iddocente','$dia','".$mie_str_hora_ini[$i].":00:00','".$mie_str_hora_fin[$i].":00:00','$ciclo','".$miercoles[$mie_ind_hora_ini[$i]]."')";
      
      if($mysqli->query($sql)){
      	$cont++;
      }
	}
}

if(!is_null($horas_jue)){
 $dia="JUEVES";
 $jue_ind_hora_ini=$horas_jue[0]; 
 $jue_ind_hora_fin=$horas_jue[1];
 $jue_str_hora_ini=$horas_jue[2];
 $jue_str_hora_fin=$horas_jue[3];
 for ($i=0; $i <sizeof($jue_str_hora_ini) ; $i++) { 

       $sql = "INSERT INTO disponibilidad(iddocente, dia, hora_inicio, hora_fin, ciclo,campus) VALUES ('$iddocente','$dia','".$jue_str_hora_ini[$i].":00:00','".$jue_str_hora_fin[$i].":00:00','$ciclo','".$jueves[$jue_ind_hora_ini[$i]]."')";
      
      if($mysqli->query($sql)){
      	$cont++;
      }
	}
}
if(!is_null($horas_vie)){
 $dia="VIERNES";
 $vie_ind_hora_ini=$horas_vie[0]; 
 $vie_ind_hora_fin=$horas_vie[1];
 $vie_str_hora_ini=$horas_vie[2];
 $vie_str_hora_fin=$horas_vie[3];
 for ($i=0; $i <sizeof($vie_str_hora_ini) ; $i++) { 

       $sql = "INSERT INTO disponibilidad(iddocente, dia, hora_inicio, hora_fin, ciclo,campus) VALUES ('$iddocente','$dia','".$vie_str_hora_ini[$i].":00:00','".$vie_str_hora_fin[$i].":00:00','$ciclo','".$viernes[$vie_ind_hora_ini[$i]]."')";
      
      if($mysqli->query($sql)){
      	$cont++;
      }
	}
}
if(!is_null($horas_sab)){
 $dia="SABADO";
 $sab_ind_hora_ini=$horas_sab[0]; 
 $sab_ind_hora_fin=$horas_sab[1];
 $sab_str_hora_ini=$horas_sab[2];
 $sab_str_hora_fin=$horas_sab[3];
 for ($i=0; $i <sizeof($sab_str_hora_ini) ; $i++) { 

       $sql = "INSERT INTO disponibilidad(iddocente, dia, hora_inicio, hora_fin, ciclo,campus) VALUES ('$iddocente','$dia','".$sab_str_hora_ini[$i].":00:00','".$sab_str_hora_fin[$i].":00:00','$ciclo','".$sab[$sab_ind_hora_ini[$i]]."')";
      
      if($mysqli->query($sql)){
      	$cont++;
      }
	}
}

//$cont_total=sizeof($lun_str_hora_ini)+sizeof($mar_str_hora_ini)+sizeof($mie_str_hora_ini)+sizeof($jue_str_hora_ini)+sizeof($vie_str_hora_ini)+sizeof($sab_str_hora_ini);
 
 echo '<script language =javascript>
     	alert("Se ha ingresado su disponibilidad horaria correctamente")
   		self.location = "../menu_cliente.php"</script>';
               

}

//los str me sirven para poder subir la hora a la base de datos solo falta aumentra ":00"

//var_dump($lun_ind_hora_ini);
//var_dump($lun_ind_hora_fin);
//var_dump($lun_str_hora_ini);
//var_dump($lun_str_hora_fin);

//var_dump($lunes[$lun_ind_hora_ini[0]]); //['SM','SM','SM','ND','ND,'ND','MO','MO']
/*
echo "lunes";
var_dump($horas_lun);
echo "martes";
var_dump($horas_mar);
echo "miercoles";
var_dump($horas_mie);
echo "jueves";
var_dump($horas_jue);
echo "viernes";
var_dump($horas_vie);
echo "sabado";
var_dump($horas_sab);
var_dump($cont);
var_dump($ciclo);
var_dump($_POST);
*/
    ?>