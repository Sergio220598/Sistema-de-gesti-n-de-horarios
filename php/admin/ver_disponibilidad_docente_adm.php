<?php
header('Content-Type: text/html; charset=ISO-8859-1');
    date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();
    session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $iddocente = $_POST['iddocente'];
 
        //var_dump($_POST);

        //$result = $mysqli->query("SELECT iddocente, dia, hora_inicio, hora_fin, ciclo, campus FROM disponibilidad WHERE iddocente='$iddocente'");

           /*if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $iddocente=$row['iddocente'];
                $dia=$row['dia'];
                $hora_inicio=$row['hora_inicio'];
                $hora_fin=$row['hora_fin'];
                $ciclo=$row['ciclo'];
                $campus=$row['campus'];
            }*/
            
        }
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

<div class="container" id="disponibilidad_docente" style="width:90%;border:2px solid #000;margin-top:20px">
    <h2 class="text-center">Disponibilidad del Docente</h2>
    <br>
        <table class="table table-hover" style="text-align:center">
            <tr>
                <th>IdDocente</th>
                <th>D&iacute;a</th>
                <th>Hora_Inicio</th>
                <th>Hora_Fin</th>
                <th>Ciclo</th>
                <th>Campus</th>
            </tr>
            <?php
                    $result = $mysqli->query("SELECT iddocente, dia, hora_inicio, hora_fin, ciclo, campus FROM disponibilidad WHERE iddocente='$iddocente'");
                    
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                            echo "<td>".$row['iddocente']."</td>";
                            echo "<td>".$row['dia']."</td>";
                            echo "<td>".$row['hora_inicio']."</td>";
                            echo "<td>".$row['hora_fin']."</td>";
                            echo "<td>".$row['ciclo']."</td>";
                            echo "<td>".$row['campus']."</td>";
                        echo "</tr>";
                    }
            ?>
        </table>
</div>

</body>
</html>
