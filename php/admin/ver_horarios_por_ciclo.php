<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
    $correo = $_SESSION['correo']; 
    $result = $mysqli->query("select distinct (nombre ),codcurso from cursos where 1 ");

    //while($row = $result->fetch_assoc()) {
      //  var_dump($row['ciclo']);
       //}

?>
<div id="ver_horarios_por_ciclo" style="display: none; width: 80%;margin-left: auto;margin-right: auto;padding: 10px;">
	<h2>Elija un ciclo y una carrera para ver sus horarios</h2>
	<form class="form-horizontal" action="admin/ver_horarios_por_ciclo_post.php" method="post">

      		<label>Carrera:</label>
      		 <select name="carrera" class="form-control" style="width: 500px;">
            <option value="Ing. Electronica">Ing. Electronica</option>  
            <option value="Ing. Mecatronica">Ing. Mecatronica</option>  
            </select>
            <br>
            <label>Ciclo:</label>
            <select name="ciclo_curso" class="form-control" style="width: 500px;">
               <?php 
                for ($i=1; $i <11 ; $i++) { 
   
                echo "<option value='".$i."'>".$i."</option>";

                }
                ?>
            </select>

         <br>
         <br>
          <button class="btn btn-lg btn-info btn-block" type="submit">Ver Horario</button>
	</form>
</div>