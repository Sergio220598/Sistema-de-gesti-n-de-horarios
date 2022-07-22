<?php 


$result = $mysqli->query("SELECT * from horarios where tipo_aula='LABORATORIO' and ciclo='2020-2'");

		$dia=[];
    	$horas=[];
        $codcurso=[];
        $aula=[];

       while($row = $result->fetch_assoc()) {
       	array_push($dia, $row['dia']);
        array_push($horas, $row['hora_inicio']."-".$row['hora_fin']);
        array_push($codcurso,$row['codcurso']);
        array_push($aula,$row['aula']);
        
       
       }
       //var_dump($dia);
       //var_dump($horas);
       //var_dump($codcurso);
       //var_dump($aula);

       $nombre_curso=[];
       for ($i=0; $i <sizeof($codcurso) ; $i++) { 
        $result = $mysqli->query("select nombre from cursos where codcurso='".$codcurso[$i]."'");
        if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc();   
        array_push($nombre_curso,$row['nombre']);
    }
    }
    //var_dump($nombre_curso);

//Sirve para que no se repitan las aulas en el arreglo
$result = $mysqli->query("SELECT distinct(aula) FROM horarios WHERE tipo_aula='LABORATORIO' and ciclo='2020-2'");

        $dic_aula=[];

       while($row = $result->fetch_assoc()) {
        array_push($dic_aula,$row['aula']);
       
       }



    $horas_dictadas=[];
	for ($i=0; $i <sizeof($dic_aula) ; $i++) {

    $result = $mysqli->query("select time(sum(horarios.hora_fin-horarios.hora_inicio)) as 
		horas_dictadas from horarios where aula='".$dic_aula[$i]."'");

	if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc();
        	array_push($horas_dictadas, $row['horas_dictadas']);

        }
    }
     //var_dump($horas_dictadas);
	//$pos_puntos=strpos($horas_dictadas, ":");
	//$horas_dictadas=substr($horas_dictadas, 0,$pos_puntos);
	//var_dump($pos_puntos);
	//var_dump($horas_dictadas);


?>


<div class="container" id="ver_ocupabilidad_div" style="display: none;" >
	<h2>Ocupabilidad de Laboratorios</h2>
	<div class="container" style="display: flex;">
		<table class="table table-bordered">
			<tr>
				<td>Lunes:</td>
				<?php 
					for ($i=0; $i <sizeof($dia) ; $i++) { 
						if ($dia[$i]=="LUNES") {
							echo "<td><p>".$horas[$i]."</p>
							<p>".$aula[$i]."</p>
							<p>".$nombre_curso[$i]."</p></td>";
						}
						
					}
				?>
			</tr>

			<tr>
				<td>Martes:</td>
				<?php 
					for ($i=0; $i <sizeof($dia) ; $i++) { 
						if ($dia[$i]=="MARTES") {
							echo "<td><p>".$horas[$i]."</p>
							<p>".$aula[$i]."</p>
							<p>".$nombre_curso[$i]."</p></td>";
						}
						
					}
				?>
			</tr>

			<tr>
				<td>Miercoles:</td>
				<?php 
					for ($i=0; $i <sizeof($dia) ; $i++) { 
						if ($dia[$i]=="MIERCOLES") {
							echo "<td><p>".$horas[$i]."</p>
							<p>".$aula[$i]."</p>
							<p>".$nombre_curso[$i]."</p></td>";
						}
						
					}
				?>
			</tr>

			<tr>
				<td>Jueves:</td>
				<?php 
					for ($i=0; $i <sizeof($dia) ; $i++) { 
						if ($dia[$i]=="JUEVES") {
							echo "<td><p>".$horas[$i]."</p>
							<p>".$aula[$i]."</p>
							<p>".$nombre_curso[$i]."</p></td>";
						}
						
					}
				?>
			</tr>

			<tr>
				<td>Viernes:</td>
				<?php 
					for ($i=0; $i <sizeof($dia) ; $i++) { 
						if ($dia[$i]=="VIERNES") {
							echo "<td><p>".$horas[$i]."</p>
							<p>".$aula[$i]."</p>
							<p>".$nombre_curso[$i]."</p></td>";
						}
						
					}
				?>
			</tr>

			<tr>
				<td>Sabado:</td>
				<?php 
					for ($i=0; $i <sizeof($dia) ; $i++) { 
						if ($dia[$i]=="SABADO") {
							echo "<td><p>".$horas[$i]."</p>
							<p>".$aula[$i]."</p>
							<p>".$nombre_curso[$i]."</p></td>";
						}
						
					}
				?>
			</tr>
    
		</table>
			
		</div>

		<div class="container" style="border: solid 1px; margin-bottom: 10px; width: 35%;">

		<?php 

		for ($i=0; $i <sizeof($horas_dictadas) ; $i++) { 
			$pos_puntos=strpos($horas_dictadas[$i], ":");
			$horas_dictadas_2=substr($horas_dictadas[$i], 0,$pos_puntos);
			echo "<p>Horas dictadas en el Laboraorio ".$dic_aula[$i].":".$horas_dictadas_2." horas </p>";
		}
		/*$var=1;
		$dias_rep=[];
		for ($i=0; $i <sizeof($dia) ; $i++) { 
				for ($j=0; $j <sizeof($dia) ; $j++) { 
						if ($dia[$i]==$dia[$j]) {
							array_push($dias_rep, $i);
						}

				}
				$var++;
		}*/

		$lun_dia=[];$mar_dia=[];$mie_dia=[];$jue_dia=[];$vie_dia=[];
		$sab_dia=[];

		for ($i=0; $i <sizeof($dia) ; $i++) {
			if($dia[$i]=="LUNES"){
				array_push($lun_dia, $i);
			} 
			if($dia[$i]=="MARTES"){
				array_push($mar_dia, $i);
			} 
			if($dia[$i]=="MIERCOLES"){
				array_push($mie_dia, $i);
			} 
			if($dia[$i]=="JUEVES"){
				array_push($jue_dia, $i);
			} 
			if($dia[$i]=="VIERNES"){
				array_push($vie_dia, $i);
			} 
			if($dia[$i]=="SABADO"){
				array_push($sab_dia, $i);
			} 
			
		}
		//var_dump($mie_dia);

		//echo "dias";
	//var_dump($dias_rep);
		

		?>
		</div>
</div>