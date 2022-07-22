
<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
    $correo = $_SESSION['correo']; 
    $result = $mysqli->query("select distinct (nombre),codcurso from cursos where 1 ");

    //while($row = $result->fetch_assoc()) {
      //  var_dump($row['ciclo']);
       //}

?>
<div id="eliminar_horario_div" style="display: none; width: 80%;margin-left: auto;margin-right: auto;padding: 10px;">
	<h2>Busque el curso y campus donde eliminar&aacute; el horario</h2>
    <h4 class="text-info"><i>Recuerde que puede ver los horarios actuales en la opci&oacute;n modificar curso</i></h4>
	<form class="form-horizontal" action="admin/sql_eliminar_horarios_curso.php" method="post">

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
            <h6 class="text-center" style="color:red">*Al presionar el bot&oacute;n automaticamente se eliminar&aacute; la secci&oacute;n</h6>
          <button class="btn btn-lg btn-danger btn-block" type="submit">Eliminar Horario</button>
	</form>
</div>