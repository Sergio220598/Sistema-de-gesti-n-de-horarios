<?php
  date_default_timezone_set("America/Lima");  
  $fecha_antigua = $_SESSION['hora_ingreso'];
  $hora = date("Y-n-j H:i:s");
  $tiempo = (strtotime($hora)-strtotime($fecha_antigua));
  if($tiempo >= 600)
  {
    session_unset();  
    session_destroy();
    echo '<script language = javascript>
         alert("Su sesion ha terminado por seguridad al exceder los 10 minutos.")
         self.location="../index.html" </script>';
  }
  else {
      $_SESSION['hora_ingreso']=$hora;
  }
?> 