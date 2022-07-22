<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
    session_start();
    if(!isset($_SESSION['correo']) || !isset($_SESSION['admin']))
    {
       header("Location: ../index.html");
    }
    include_once('basededatos/conectar_bd.php');
    $correo = $_SESSION['correo']; 
    $mysqli = conectarBD();
    $result = $mysqli->query("SELECT nombre,apellidop FROM docentes WHERE correo='$correo'");
    if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['nombres']=$row['nombre'];
            $_SESSION['apellidop']=$row['apellidop'];
           
    }
    include "timeout.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Menu cliente</title>
        <!--Se necesita este enlace para que funcione el Navbar de Boostrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  		<script src="../js/jquery-3.5.1.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		 <script src="../js/menu_cliente.js"></script>

    </head>
    <body>
    	<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<div class="navbar-header">
     				<a class="navbar-brand" href="#">Gesti&oacute;n de horarios UPC</a>
	   			</div>
    			<ul class="nav navbar-nav">
			      	<li class="active"><a href="menu_cliente.php">Home</a></li>
			      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mi informaci&oacute;n<span class="caret"></span></a>
			        <ul class="dropdown-menu">
          				<li><a href="#"id="disponibilidad">Insertar mi disponibilidad horaria</a></li>
				        <li><a href="#" id="ver_horario">Ver mi horario propuesto</a></li>
				        <li><a href="#" id="ver_estadisticas">Ver estadisticas de horas por semestre</a></li>
        			</ul>
      				</li>
      				<li><a  id="clave" href="#">Cambiar contrase&ntilde;a</a></li>
    			</ul>
    			<ul class="nav navbar-nav navbar-right">
      				<li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo " Bienvenido ".$_SESSION["nombres"]." ".$_SESSION["apellidop"]."";?></a></li>
      				<li><a href="salir_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesi&oacute;n</a></li>
    			</ul>
  			</div>
		</nav>
	<!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron" id="titulo">
    <div class="container">
      <h1 class="display-4">Bienvenido al sistema de gesti&oacute;n de horarios!</h1>
      <p>Usted se encuentra en modo cliente. Aqu&iacute; podr&aacute; ingresar su disponibilidad horaria para el presente ciclo, as&iacute; como ver el horario propuesto por el coordinador de carrera, el horario en ciclos anteriores y verificar la conformidad de su horario UPC.</p>
    </div>
  </div>
	<?php
    include_once ('cambiar_clave.php');
    include_once ('cliente/disponibilidad_docente.php');
    include_once('cliente/ver_horario_propuesto.php');
    include_once('cliente/ver_estadisticas.php');

 ?>
 </body>
</html>