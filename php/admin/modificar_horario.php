

<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
    $correo = $_SESSION['correo']; 
    $result = $mysqli->query("select distinct (nombre),codcurso from cursos where 1 ");

    //while($row = $result->fetch_assoc()) {
      //  var_dump($row['ciclo']);
       //}

?>
<div id="modificar_horario_div" style="display: none; width: 80%;margin-left: auto;margin-right: auto;padding: 10px;">
	<h2>Busque el curso y campus donde modificar&aacute; el horario</h2>
	<form class="form-horizontal" action="admin/modificar_horarios_curso.php" method="post">

		<label>Curso:</label>
		 <select name="codcurso" class="form-control" style="width: 500px;">
                <?php 
                while($row = $result->fetch_assoc()) {
   
                echo "<option value='".$row['codcurso']."'> ".$row['codcurso']."-".$row['nombre']."</option>";

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
          <button class="btn btn-lg btn-success btn-block" type="submit">Ir a modificar</button>
	</form>
</div>