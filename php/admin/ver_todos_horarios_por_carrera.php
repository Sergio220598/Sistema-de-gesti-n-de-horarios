<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
    $correo = $_SESSION['correo']; 
    $result = $mysqli->query("select distinct (nombre ),codcurso from cursos where 1 ");

    //while($row = $result->fetch_assoc()) {
      //  var_dump($row['ciclo']);
       //}

?>
<div id="ver_todos_horarios_por_carrera" style="display: none; width: 80%;margin-left: auto;margin-right: auto;padding: 10px;">
	<h2>Elija una carrera para ver sus horarios de todos los cursos</h2>
	<form class="form-horizontal" action="admin/ver_todos_horarios_por_carrera_post.php" method="post">

      		<label>Carrera:</label>
      		 <select name="carrera" class="form-control" style="width: 500px;">
            <option value="Ing. Electronica">Ing. Electronica</option>  
            <option value="Ing. Mecatronica">Ing. Mecatronica</option>  
            </select>
            <br>
          
         <br>
          <button class="btn btn-lg btn-info btn-block" type="submit">Ver Horario</button>
	</form>
</div>