<?php
   header('Content-Type: text/html; charset=ISO-8859-1');
    date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();
  	session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  		$codcurso=$_POST['codcurso'];
  		$campus=$_POST['campus'];
  		//var_dump($_POST);

  		$sql ="DELETE FROM horarios where codcurso='$codcurso' and sede='$campus' and ciclo='2020-2'";

  		 if($mysqli->query($sql)){
	 		echo '<script language =javascript>
			 alert("Se ha eliminado correctamente la seccion seleccionada")
			self.location = "../menu_admin.php"</script>';
			}
			else{
				echo '<script language =javascript>
			 alert("La seccion seleccionada aun no tiene horarios creados")
			self.location = "../menu_admin.php"</script>';
			}

  }
  ?>