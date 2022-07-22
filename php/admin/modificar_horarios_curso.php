<?php
   header('Content-Type: text/html; charset=ISO-8859-1');
    date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();
  session_start();//Saber si debes hacer un session start()
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codcurso=$_POST['codcurso'];
        $campus =$_POST['campus'];
        //var_dump($_POST);



         $docente=[];
        $iddocente=[];
        //$docente_e_id=[];
  

        $result = $mysqli->query("select *from docentes where 1 ORDER BY apellidop ASC");
        while($row = $result->fetch_assoc()) {
        array_push($docente, $row['nombre']." ".$row['apellidop']);
        array_push($iddocente, $row['iddocente']);
        //array_push($docente_e_id, [$row['iddocente']=>$row['nombre']." ".$row["apellidop"]]);
        //var_dump($row['nombre']." ".$row['apellidop']);

       }
       

          $laboratorio=[];
         $result = $mysqli->query("select *from Laboratorios where 1");
        while($row = $result->fetch_assoc()) {
        array_push($laboratorio, $row['nombre']);
        //var_dump($row['nombre']." ".$row['apellidop']);

       }


       $horas=[];
       //[teoria,practica,laboratorio,grupos]
       $result = $mysqli->query("select *from cursos where codcurso='".$codcurso."'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
              array_push($horas,$row['teoria']);
              array_push($horas,$row['practica']);
              array_push($horas,$row['laboratorio']);
              array_push($horas,$row['grupos']);
              $curso=$row['nombre'];
   
      }
     // var_dump($horas);

    $result = $mysqli->query("select *from horarios where codcurso='$codcurso' and sede='$campus' and ciclo='2020-2'");
        
        $horarios_sql=[];
        while($row = $result->fetch_assoc()) {
          array_push($horarios_sql, $row);
       }
       //var_dump($horarios_sql);
       if(empty($horarios_sql))
          echo "no hay horarios";

        //$doc_actual=$docente_e_id[$horarios_sql[0]['iddocente']];
 

       //var_dump($horarios_sql[0]['tipo_aula']);
       //var_dump($horarios_sql[1]['tipo_aula']);
       //var_dump($horarios_sql[2]['tipo_aula']);

        if (empty($horarios_sql)) {
          echo '<script language =javascript>
            alert("Aun no existe horarios para esta seccion")
            self.location = "../menu_admin.php"</script>';
        }
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
        <h1>Modificar el horario del curso <?php echo "$curso";?>
         en el campus <?php echo "$campus";?></h1>
      </div>
      <div class = "container">
          <form action="sql_modificar_horarios_curso.php" method="POST">
              <div class="form-inline">
                <label for="seccion">Ingrese el c&oacute;digo de la secci&oacute;n:</label>
                <input type="text" class="form-control" name="seccion" value="<?php echo $horarios_sql[0]['seccion'];?>">
                <label for="vacantes">Vacantes:</label>
                <input type="number" class="form-control" name="vacantes" value="<?php echo $horarios_sql[0]['vacantes'];?>">

                <input type="text" class="form-control"  name="curso" value="<?php echo $curso;?>" style="display: none;"></input>

                <input type="text" class="form-control"  name="campus" value="<?php echo $campus;?>" style="display: none;"></input>

                <input type="text" class="form-control"  name="codcurso" value="<?php echo $codcurso;?>" style="display: none;"></input>

              </div>

               <?php

               
                if($horas[0]>0) //teoria
                {
                
                echo "<input type='text' class='form-control'  name='te_tiposesion_actual' value='".$horarios_sql[0]['tiposesion']."' style='display: none;'></input>

                <input type='text' class='form-control'  name='te_grupo_actual' value='".$horarios_sql[0]['grupo']."' style='display: none;'></input>";

                
                  echo '<div class = "form-inline">';
                  echo "<h2>Teor&iacute;a (".$horas[0]." horas):</h2>";
                  echo "</div>";
                  echo '<table class="table text-center">';
                  echo "<tr>";
                  echo '<td><label for = "te_inicio">Hora de inicio:</label></td>';
                   echo "<td><input type='time' class='form-control' name='te_inicio' value='".$horarios_sql[0]['hora_inicio']."'/></td>";
                  echo '<td>D&iacute;a</td>';
                  echo '<td><label for = "aula_te">Aula:</td><td><label for="docente">Elija al docente:</label></td></tr>';
                  echo '<tr>';
                  echo '<td><label for = "te_inicio">Hora de t&eacute;rmino:</label></td>';
                  echo "<td><input type='time' class='form-control' name='te_fin' value='".$horarios_sql[0]['hora_fin']."'/></td>";
                  echo "<td><select class='form-control'  name='te_dia'>";
                  echo "<option  value='".$horarios_sql[0]['dia']."'>".$horarios_sql[0]['dia']."</option>";
                  echo '<option value="lunes">Lunes</option>';
                  echo '<option value="martes">Martes</option>';
                  echo '<option value="miercoles">Mi&eacute;rcoles</option>';
                  echo '<option value="jueves">Jueves</option>';
                  echo '<option value="viernes">Viernes</option>';
                  echo '<option value="sabado">S&aacute;bado</option>';
                  echo '</select></td>';
                  echo "<td><select class='form-control text-center' name='aula_te'>
                      <option value='".$horarios_sql[0]['aula']."'>".$horarios_sql[0]['aula']."</option>
                      <option value='teorica'>Te&oacute;rica</option>
                      <option value='computo'>C&oacute;mputo</option>";
           
                  for($i=0;$i<count($laboratorio);$i++)
                  {
                    echo "<option value='".$laboratorio[$i]."'>".$laboratorio[$i]."</option>";
                  }
                  echo "</select></td>";

                  echo "<td>";
                  echo "<select class='form-control text-center' name='te_docente'>";

                  $result = $mysqli->query("select nombre,apellidop from docentes where iddocente='".$horarios_sql[0]['iddocente']."'");
                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();
                              $doc_actual=$row['nombre']." ".$row['apellidop'];
                      }
        
                  echo "<option value='".$horarios_sql[0]['iddocente']."'>".$doc_actual."</option>";
                  for ($i=0; $i <sizeof($docente) ; $i++) { 
                    echo "<option value='".$iddocente[$i]."'>".$docente[$i]."</option>"; 
                  
                }
                echo "</select></td></tr></table>";
                
            }
              
            if($horas[1]>0) //practica y Lab 1
                {
                echo "<input type='text' class='form-control'  name='pr_tiposesion_actual' value='".$horarios_sql[1]['tiposesion']."' style='display: none;'></input>

                <input type='text' class='form-control'  name='pr_grupo_actual' value='".$horarios_sql[1]['grupo']."' style='display: none;'></input>";

                echo '<div class = "form-inline">';
                echo "<h2>Pr&aacute;ctica (".$horas[1]." horas):</h2>";
                echo "</div>";
                echo '<table class="table text-center">';
                echo '<tr>';
                echo '<td><label for = "pr_inicio">Hora de inicio:</label></td>';
                echo "<td><input type='time' class='form-control' name='pr_inicio' value='".$horarios_sql[1]['hora_inicio']."'/></td>";
                echo '<td>D&iacute;a</td>';
                echo '<td><label for = "aula_pr">Aula:</td>';
                echo '<td><label for="docente">Elija al docente:</label></td>';
               
                echo '</tr>';
                echo '<tr>';
                echo  '<td><label for = "pr_inicio">Hora de t&eacute;rmino:</label></td>';
                echo  "<td><input type='time' class='form-control' name='pr_fin' value='".$horarios_sql[1]['hora_fin']."'/></td>";
                echo  "<td>";
                echo  "<select class='form-control' name='pr_dia'>";
                 echo "<option  value='".$horarios_sql[1]['dia']."'>".$horarios_sql[1]['dia']."</option>";
                echo  '<option value="lunes">Lunes</option>';
                echo  '<option value="martes">Martes</option>';
                echo  '<option value="miercoles">Mi&eacute;rcoles</option>';
                echo  '<option value="jueves">Jueves</option>';
                echo  '<option value="viernes">Viernes</option>';
                echo  '<option value="sabado">S&aacute;bado</option>';
                      
                echo  "</select>";
                echo  "</td>";
                 echo "<td><select class='form-control text-center' name='aula_pr'>
                      <option value='".$horarios_sql[1]['aula']."'>".$horarios_sql[1]['aula']."</option>
                      <option value='teorica'>Te&oacute;rica</option>
                      <option value='computo'>C&oacute;mputo</option>";
           
                  for($i=0;$i<count($laboratorio);$i++)
                  {
                    echo "<option value='".$laboratorio[$i]."'>".$laboratorio[$i]."</option>";
                  }
                  echo "</select></td>";

                  echo "<td>";
                  echo '<select class="form-control text-center" name="pr_docente">';

                  $result = $mysqli->query("select nombre,apellidop from docentes where iddocente='".$horarios_sql[1]['iddocente']."'");
                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();
                              $doc_actual=$row['nombre']." ".$row['apellidop'];
                      }

                    echo "<option value='".$horarios_sql[1]['iddocente']."'>".$doc_actual."</option>";
                  for ($i=0; $i <sizeof($docente) ; $i++) { 
                    echo "<option value='".$iddocente[$i]."'>".$docente[$i]."</option>"; 
                  
                }
                echo "</select></td></tr></table>";
            

            if($horas[2]>0) //laboratorio 1
                {
                 echo "<input type='text' class='form-control'  name='lb1_tiposesion_actual' value='".$horarios_sql[2]['tiposesion']."' style='display: none;'></input>

                <input type='text' class='form-control'  name='lb1_grupo_actual' value='".$horarios_sql[2]['grupo']."' style='display: none;'></input>";

                echo '<div class = "form-inline">';
                echo '<h2>Laboratorio Grupo 01('.$horas[2].' horas):</h2>';
                echo '</div>';
                echo '<table class="table text-center">';
                echo '<tr>';
                echo '<td><label for = "lb1_inicio">Hora de inicio:</label></td>';
                echo "<td><input type='time' class='form-control' name='lb1_inicio' value='".$horarios_sql[2]['hora_inicio']."' /></td>";
                echo  '<td>D&iacute;a</td>';
                echo  '<td><label for = "aula_lb">Aula:</td>';
                echo  '<td><label for="docente">Elija al docente:</label></td>';
                echo  '</tr>';
                echo  '<tr>';
                echo  '<td><label for = "lb1_fin">Hora de t&eacute;rmino:</label></td>';
                echo  "<td><input type='time' class='form-control' name='lb1_fin' value='".$horarios_sql[2]['hora_fin']."'/></td>";
                echo  '<td>';
                echo  "<select class='form-control' name='lb1_dia'>";
                echo "<option  value='".$horarios_sql[2]['dia']."'>".$horarios_sql[2]['dia']."</option>";
                echo  '<option value="lunes">Lunes</option>';
                echo  '<option value="martes">Martes</option>';
                echo  '<option value="miercoles">Mi&eacute;rcoles</option>';
                echo  '<option value="jueves">Jueves</option>';
                echo  '<option value="viernes">Viernes</option>';
                echo  '<option value="sabado">S&aacute;bado</option>';
                echo  '</select>';
                echo  '</td>';
                echo  "<td><select class='form-control text-center' name='aula_lb1'>
                      <option value='".$horarios_sql[2]['aula']."'>".$horarios_sql[2]['aula']."</option>
                      <option value='teorica'>Te&oacute;rica</option>
                      <option value='computo'>C&oacute;mputo</option>";
           
                  for($i=0;$i<count($laboratorio);$i++)
                  {
                    echo "<option value='".$laboratorio[$i]."'>".$laboratorio[$i]."</option>";
                  }
                  echo "</select></td>";

                  echo "<td>";
                  echo '<select class="form-control text-center" name="lb1_docente">';
                    $result = $mysqli->query("select nombre,apellidop from docentes where iddocente='".$horarios_sql[2]['iddocente']."'");
                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();
                              $doc_actual=$row['nombre']." ".$row['apellidop'];
                      }

                    echo "<option value='".$horarios_sql[2]['iddocente']."'>".$doc_actual."</option>";
                  for ($i=0; $i <sizeof($docente) ; $i++) { 
                    echo "<option value='".$iddocente[$i]."'>".$docente[$i]."</option>"; 
                  
                }
                echo "</select></td></tr></table>";
            }
          }//-------------------------------------------------------------------

        else{
          if($horas[2]>0) //laboratorio 1
                {
                 echo "<input type='text' class='form-control'  name='lb1_tiposesion_actual' value='".$horarios_sql[1]['tiposesion']."' style='display: none;'></input>

                <input type='text' class='form-control'  name='lb1_grupo_actual' value='".$horarios_sql[1]['grupo']."' style='display: none;'></input>";

                echo '<div class = "form-inline">';
                echo '<h2>Laboratorio Grupo 01('.$horas[2].' horas):</h2>';
                echo '</div>';
                echo '<table class="table text-center">';
                echo '<tr>';
                echo '<td><label for = "lb1_inicio">Hora de inicio:</label></td>';
                echo "<td><input type='time' class='form-control' name='lb1_inicio' value='".$horarios_sql[1]['hora_inicio']."' /></td>";
                echo  '<td>D&iacute;a</td>';
                echo  '<td><label for = "aula_lb">Aula:</td>';
                echo  '<td><label for="docente">Elija al docente:</label></td>';
                echo  '</tr>';
                echo  '<tr>';
                echo  '<td><label for = "lb1_fin">Hora de t&eacute;rmino:</label></td>';
                echo  "<td><input type='time' class='form-control' name='lb1_fin' value='".$horarios_sql[1]['hora_fin']."'/></td>";
                echo  '<td>';
                echo  "<select class='form-control' name='lb1_dia'>";
                 echo "<option  value='".$horarios_sql[1]['dia']."'>".$horarios_sql[1]['dia']."</option>";
                echo  '<option value="lunes">Lunes</option>';
                echo  '<option value="martes">Martes</option>';
                echo  '<option value="miercoles">Mi&eacute;rcoles</option>';
                echo  '<option value="jueves">Jueves</option>';
                echo  '<option value="viernes">Viernes</option>';
                echo  '<option value="sabado">S&aacute;bado</option>';
                echo  '</select>';
                echo  '</td>';
                echo  "<td><select class='form-control text-center' name='aula_lb1'>
                      <option value='".$horarios_sql[1]['aula']."'>".$horarios_sql[1]['aula']."</option>
                      <option value='teorica'>Te&oacute;rica</option>
                      <option value='computo'>C&oacute;mputo</option>";
           
                  for($i=0;$i<count($laboratorio);$i++)
                  {
                    echo "<option value='".$laboratorio[$i]."'>".$laboratorio[$i]."</option>";
                  }
                  echo "</select></td>";

                  echo "<td>";
                  echo '<select class="form-control text-center" name="lb1_docente">';
                    $result = $mysqli->query("select nombre,apellidop from docentes where iddocente='".$horarios_sql[1]['iddocente']."'");
                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();
                              $doc_actual=$row['nombre']." ".$row['apellidop'];
                      }

                    echo "<option value='".$horarios_sql[1]['iddocente']."'>".$doc_actual."</option>";
                  for ($i=0; $i <sizeof($docente) ; $i++) { 
                    echo "<option value='".$iddocente[$i]."'>".$docente[$i]."</option>"; 
                  
                }
                echo "</select></td></tr></table>";
            }

             if($horas[3]>0) //grupos
                {
                echo "<input type='text' class='form-control'  name='lb2_tiposesion_actual' value='".$horarios_sql[2]['tiposesion']."' style='display: none;'></input>

                <input type='text' class='form-control'  name='lb2_grupo_actual' value='".$horarios_sql[2]['grupo']."' style='display: none;'></input>";

                echo '<div class = "form-inline">';
                echo '<h2>Laboratorio Grupo 02 ('.$horas[2].' horas)</h2>';
                echo '</div>';
                echo '<table class="table text-center">';
                echo '<tr>';
                echo  '<td><label for = "lb2_inicio">Hora de inicio:</label></td>';
                echo  "<td><input type='time' class='form-control' name='lb2_inicio' value='".$horarios_sql[2]['hora_inicio']."'/></td>";
                echo  '<td>D&iacute;a</td>';
                echo  '<td><label for = "aula_lb">Aula:</td>';
                echo  '<td><label for="docente">Elija al docente:</label></td>';
                echo '</tr>';
                echo '<tr>';
                echo  '<td><label for = "lb1_fin">Hora de t&eacute;rmino:</label></td>';
                echo  "<td><input type='time' class='form-control' name='lb2_fin' value='".$horarios_sql[2]['hora_fin']."'/></td>";
                echo  '<td>';
                echo   "<select class='form-control' name='lb2_dia'>";
                 echo "<option  value='".$horarios_sql[2]['dia']."'>".$horarios_sql[2]['dia']."</option>";
                echo   '<option value="lunes">Lunes</option>';
                echo   '<option value="martes">Martes</option>';
                echo   '<option value="miercoles">Mi&eacute;rcoles</option>';
                echo   '<option value="jueves">Jueves</option>';
                echo   '<option value="viernes">Viernes</option>';
                echo   '<option value="sabado">S&aacute;bado</option>';
                      
                echo  '</select>';
                echo  '</td>';
                echo  '<td><select class="form-control" name="aula_lb2">';
                echo  "<option value='".$horarios_sql[2]['aula']."'>".$horarios_sql[1]['aula']."</option>";     
                echo  '<option value="teorica">Te&oacute;rica</option>';
                echo  '<option value="computo">C&oacute;mputo</option>';
           
                  for($i=0;$i<count($laboratorio);$i++)
                  {
                    echo "<option value='".$laboratorio[$i]."'>".$laboratorio[$i]."</option>";
                  }
                  echo "</select></td>";

                  echo "<td>";
                  echo '<select class="form-control text-center" name="lb2_docente">';
                   $result = $mysqli->query("select nombre,apellidop from docentes where iddocente='".$horarios_sql[2]['iddocente']."'");
                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();
                              $doc_actual=$row['nombre']." ".$row['apellidop'];
                      }

                    echo "<option value='".$horarios_sql[2]['iddocente']."'>".$doc_actual."</option>";
                  for ($i=0; $i <sizeof($docente) ; $i++) { 
                    echo "<option value='".$iddocente[$i]."'>".$docente[$i]."</option>"; 
                  
                }
                echo "</select></td></tr></table>";
            }

        }

            ?>


<button type="submit" class="btn btn-success btn-block">Modificar secci&oacute;n</button>
            <br>
        </form>
    </div>
</body>
</html>

