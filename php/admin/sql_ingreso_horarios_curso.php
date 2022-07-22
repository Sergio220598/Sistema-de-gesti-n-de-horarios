<?php
   header('Content-Type: text/html; charset=ISO-8859-1');
    date_default_timezone_set("America/Lima");
    include_once('../basededatos/conectar_bd.php');
    $mysqli = conectarBD();
  	session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

  	 	$curso=$_POST['curso'];
  	 	$codcurso=$_POST['codcurso'];
        $campus =$_POST['campus'];
        $seccion=$_POST['seccion'];
 		$vacantes=$_POST['vacantes'];     
//ACORDARSE DE LAS VACANTES < 20 SOLO SE GENERA UN GRUPO
  	 $horas=[];
       //[teoria,practica,laboratorio,grupos]
       $result = $mysqli->query("select *from cursos where nombre='".$curso."'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        array_push($horas,$row['teoria']);
        array_push($horas,$row['practica']);
        array_push($horas,$row['laboratorio']);
        array_push($horas,$row['grupos']);
  		//var_dump($_POST);

  	}
  	if($horas[3]<1) //Si grupos <2
  		$num_grupo=0;
  	else
  		$num_grupo=1;
  	

  		//------------AGREGANDO EL AULA TEORICA A LA TABLA HORARIOS----------
  		if(isset($_POST['te_inicio']) && isset($_POST['te_fin'])){
  			$te_dia=$_POST['te_dia'];
  			$te_aula=$_POST['aula_te'];
  			$te_docente=$_POST['te_docente'];

  			$te_inicio=explode(":",$_POST['te_inicio']);
  			$te_fin=explode(":",$_POST['te_fin']);
  			//var_dump($te_inicio);
  			//var_dump($te_fin);
  			$te_inicio=(int)$te_inicio[0];
  			$te_fin=(int)$te_fin[0];
  			if ($te_fin-$te_inicio>$horas[0] || $te_inicio>$te_fin) { //comparar las horas de clase con las de inicio y fin
  				echo '<script language = javascript>
            alert("La Hora de inicio de clase de teoria no debe superara la hora de fin y no se puede exceder de las horas del curso. Vuelva a intentarlo")
            self.location = "../menu_admin.php" </script>';
  			}
  			else{
  			
  			$sql="INSERT INTO horarios (codcurso,seccion, tiposesion, dia, hora_inicio, hora_fin, aula, tipo_aula, sede, grupo, estado, vacantes, ciclo, iddocente) VALUES ('$codcurso','$seccion','TE','$te_dia','".$te_inicio.":00:00','".$te_fin.":00:00','$te_aula','TEORICA','$campus',0,'ABIERTA','$vacantes','2020-2','$te_docente')";
  				

  				 if($mysqli->query($sql)){
			      	 echo '<script language =javascript>
			     	alert("Se ha ingresado su disponibilidad horaria correctamente")
			   		self.location = "../menu_admin.php"</script>';
			      }
  				//var_dump($codcurso);
  				//var_dump($seccion);
  				}
  		}

  		//---------------AGREGANDO EL AULA PRACTICA A LA TABLA HORARIOS----------------
  		if(isset($_POST['pr_inicio']) && isset($_POST['pr_fin'])){
  			$pr_dia=$_POST['pr_dia'];
  			$pr_aula=$_POST['aula_pr'];
  			$pr_docente=$_POST['pr_docente'];


  			$pr_inicio=explode(":",$_POST['pr_inicio']);
  			$pr_fin=explode(":",$_POST['pr_fin']);
  			//var_dump($te_inicio);
  			//var_dump($te_fin);
  			$pr_inicio=(int)$pr_inicio[0];
  			$pr_fin=(int)$pr_fin[0];
  			if ($pr_fin-$pr_inicio>$horas[1] || $pr_inicio>$pr_fin) {
  				echo '<script language = javascript>
            alert("La Hora de inicio de clase de practica no debe superara la hora de fin y no se puede exceder de las horas del curso. Vuelva a intentarlo")
            self.location = "../menu_admin.php" </script>';
  			}
  			else{
  			$sql="INSERT INTO horarios (codcurso,seccion, tiposesion, dia, hora_inicio, hora_fin, aula, tipo_aula, sede, grupo, estado, vacantes, ciclo, iddocente) VALUES ('$codcurso','$seccion','PR','$pr_dia','".$pr_inicio.":00:00','".$pr_fin.":00:00','$pr_aula','LABORATORIO','$campus',0,'ABIERTA','$vacantes','2020-2','$pr_docente')";


  				 if($mysqli->query($sql)){
			      	 echo '<script language =javascript>
			     	alert("Se ha ingresado su disponibilidad horaria correctamente")
			   		self.location = "../menu_admin.php"</script>';
			      }
			   
  				
  			}
  		}

  		//----------CREAR UN SOLO GRUPO DE LABORATORIO SI LAS VACANTES SON MENORES A 20-------------
  		if ($vacantes<21) {
  			if(isset($_POST['lb1_inicio']) && isset($_POST['lb1_fin'])){
  			$lb1_dia=$_POST['lb1_dia'];
  			$lb1_aula=$_POST['aula_lb1'];
  			$lb1_docente=$_POST['lb1_docente'];

  			$lb1_inicio=explode(":",$_POST['lb1_inicio']);
  			$lb1_fin=explode(":",$_POST['lb1_fin']);
  			//var_dump($te_inicio);
  			//var_dump($te_fin);
  			$lb1_inicio=(int)$lb1_inicio[0];
  			$lb1_fin=(int)$lb1_fin[0];
  			if ($lb1_fin-$lb1_inicio>$horas[2] || $lb1_inicio>$lb1_fin) {
  				echo '<script language = javascript>
            alert("La Hora de inicio de clase del laboratorio del grupo 1 no debe superara la hora de fin y no se puede exceder de las horas del curso. Vuelva a intentarlo")
            self.location = "../menu_admin.php" </script>';
  			}

  			else{
  				$sql="INSERT INTO horarios (codcurso,seccion, tiposesion, dia, hora_inicio, hora_fin, aula, tipo_aula, sede, grupo, estado, vacantes, ciclo, iddocente) VALUES ('$codcurso','$seccion','LB','$lb1_dia','".$lb1_inicio.":00:00','".$lb1_fin.":00:00','$lb1_aula','LABORATORIO','$campus',0,'ABIERTA','$vacantes','2020-2','$lb1_docente')";


  				 if($mysqli->query($sql)){
			      	 echo '<script language =javascript>
			     	alert("Se ha ingresado su disponibilidad horaria correctamente")
			   		self.location = "../menu_admin.php"</script>';
		      }
			     
  			}
  				
  		 }
  		}

  		//-----------CREANDO 2 GRUPOS DE LABORATORIOS SI LAS VACANTES >20-------------
  		else{
  		    //---------------CREANDO GRUPO 1 DE LABORATORIOS---------------
  		if(isset($_POST['lb1_inicio']) && isset($_POST['lb1_fin'])){
  			$lb1_dia=$_POST['lb1_dia'];
  			$lb1_aula=$_POST['aula_lb1'];
  			$lb1_docente=$_POST['lb1_docente'];

  			$lb1_inicio=explode(":",$_POST['lb1_inicio']);
  			$lb1_fin=explode(":",$_POST['lb1_fin']);
  			//var_dump($te_inicio);
  			//var_dump($te_fin);
  			$lb1_inicio=(int)$lb1_inicio[0];
  			$lb1_fin=(int)$lb1_fin[0];
  			if ($lb1_fin-$lb1_inicio>$horas[2] || $lb1_inicio>$lb1_fin) {
  				echo '<script language = javascript>
            alert("La Hora de inicio de clase del laboratorio del grupo 1 no debe superara la hora de fin y no se puede exceder de las horas del curso. Vuelva a intentarlo")
            self.location = "../menu_admin.php" </script>';
  			}
  			else{
  				$sql="INSERT INTO horarios (codcurso,seccion, tiposesion, dia, hora_inicio, hora_fin, aula, tipo_aula, sede, grupo, estado, vacantes, ciclo, iddocente) VALUES ('$codcurso','$seccion','LB','$lb1_dia','".$lb1_inicio.":00:00','".$lb1_fin.":00:00','$lb1_aula','LABORATORIO','$campus','$num_grupo','ABIERTA','$vacantes','2020-2','$lb1_docente')";


  				 if($mysqli->query($sql)){
			      	 echo '<script language =javascript>
			     	alert("Se ha ingresado su disponibilidad horaria correctamente")
			   		self.location = "../menu_admin.php"</script>';
			      }
			     
  			}
  				
  		}
  		//----------------CREANDO GRUPO 2 DE LABORATORIOS-------------------
  		if(isset($_POST['lb2_inicio']) && isset($_POST['lb2_fin'])){
  			$lb2_dia=$_POST['lb2_dia'];
  			$lb2_aula=$_POST['aula_lb2'];
  			$lb2_docente=$_POST['lb2_docente'];

  			$lb2_inicio=explode(":",$_POST['lb2_inicio']);
  			$lb2_fin=explode(":",$_POST['lb2_fin']);
  			//var_dump($te_inicio);
  			//var_dump($te_fin);
  			$lb2_inicio=(int)$lb2_inicio[0];
  			$lb2_fin=(int)$lb2_fin[0];
  			if ($lb2_fin-$lb2_inicio>$horas[2] || $lb2_inicio>$lb2_fin) {
  				echo '<script language = javascript>
            alert("La Hora de inicio de clase del laboratorio del grupo 2 no debe superara la hora de fin y no se puede exceder de las horas del curso. Vuelva a intentarlo")
            self.location = "../menu_admin.php" </script>';
  			}
  			else{
  				$sql="INSERT INTO horarios (codcurso,seccion, tiposesion, dia, hora_inicio, hora_fin, aula, tipo_aula, sede, grupo, estado, vacantes, ciclo, iddocente) VALUES ('$codcurso','$seccion','LB','$lb2_dia','".$lb2_inicio.":00:00','".$lb2_fin.":00:00','$lb2_aula','LABORATORIO','$campus',2,'ABIERTA','$vacantes','2020-2','$lb2_docente')";


  				 if($mysqli->query($sql)){
			      	 echo '<script language =javascript>
			     	alert("Se ha ingresado su disponibilidad horaria correctamente")
			   		self.location = "../menu_admin.php"</script>';
			      }
			     

  			}
  				
  		}
  	}
  	

  }
  ?>