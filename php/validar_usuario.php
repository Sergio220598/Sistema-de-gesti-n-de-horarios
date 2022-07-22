<?php
    date_default_timezone_set("America/Lima");
    include_once('basededatos/conectar_bd.php');
    $mysqli = conectarBD();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo=trim($_POST['correo']);
        $clave = trim($_POST['clave']);
        
        $result = $mysqli->query("SELECT *FROM usuarios WHERE correo='$correo' and clave=aes_encrypt('$clave','upc')");
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['correo']=$correo;
            $_SESSION['hora_ingreso']=date("Y-n-j H:i:s");
            $_SESSION['admin']=$row['admin'];
            $accesos=$row['accesos'];
            
            if($row['admin']=='S'){
                $accesos=$accesos+1;
                $sql="update usuarios set accesos='".$accesos."' where correo='".$correo."'";
                $mysqli->query($sql);
                header("Location: menu_admin.php");
            }
    
            else if($row['admin']=='N'){
                $accesos=$accesos+1;
                $sql="update usuarios set accesos='".$accesos."' where correo='".$correo."' ";
                $mysqli->query($sql);
                header("Location: menu_cliente.php");
            }

            else
              header("Location: ../index.html");
        }
        else{
            echo '<script language = javascript>
            alert("Usuario o Password errados, por favor verifique sus datos.")
            self.location = "../index.html" </script>';
        }
    }

?>