<?php 
header('Content-Type: text/html; charset=ISO-8859-1');

date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$correo=$_POST['correo'];
	$ciclo=$_POST['ciclo'];

	//var_dump($correo);
	//var_dump($ciclo);

	$result = $mysqli->query("select docentes.iddocente,dia,hora_inicio,hora_fin,codcurso from docentes inner join horarios on horarios.iddocente=docentes.iddocente and docentes.correo='".$correo."' and ciclo='".$ciclo."'");

    	
    	$dia=[];
    	$horas=[];
        $codcurso=[];

       while($row = $result->fetch_assoc()) {
       	$iddocente=$row['iddocente'];
       	array_push($dia, $row['dia']);
        array_push($horas, $row['hora_inicio']."-".$row['hora_fin']);
        array_push($codcurso,$row['codcurso']);
        
       
       }
       //var_dump($dia);
       //var_dump($horas);
       //var_dump($codcurso);
       
       $nombre_curso=[];
       for ($i=0; $i <sizeof($codcurso) ; $i++) { 
        $result = $mysqli->query("select nombre from cursos where codcurso='".$codcurso[$i]."'");
        if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc();
        array_push($nombre_curso,$row['nombre']);
    }
    }
    //var_dump($nombre_curso);
    //var_dump($iddocente);
    $result = $mysqli->query("SELECT uactualizacion from disponibilidad where iddocente='".$iddocente."'");

        if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc();
       
		$uactualizacion=$row['uactualizacion'];
		}
		//var_dump($uactualizacion);

	$result = $mysqli->query("select docentes.horas_min,docentes.horas_max,codcurso,uactualizacion,time(sum(horarios.hora_fin-horarios.hora_inicio)) as 
		horas_dictadas from docentes inner join horarios on
 		horarios.iddocente=docentes.iddocente and docentes.correo='".$correo."' and ciclo='".$ciclo."'");
	if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc();
        	$horas_dictadas=$row['horas_dictadas'];

        }
        //var_dump($horas_dictadas);
	$pos_puntos=strpos($horas_dictadas, ":");
	$horas_dictadas=substr($horas_dictadas, 0,$pos_puntos);
	//var_dump($pos_puntos);
	//var_dump($horas_dictadas);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Menu cliente</title>
        <!--Se necesita este enlace para que funcione el Navbar de Boostrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="../js/jquery-3.5.1.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		 

    </head>
    <body>

<div class="container" id="ver_horario_2"  >
	<h2>Horario propuesto del ciclo <?php echo "$ciclo";?></h2>
	<div class="container" style="display: flex;">
		<table class="table table-bordered">
			<tr>
				<td>Lunes:</td>
				<?php 
					for ($i=0; $i <sizeof($dia) ; $i++) { 
						if ($dia[$i]=="LUNES") {
							echo "<td><p>".$horas[$i]."</p>
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
							<p>".$nombre_curso[$i]."</p></td>";
						}
						
					}
				?>
			</tr>
    
		</table>
			
		</div>

		<div class="container" style="border: solid 1px; margin-bottom: 10px; width: 35%;">

			<p>horas dictadas a la semana <?php echo "$horas_dictadas"; ?></p>
			<p>Ultima actualizacion de la fecha y hora <?php echo "$uactualizacion";?></p>
		</div>
		

</div>

    </body>
    </html>