<?php 
    
    date_default_timezone_set("America/Lima");
    include_once('basededatos/conectar_bd.php');
    $mysqli = conectarBD();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $correo=trim($_POST['correo']);  
        $clave_actual=trim($_POST['clave_actual']);  
        $clave_nueva=trim($_POST['clave_nueva']); 
        $clave_nueva_rep=trim($_POST['clave_nueva_rep']);  
        
        //var_dump($correo);
        //var_dump($clave_actual);
        //var_dump($clave_nueva);
        //var_dump($clave_nueva_rep);
        
        if (empty($clave_actual) || empty($clave_nueva) || empty($clave_nueva_rep)){
            echo '<script language =javascript>
                    alert("Debe llenar todos los campos")
                    self.location = "menu_cliente.php"</script>';
        }
        elseif ($clave_nueva!=$clave_nueva_rep) {
            echo '<script language =javascript>
                    alert("La clave nueva y la clave nueva repetida no coinciden")
                    self.location = "menu_cliente.php""</script>';
        }
        
       
        else {
            $sql = "update usuarios set clave=aes_encrypt('".$clave_nueva."','upc') where correo='".$correo."' 
           and clave=aes_encrypt('".$clave_actual."','upc')";
                
             if($mysqli->query($sql))
                {
                    echo '<script language =javascript>
                        alert("Se ha cambiado la clave satisfactoriamente!")
                        self.location = "menu_cliente.php"
                        </script>';
                }
                else
                {
                    echo '<script language =javascript>
                        alert("No se pudo cambiar la clave. Revise los datos ingresados y vuelva a intentar")
                        self.location = "menu_cliente.php"
                        </script>';
                }
        }
 }

?>
