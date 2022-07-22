<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
    date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();
  	session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $carrera=$_POST['carrera'];
        //var_dump($_POST);

        $result = $mysqli->query("SELECT horarios.codcurso,horarios.dia,horarios.hora_inicio,horarios.hora_fin, horarios.aula,cursos.nombre,cursos.ciclo FROM horarios inner join cursos on horarios.codcurso=cursos.codcurso and (cursos.carrera='$carrera' or cursos.carrera='ambas') and horarios.sede='SM' and horarios.ciclo='2020-2'");

		$dia=[];
    	$horas=[];
        $aula=[];
        $nombre_curso=[];
        $ciclo_curso=[];

       while($row = $result->fetch_assoc()) {
       	array_push($dia, $row['dia']);
        array_push($horas, $row['hora_inicio']."-".$row['hora_fin']);
        array_push($aula,$row['aula']);
        array_push($nombre_curso,$row['nombre']);
        array_push($ciclo_curso,$row['ciclo']);
        //var_dump($row);
        
       
       }
       /*var_dump($dia);
       var_dump($horas);
       var_dump($aula);
       var_dump($nombre_curso);*/

       if (empty($dia) || empty($horas) || empty($aula)) {
       		echo '<script language =javascript>
            alert("Aun no existe horarios para las opciones elegidas")
            self.location = "../menu_admin.php"</script>';
       }


  }
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ingresar horario de un curso</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

      <script src="../js/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>
	<div class="container">
		<h2>Horario de todos los cursos de la carrera de <?php echo "$carrera";?> en la sede San Miguel</h2>
		<div class="container" style="display: flex;">
			<table class="table table-bordered">
				<tr>
					<td>Lunes:</td>
					<?php 
						for ($i=0; $i <sizeof($dia) ; $i++) { 
							if ($dia[$i]=="LUNES") {
								echo "<td><p>".$horas[$i]."</p>
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
							}
							
						}
					?>
				</tr>
	    
			</table>
				
			</div>
		</div>


<?php 
$result = $mysqli->query("SELECT horarios.codcurso,horarios.dia,horarios.hora_inicio,horarios.hora_fin, horarios.aula,cursos.nombre FROM horarios inner join cursos on horarios.codcurso=cursos.codcurso and (cursos.carrera='$carrera' or cursos.carrera='ambas') and horarios.sede='MO' and horarios.ciclo='2020-2'");

		$dia=[];
    	$horas=[];
        $aula=[];
        $nombre_curso=[];

       while($row = $result->fetch_assoc()) {
       	array_push($dia, $row['dia']);
        array_push($horas, $row['hora_inicio']."-".$row['hora_fin']);
        array_push($aula,$row['aula']);
        array_push($nombre_curso,$row['nombre']);
        //var_dump($row);
        
       
       }
       /*var_dump($dia);
       var_dump($horas);
       var_dump($aula);
       var_dump($nombre_curso);*/

       if (empty($dia) || empty($horas) || empty($aula)) {
       		 echo '<script language =javascript>
            alert("Aun no existe horarios para las opciones elegidas")
            self.location = "../menu_admin.php"</script>';
            
       }


	
?>
<div class="container">
		<h2>Horarios de todos los cursos la carrera de <?php echo "$carrera";?> en la sede Monterrico</h2>
		<div class="container" style="display: flex;">
			<table class="table table-bordered">
				<tr>
					<td>Lunes:</td>
					<?php 
						for ($i=0; $i <sizeof($dia) ; $i++) { 
							if ($dia[$i]=="LUNES") {
								echo "<td><p>".$horas[$i]."</p>
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
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
								<p>".$nombre_curso[$i]."</p>
								<p>ciclo ".$ciclo_curso[$i]."</p>
								<p>".$aula[$i]."</p>";
							}
							
						}
					?>
				</tr>
	    
			</table>
				
			</div>
		</div>
	</body>
</html>