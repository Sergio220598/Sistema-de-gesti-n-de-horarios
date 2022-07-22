<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
    $correo = $_SESSION['correo']; 
    $result = $mysqli->query("select distinct (nombre),codcurso from cursos where 1 ");

    //while($row = $result->fetch_assoc()) {
      //  var_dump($row['ciclo']);
       //}

?>
<div id="crear_horario_div" style="display: none; width: 80%;margin-left: auto;margin-right: auto;padding: 10px;">
	<h2>Busque el curso y campus donde crear&aacute; el nuevo horario</h2>
	<form class="form-horizontal" action="admin/ingreso_horarios_curso.php" method="post">
		<label>Curso:</label>
		 <select name="curso" class="form-control" style="width: 500px;">
                <?php 
                while($row = $result->fetch_assoc()) {
   
                echo "<option value='".$row['nombre']."'> ".$row['codcurso']."-".$row['nombre']."</option>";

                }
                ?>
            </select>
         <br>
         <label>Campus:</label>
		 <select name="campus" class="form-control">
         	<option value='SM'>San Miguel</option>
        	 <option value='MO'>Monterrico</option>
        </select>
         <br>
         <br>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Ir a crear</button>
	</form>
</div>