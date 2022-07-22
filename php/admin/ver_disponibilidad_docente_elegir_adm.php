

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
<div class="container" id="ver_disponibilidad_docente_adm" style="display: none;width:60%;border:2px solid #000;margin-top:20px">
     <h2>Ver disponibilidad del Docente</h2>
     <form class="form-horizontal" action="admin/ver_disponibilidad_docente_adm.php" method="post">
        <div style="display: flex;">
         <div>
           <label>Seleccione el docente:</label>
            <select name="iddocente" class="form-control" style="width: 500px;">
                <?php 
                for ($i=0; $i <sizeof($iddocente) ; $i++)  {
    
                echo "<option value='".$iddocente[$i]."'>".$nombre_docente[$i]."</option>";

                }
                ?>
            </select>


        </div>
        </div>
        <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 20%;margin-left: auto;margin-right: auto">Elegir</button>
        </form>
    </div>
    <br>
         
