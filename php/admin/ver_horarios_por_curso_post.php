<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
    date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();
  	session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codcurso=$_POST['codcurso'];
        //var_dump($_POST);


$result = $mysqli->query("SELECT * from horarios where codcurso='$codcurso' and sede='SM' and ciclo='2020-2'");

		$dia=[];
    	$horas=[];
        $aula=[];

       while($row = $result->fetch_assoc()) {
       	array_push($dia, $row['dia']);
        array_push($horas, $row['hora_inicio']."-".$row['hora_fin']);
        array_push($aula,$row['aula']);
        
       
       }
       /*var_dump($dia);
       var_dump($horas);
       var_dump($codcurso);
       var_dump($aula);*/

       if (empty($dia) || empty($horas) || empty($aula)) {
       		 echo '<script language =javascript>
            alert("Aun no existe horarios para esta seccion")
            self.location = "../menu_admin.php"</script>';
       }

       
        $result = $mysqli->query("select nombre from cursos where codcurso='".$codcurso."'");
        if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc(); 
        	$nombre_curso=$row['nombre'];  
        
    	}
   }
    //var_dump($nombre_curso);



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
		<h2>Horarios del curso <?php echo "$nombre_curso";?> en la sede San Miguel</h2>
		<div class="container" style="display: flex;">
			<table class="table table-bordered">
				<tr>
					<td>Lunes:</td>
					<?php 
						for ($i=0; $i <sizeof($dia) ; $i++) { 
							if ($dia[$i]=="LUNES") {
								echo "<td><p>".$horas[$i]."</p>
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
								<p>".$aula[$i]."</p>";
							}
							
						}
					?>
				</tr>
	    
			</table>
				
			</div>


		<?php 
		$result = $mysqli->query("SELECT * from horarios where codcurso='$codcurso' and sede='MO' and ciclo='2020-2'");

		$dia=[];
    	$horas=[];
        $aula=[];

       while($row = $result->fetch_assoc()) {
       	array_push($dia, $row['dia']);
        array_push($horas, $row['hora_inicio']."-".$row['hora_fin']);
        array_push($aula,$row['aula']);
        
       
       }
       /*var_dump($dia);
       var_dump($horas);
       var_dump($codcurso);
       var_dump($aula);*/

       
        $result = $mysqli->query("select nombre from cursos where codcurso='".$codcurso."'");
        if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc(); 
        	$nombre_curso=$row['nombre'];  
        
    	}
   
    	//var_dump($nombre_curso);


			?>

<div class="container">
		<h2>Horarios del curso <?php echo "$nombre_curso";?> en la sede Monterrico</h2>
		<div class="container" style="display: flex;">
			<table class="table table-bordered">
				<tr>
					<td>Lunes:</td>
					<?php 
						for ($i=0; $i <sizeof($dia) ; $i++) { 
							if ($dia[$i]=="LUNES") {
								echo "<td><p>".$horas[$i]."</p>
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