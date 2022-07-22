<?php 
	header('Content-Type: text/html; charset=ISO-8859-1');
    $correo = $_SESSION['correo']; 
	$result = $mysqli->query("select distinct (ciclo) from horarios where 1 ");

    //while($row = $result->fetch_assoc()) {
      //  var_dump($row['ciclo']);
       //}
?>


<div id="ver_estadisticas_div" style="display: none;">
	<form class="form-horizontal" action="cliente/sql_ver_estadisticas.php" method="post">
          <div style="width: 50%;margin-right: auto;margin-left: auto;">
          <h2>Estadisticas de Horarios</h2>
         	<input type="text" class="form-control"  name="correo" value="<?php echo $correo;?>" style="display: none;"></input>
           <label>Seleccione el Ciclo:</label>
            <select name="ciclo" class="form-control" style="width: 500px;">
                <?php 
                while($row = $result->fetch_assoc()) {
    
                echo "<option value='".$row['ciclo']."'>".$row['ciclo']."</option>";

                }
                ?>
            </select>
            </div>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 50%;margin-left: auto;margin-right: auto">Ver Horario</button>

      </form>
    </div>