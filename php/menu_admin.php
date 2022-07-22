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
        <title>Menu administrador</title>
        <!--Se necesita este enlace para que funcione el Navbar de Boostrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  		<script src="../js/jquery-3.5.1.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		 <script src="../js/menu_admin3.js"></script>

    </head>
    <body>
    	<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<div class="navbar-header">
     				<a class="navbar-brand" href="#">Gesti&oacute;n de horarios UPC</a>
	   			</div>
    			<ul class="nav navbar-nav">
			      	<li class="active"><a href="menu_admin.php">Home</a></li>

			      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Docente<span class="caret"></span></a>
			        <ul class="dropdown-menu">
                <li><a href="#" id="InsertarNuevoDocente">Insertar nuevo docente</a></li>
                <li><a href="#" id="InsertarDisponibilidadDocente">Insertar disponibilidad del docente</a></li>
                <li><a href="#" id="EditarDatosDocente">Editar datos del docente</a></li>
                <li><a href="#" id="VerHorarioPropuestoDocente">Ver horario propuesto del docente</a></li>
                <li><a href="#" id="VerDisponibilidadDocente">Ver disponibilidad del docente</a></li>
        			</ul>
      				</li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Horarios<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#" id="crear_horario">Crear un horario de curso</a></li>
                <li><a href="#" id="modificar_horario">Modificar un horario de curso</a></li>
                <li><a href="#" id="eliminar_horario">Eliminar un horario</a></li>
                <li><a href="#" id="ver_horario_curso">Ver horarios por curso</a></li>
                <li><a href="#" id="ver_horario_ciclo">Ver horarios por ciclo</a></li>
                <li><a href="#" id="ver_horario_todos">Ver todos los horarios por carrera</a></li>

              </ul>
              </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ocupabilidad<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#" id="ver_ocupabilidad">Ver_ocupabilidad</a></li>
           
              </ul>
              </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mallas<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#">a</a></li>
                <li><a href="#" >b</a></li>
                <li><a href="#">c</a></li>
              </ul>
              </li>

      				<li><a  id="clave_admin" href="#">Cambiar contrase&ntilde;a</a></li>
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
      <p>Usted se encuentra en modo Administrador. Aqu&iacute; podr&aacute; crear, modificar, eliminar y ver los horarios del presente ciclo, as&iacute; como ver la ocupabilidad de los laboratorios y verificar si hay cruce de horarios.</p>
     
    </div>
  </div>
  <?php

    include_once ('cambiar_clave.php');
    include_once ('admin/crear_horario.php');
    include_once ('admin/ver_ocupabilidad.php');
    include_once ('admin/modificar_horario.php');
    include_once ('admin/ver_horarios_por_curso.php');
    include_once ('admin/ver_horarios_por_ciclo.php');
    include_once ('admin/eliminar_horario.php');
    include_once ('admin/crear_docente.php');
    include_once ('admin/disponibilidad_docente_adm.php');
    include_once ('admin/ver_disponibilidad_docente_elegir_adm.php');
    include_once ('admin/editar_datos_docente_elegir.php');
    include_once('admin/ver_todos_horarios_por_carrera.php');



 ?>
	
 </body>
</html>