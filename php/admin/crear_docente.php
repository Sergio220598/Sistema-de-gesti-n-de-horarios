

<div class="container" id="crear_docente" style="display: none;width:60%;border:2px solid #000;margin-top:20px">
    <h2 class="text-center">Crear nuevo docente</h2>

    <form class="form-horizontal" action="" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-2" for="docente">C&oacute;digo:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="iddocente" name="iddocente">
            </div>
        </div>
                
        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="nombre">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Apellido parterno:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="apellidop">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Apellido materno:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="apellidom">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Correo electr&oacute;nico:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="correo">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Carrera:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="carrera">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Contrato:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="contrato" >
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">Habilitado:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="habilitado">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">M&aacute;ximo de horas:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="horas_max">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ciclo">M&iacute;nimo de horas:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="horas_min">
            </div>
        </div>

                
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-block">Grabar</button>
            </div>
        </div>        
    </form>
</div>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        
        var_dump($_POST);
       /* $sql="INSERT INTO docentes(iddocente,nombre,apellidop,apellidom,carrera,contrato,habilitado,horas_min,horas_max,correo) VALUES ('$iddocente','$nombre','$apellidop','$apellidom','$carrera','$contrato','$habilitado','$horas_min','$horas_max','$correo')";

         if($mysqli->query($sql)){
            echo '<script language =javascript>
             alert("Se ha registrado el docente correctamente")
            self.location = "menu_admin.php"</script>';
            }
            else{
                echo '<script language =javascript>
             alert("No se ha registrado el docente correctamente")
            self.location = "menu_admin.php"</script>';
            }*/

  }
  ?>