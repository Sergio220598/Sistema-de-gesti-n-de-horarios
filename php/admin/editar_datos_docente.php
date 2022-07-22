<?php
header('Content-Type: text/html; charset=ISO-8859-1');
    date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();
    session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $iddocente = $_POST['iddocente'];
 
        //var_dump($_POST);

        $result = $mysqli->query("SELECT iddocente, nombre, apellidop, apellidom, carrera, contrato, habilitado,horas_min, horas_max, correo FROM docentes WHERE iddocente='$iddocente'");

           if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
            }
            
            $iddocente=$row['iddocente'];
            $nombre=$row['nombre'];
            $apellidop=$row['apellidop'];
            $apellidom=$row['apellidom'];
            $carrera=$row['carrera'];
            $contrato=$row['contrato'];
            $habilitado=$row['habilitado'];
            $horas_min=$row['horas_min'];
            $horas_max=$row['horas_max'];
            $correo=$row['correo'];

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

    <h2 class="text-center">Editar datos del Docente</h2>

    <form class="form-horizontal" action="sql_editar_datos_docente.php" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-2" for="docente">C&oacute;digo:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="iddocente" name="iddocente" value="<?php echo $iddocente;?>">
            </div>
        </div>
                
        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="nombre" value="<?php echo $nombre;?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Apellido parterno:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="apellidop" value="<?php echo $apellidop;?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Apellido materno:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="apellidom" value="<?php echo $apellidom;?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Correo electr&oacute;nico:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="correo" value="<?php echo $correo;?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Carrera:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="carrera" value="<?php echo $carrera;?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Contrato:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="contrato" value="<?php echo $contrato;?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Habilitado:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="habilitado" value="<?php echo $habilitado;?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">M&aacute;ximo de horas:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="horas_max" value="<?php echo $horas_max;?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">M&iacute;nimo de horas:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="horas_min" value="<?php echo $horas_min;?>">
            </div>
        </div>

                
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
            </div>
        </div>        
    </form>
</div>
</body>
</html>


<?php
 /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $iddocente = $_POST['iddocente'];
        $nombre = $_POST['nombre'];
        $apellidop = $_POST['apellidop'];
        $apellidom = $_POST['apellidom'];
        $carrera = $_POST['carrera'];
        $contrato = $_POST['contrato'];
        $horas_min = $_POST['horas_min'];
        $horas_max = $_POST['horas_max'];
        $correo = $_POST['correo'];
        $habilitado = "SI";
        
       // var_dump($_POST);
       $sql="INSERT INTO docentes(iddocente,nombre,apellidop,apellidom,carrera,contrato,habilitado,horas_min,horas_max,correo) VALUES ('$iddocente','$nombre','$apellidop','$apellidom','$carrera','$contrato','$habilitado','$horas_min','$horas_max','$correo')";

         if($mysqli->query($sql)){
            echo '<script language =javascript>
             alert("Se ha registrado el docente correctamente")
            self.location = "menu_admin.php"</script>';
            }
            else{
                echo '<script language =javascript>
             alert("No se ha registrado el docente correctamente")
            self.location = "menu_admin.php"</script>';
            }

  }*/
  ?>