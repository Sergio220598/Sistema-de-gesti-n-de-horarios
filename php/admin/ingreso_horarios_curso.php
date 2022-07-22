<?php
   header('Content-Type: text/html; charset=ISO-8859-1');
    date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();
  session_start();//Saber si debes hacer un session start()
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $curso=$_POST['curso'];
        $campus =$_POST['campus'];

        $docente=[];
        $iddocente=[];
        $laboratorio=[];

        $result = $mysqli->query("select *from docentes where 1 ORDER BY apellidop ASC");
        while($row = $result->fetch_assoc()) {
        array_push($docente, $row['nombre']." ".$row['apellidop']);
        array_push($iddocente, $row['iddocente']);
        //var_dump($row['nombre']." ".$row['apellidop']);

       }

       $result = $mysqli->query("select *from Laboratorios where 1");
        while($row = $result->fetch_assoc()) {
        array_push($laboratorio, $row['nombre']);
        //var_dump($row['nombre']." ".$row['apellidop']);

       }

       $horas=[];
       //[teoria,practica,laboratorio,grupos]
       $result = $mysqli->query("select *from cursos where nombre='".$curso."'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        array_push($horas,$row['teoria']);
        array_push($horas,$row['practica']);
        array_push($horas,$row['laboratorio']);
        array_push($horas,$row['grupos']);
        $codcurso=$row['codcurso'];
    }
       //var_dump($docente);
       //var_dump($iddocente);
       //var_dump($laboratorio);
   
    //var_dump($curso);
    //var_dump($campus);
    //var_dump($correo);
    }
    //include "timeout.php";
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
        <h1>Creando una secci&oacute;n para el curso <?php echo "$curso";?>
         en el campus <?php echo "$campus";?></h1>
      </div>
      <div class = "container">
          <form action="sql_ingreso_horarios_curso.php" method="POST">
              <div class="form-inline">
                <label for="seccion">Ingrese el c&oacute;digo de la secci&oacute;n:</label>
                <input type="text" class="form-control" name="seccion">
                <label for="vacantes">Vacantes:</label>
                <input type="number" class="form-control" name="vacantes">

                <input type="text" class="form-control"  name="curso" value="<?php echo $curso;?>" style="display: none;"></input>

                <input type="text" class="form-control"  name="campus" value="<?php echo $campus;?>" style="display: none;"></input>

                <input type="text" class="form-control"  name="codcurso" value="<?php echo $codcurso;?>" style="display: none;"></input>


              </div>

               <?php
                if($horas[0]>0) //teoria
                {
                  echo '<div class = "form-inline">';
                  echo "<h2>Teor&iacute;a (".$horas[0]." horas):</h2>";
                  echo "</div>";
                  echo '<table class="table text-center">';
                  echo "<tr>";
                  echo '<td><label for = "te_inicio">Hora de inicio:</label></td>';
                  echo '<td><input type="time" class="form-control" name="te_inicio"/></td>';
                  echo '<td>D&iacute;a</td>';
                  echo '<td><label for = "aula_te">Aula:</td><td><label for="docente">Elija al docente:</label></td></tr>';
                  echo '<tr>';
                  echo '<td><label for = "te_inicio">Hora de t&eacute;rmino:</label></td>';
                  echo '<td><input type="time" class="form-control" name="te_fin"/></td>';
                  echo '<td><select class="form-control" name="te_dia">';
                  echo '<option value="lunes">Lunes</option>';
                  echo '<option value="martes">Martes</option>';
                  echo '<option value="miercoles">Mi&eacute;rcoles</option>';
                  echo '<option value="jueves">Jueves</option>';
                  echo '<option value="viernes">Viernes</option>';
                  echo '<option value="sabado">S&aacute;bado</option>';
                  echo '</select></td>';
                  echo '<td><select class="form-control text-center" name="aula_te">
                      <option value="teorica">Te&oacute;rica</option>
                      <option value="computo">C&oacute;mputo</option>';
           
                  for($i=0;$i<count($laboratorio);$i++)
                  {
                    echo "<option value='".$laboratorio[$i]."'>".$laboratorio[$i]."</option>";
                  }
                  echo "</select></td>";

                  echo "<td>";
                  echo '<select class="form-control text-center" name="te_docente">';
                  echo "<option value='ninguno'>Sin docente</option>";
                  for ($i=0; $i <sizeof($docente) ; $i++) { 
                    echo "<option value='".$iddocente[$i]."'>".$docente[$i]."</option>"; 
                  
                }
                echo "</select></td></tr></table>";
            }

 
             if($horas[1]>0) //practica
                {
                  echo '<div class = "form-inline">';
                echo "<h2>Pr&aacute;ctica (".$horas[1]." horas):</h2>";
                echo "</div>";
                echo '<table class="table text-center">';
                echo '<tr>';
                echo '<td><label for = "pr_inicio">Hora de inicio:</label></td>';
                echo '<td><input type="time" class="form-control" name="pr_inicio"/></td>';
                echo '<td>D&iacute;a</td>';
                echo '<td><label for = "aula_pr">Aula:</td>';
                echo '<td><label for="docente">Elija al docente:</label></td>';
               
                echo '</tr>';
                echo '<tr>';
                echo  '<td><label for = "pr_inicio">Hora de t&eacute;rmino:</label></td>';
                echo  '<td><input type="time" class="form-control" name="pr_fin"/></td>';
                echo  "<td>";
                echo  '<select class="form-control" name="pr_dia">';
                echo  '<option value="lunes">Lunes</option>';
                echo  '<option value="martes">Martes</option>';
                echo  '<option value="miercoles">Mi&eacute;rcoles</option>';
                echo  '<option value="jueves">Jueves</option>';
                echo  '<option value="viernes">Viernes</option>';
                echo  '<option value="sabado">S&aacute;bado</option>';
                      
                echo  "</select>";
                echo  "</td>";
                echo  '<td><select class="form-control text-center" name="aula_pr">';
                echo  '<option value="teorica">Te&oacute;rica</option>';
                echo  '<option value="computo">C&oacute;mputo</option>';
           
                  for($i=0;$i<count($laboratorio);$i++)
                  {
                    echo "<option value='".$laboratorio[$i]."'>".$laboratorio[$i]."</option>";
                  }
                  echo "</select></td>";

                  echo "<td>";
                  echo '<select class="form-control text-center" name="pr_docente">';
                  echo "<option value='ninguno'>Sin docente</option>";
                  for ($i=0; $i <sizeof($docente) ; $i++) { 
                    echo "<option value='".$iddocente[$i]."'>".$docente[$i]."</option>"; 
                  
                }
                echo "</select></td></tr></table>";
            }

            if($horas[2]>0) //laboratorio 1
                {
                   echo '<div class = "form-inline">';
                echo '<h2>Laboratorio Grupo 01('.$horas[2].' horas):</h2>';
                echo '</div>';
                echo '<table class="table text-center">';
                echo '<tr>';
                echo '<td><label for = "lb1_inicio">Hora de inicio:</label></td>';
                echo '<td><input type="time" class="form-control" name="lb1_inicio"/></td>';
                echo  '<td>D&iacute;a</td>';
                echo  '<td><label for = "aula_lb">Aula:</td>';
                echo  '<td><label for="docente">Elija al docente:</label></td>';
                echo  '</tr>';
                echo  '<tr>';
                echo  '<td><label for = "lb1_fin">Hora de t&eacute;rmino:</label></td>';
                echo  '<td><input type="time" class="form-control" name="lb1_fin"/></td>';
                echo  '<td>';
                echo  '<select class="form-control" name="lb1_dia">';
                echo  '<option value="lunes">Lunes</option>';
                echo  '<option value="martes">Martes</option>';
                echo  '<option value="miercoles">Mi&eacute;rcoles</option>';
                echo  '<option value="jueves">Jueves</option>';
                echo  '<option value="viernes">Viernes</option>';
                echo  '<option value="sabado">S&aacute;bado</option>';
                echo  '</select>';
                echo  '</td>';
                echo  '<td><select class="form-control text-center" name="aula_lb1">
                      <option value="teorica">Te&oacute;rica</option>
                      <option value="computo">C&oacute;mputo</option>';
           
                  for($i=0;$i<count($laboratorio);$i++)
                  {
                    echo "<option value='".$laboratorio[$i]."'>".$laboratorio[$i]."</option>";
                  }
                  echo "</select></td>";

                  echo "<td>";
                  echo '<select class="form-control text-center" name="lb1_docente">';
                  echo "<option value='ninguno'>Sin docente</option>";
                  for ($i=0; $i <sizeof($docente) ; $i++) { 
                    echo "<option value='".$iddocente[$i]."'>".$docente[$i]."</option>"; 
                  
                }
                echo "</select></td></tr></table>";
            }

            if($horas[3]>0) //grupos
                {
                 echo '<div class = "form-inline">';
                echo '<h2>Laboratorio Grupo 02 ('.$horas[2].' horas)</h2>';
                echo '</div>';
                echo '<table class="table text-center">';
                echo '<tr>';
                echo  '<td><label for = "lb2_inicio">Hora de inicio:</label></td>';
                echo  '<td><input type="time" class="form-control" name="lb2_inicio"/></td>';
                echo  '<td>D&iacute;a</td>';
                echo  '<td><label for = "aula_lb">Aula:</td>';
                echo  '<td><label for="docente">Elija al docente:</label></td>';
                echo '</tr>';
                echo '<tr>';
                echo  '<td><label for = "lb1_fin">Hora de t&eacute;rmino:</label></td>';
                echo  '<td><input type="time" class="form-control" name="lb2_fin"/></td>';
                echo  '<td>';
                echo   '<select class="form-control" name="lb2_dia">';
                echo   '<option value="lunes">Lunes</option>';
                echo   '<option value="martes">Martes</option>';
                echo   '<option value="miercoles">Mi&eacute;rcoles</option>';
                echo   '<option value="jueves">Jueves</option>';
                echo   '<option value="viernes">Viernes</option>';
                echo   '<option value="sabado">S&aacute;bado</option>';
                      
                echo  '</select>';
                echo  '</td>';
                echo  '<td><select class="form-control" name="aula_lb2">';     
                echo  '<option value="teorica">Te&oacute;rica</option>';
                echo  '<option value="computo">C&oacute;mputo</option>';
           
                  for($i=0;$i<count($laboratorio);$i++)
                  {
                    echo "<option value='".$laboratorio[$i]."'>".$laboratorio[$i]."</option>";
                  }
                  echo "</select></td>";

                  echo "<td>";
                  echo '<select class="form-control text-center" name="lb2_docente">';
                  echo "<option value='ninguno'>Sin docente</option>";
                  for ($i=0; $i <sizeof($docente) ; $i++) { 
                    echo "<option value='".$iddocente[$i]."'>".$docente[$i]."</option>"; 
                  
                }
                echo "</select></td></tr></table>";
            }
        ?>

            <button type="submit" class="btn btn-primary btn-block">Crear secci&oacute;n</button>
            <br>
        </form>
    </div>
</body>
</html>








