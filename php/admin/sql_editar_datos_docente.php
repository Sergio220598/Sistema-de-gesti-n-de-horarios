
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
    date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();
    session_start();
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
      $sql="UPDATE docentes SET iddocente='$iddocente',nombre='$nombre',apellidop='$apellidop',apellidom='$apellidom',carrera='$carrera',contrato='$contrato',habilitado='$habilitado',horas_min='$horas_min',horas_max='$horas_max',correo='$correo' WHERE iddocente='$iddocente'";


         if($mysqli->query($sql)){
            echo '<script language =javascript>
             alert("Se ha actualizado el docente correctamente")
            self.location = "../menu_admin.php"</script>';
            }
            else{
                echo '<script language =javascript>
             alert("No se ha actualizado el docente correctamente")
            self.location = "../menu_admin.php"</script>';
            }

  }
  ?>