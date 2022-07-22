<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
    $correo = $_SESSION['correo']; 
    $result = $mysqli->query("select distinct (nombre),codcurso from cursos where 1 ");

    //while($row = $result->fetch_assoc()) {
      //  var_dump($row['ciclo']);
       //}

?>
<div id="ver_horarios_por_curso" style="display: none; width: 80%;margin-left: auto;margin-right: auto;padding: 10px;">
	<h2>Elija un curso para ver su horario de este ciclo</h2>
	<form class="form-horizontal" action="admin/ver_horarios_por_curso_post.php" method="post">

		<label>Curso:</label>
		 <select name="codcurso" class="form-control" style="width: 500px;">
                <?php 
                while($row = $result->fetch_assoc()) {
   
                echo "<option value='".$row['codcurso']."'> ".$row['codcurso']."-".$row['nombre']."</option>";

                }
                ?>
            </select>

         <br>
         <br>
          <button class="btn btn-lg btn-info btn-block" type="submit">Ver Horario</button>
	</form>
</div>