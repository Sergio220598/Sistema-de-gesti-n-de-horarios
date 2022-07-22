

<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
    $correo = $_SESSION['correo']; 
    $result = $mysqli->query("select *from docentes where 1 ORDER BY apellidop ASC");
    
        $iddocente=[];
        $nombre_docente=[];
       while($row = $result->fetch_assoc()) {
        //var_dump($row);
        array_push($iddocente, $row['iddocente']);
        array_push($nombre_docente, $row['nombre']." ".$row['apellidop']);
       }
        
?>
<div class="container" id="disponibilidad_docente_adm" style="display:none; margin-left: 20px; padding-bottom: 20px;">
     <h2>Disponibilidad del Docente</h2>
     <form class="form-horizontal" action="admin/sql_disponibilidad_docente_adm.php" method="post">
        <div style="display: flex;">
         <div>
           <label>Seleccione el docente:</label>
            <select name="dispo_docente" class="form-control" style="width: 500px;">
                <?php 
                for ($i=0; $i <sizeof($iddocente) ; $i++)  {
    
                echo "<option value='".$iddocente[$i]."'>".$nombre_docente[$i]."</option>";

                }
                ?>
            </select>


        </div>

        <div style="margin-left: 50px;">
            <label>Ciclo:</label>
            <select name="dispo_ciclo" class="form-control" >
               <?php 
               // for ($i=0; $i <sizeof($arreglo) ; $i++) { 
                echo "<option value='2020-2'>2020-2</option>";
                //}
                ?>
            </select>
        </div>
        </div>
        <h3>Haga click sobre cada horario para modificarlo</h3>
        <p>MO:Disponibilidad en el campus Monterrico</p>
        <p>SM:Disponibilidad en el campus San Miguel</p>
        <p>VL:Disponibilidad en el campus Villa</p>
        <p>MO-SM:Disponibilidad en el campus Monterrico o campus San Miguel</p>
        <p>TODOS:Disponibilidad en el campus en todos los campus</p>
        
      <div class="container" style="margin-right: 20px">        
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Horario</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
            <th>Domingo</th>
            
          </tr>
        </thead>
        
        <tbody>
            <?php 
            $hora=0;
            //echo "<td>".$hora."-".$hora+1."</td>";
            for ($i=0; $i <16 ; $i++) { 
            $hora7=$i+7;
            $hora8=$i+8;
            echo "<tr>";
            echo "<td>".$hora7.":00-".$hora8.":00</td>";
            for ($dia=0; $dia <6; $dia++) { 
            if ($dia==4 && $i==6 || $dia==4 && $i==7 ) {
                echo "<td>NO DISPONIBLE</td>";
            }
            else{
            echo "<td><select name='".$dia."_hora".$hora7."' class='form-control' >
                    <option value='ND'>NO DISPONIBLE</option>;
                    <option value='SM'>SM</option>;
                    <option value='MO'>MO</option>;
                    <option value='VL'>VILLA</option>;                    
                    <option value='MO-SM'>MO-SM</option>;
                    <option value='TODOS'>TODOS</option>;
                </select></td>";
            }
            }
            echo "<td>NO DISPONIBLE</td>";
             }
             echo "</tr>";
            ?>
            
        </tbody>
      </table>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 20%;margin-left: auto;margin-right: auto">Guardar</button>
        </form>
    </div>
         
