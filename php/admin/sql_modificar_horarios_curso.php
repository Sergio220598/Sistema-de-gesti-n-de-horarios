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
  		  var_dump($_POST);

  	}
  	if($horas[3]<2) //Si grupos <2
  		$num_grupo=0;
  	else
  		$num_grupo=1;
  	

  		//------------AGREGANDO EL AULA TEORICA A LA TABLA HORARIOS----------
  		if(isset($_POST['te_inicio']) && isset($_POST['te_fin'])){
  			$te_dia=$_POST['te_dia'];
  			$te_aula=$_POST['aula_te'];
  			$te_docente=$_POST['te_docente'];
        $te_tiposesion_actual=$_POST['te_tiposesion_actual'];
        $te_grupo_actual=$_POST['te_grupo_actual'];


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
  			

        $sql = "update horarios set codcurso='".$codcurso."',seccion='".$seccion."',tiposesion='TE',dia='".$te_dia."',
                  hora_inicio='".$te_inicio.":00:00',hora_fin='".$te_fin.":00:00',aula='".$te_aula."',tipo_aula='TEORICA',
                  sede='".$campus."',grupo='0',estado='ABIERTA', vacantes='".$vacantes."', ciclo='2020-2',
                  iddocente='".$te_docente."' where codcurso='".$codcurso."' and sede='".$campus."' and tiposesion='".$te_tiposesion_actual."' and grupo='".$te_grupo_actual."' and ciclo='2020-2'";

  				 if($mysqli->query($sql)){
              echo "bien";
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
        $pr_tiposesion_actual=$_POST['pr_tiposesion_actual'];
        $pr_grupo_actual=$_POST['pr_grupo_actual'];


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
  			 $sql = "update horarios set codcurso='".$codcurso."',seccion='".$seccion."',tiposesion='PR',dia='".$pr_dia."',
                  hora_inicio='".$pr_inicio.":00:00',hora_fin='".$pr_fin.":00:00',aula='".$pr_aula."',tipo_aula='LABORATORIO',
                  sede='".$campus."',grupo='1',estado='ABIERTA', vacantes='".$vacantes."', ciclo='2020-2',
                  iddocente='".$pr_docente."' where codcurso='".$codcurso."' and sede='".$campus."' and tiposesion='".$pr_tiposesion_actual."' and grupo='".$pr_grupo_actual."' and ciclo='2020-2'";


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
        $lb1_tiposesion_actual=$_POST['lb1_tiposesion_actual'];
        $lb1_grupo_actual=$_POST['lb1_grupo_actual'];

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
  				 $sql = "update horarios set codcurso='".$codcurso."',seccion='".$seccion."',tiposesion='LB',dia='".$lb1_dia."',
                  hora_inicio='".$lb1_inicio.":00:00',hora_fin='".$lb1_fin.":00:00',aula='".$lb1_aula."',tipo_aula='LABORATORIO',
                  sede='".$campus."',grupo='1',estado='ABIERTA', vacantes='".$vacantes."', ciclo='2020-2',
                  iddocente='".$lb1_docente."' where codcurso='".$codcurso."' and sede='".$campus."' and tiposesion='".$lb1_tiposesion_actual."' and grupo='".$lb1_grupo_actual."' and ciclo='2020-2'";


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
        $lb1_tiposesion_actual=$_POST['lb1_tiposesion_actual'];
        $lb1_grupo_actual=$_POST['lb1_grupo_actual'];

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
  			 $sql = "update horarios set codcurso='".$codcurso."',seccion='".$seccion."',tiposesion='LB',dia='".$lb1_dia."',
                  hora_inicio='".$lb1_inicio.":00:00',hora_fin='".$lb1_fin.":00:00',aula='".$lb1_aula."',tipo_aula='LABORATORIO',
                  sede='".$campus."',grupo='1',estado='ABIERTA', vacantes='".$vacantes."', ciclo='2020-2',
                  iddocente='".$lb1_docente."' where codcurso='".$codcurso."' and sede='".$campus."' and tiposesion='".$lb1_tiposesion_actual."' and grupo='".$lb1_grupo_actual."' and ciclo='2020-2'";



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
        $lb2_tiposesion_actual=$_POST['lb2_tiposesion_actual'];
        $lb2_grupo_actual=$_POST['lb2_grupo_actual'];

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
  			 $sql = "update horarios set codcurso='".$codcurso."',seccion='".$seccion."',tiposesion='LB',dia='".$lb2_dia."',
                  hora_inicio='".$lb2_inicio.":00:00',hora_fin='".$lb2_fin.":00:00',aula='".$lb2_aula."',tipo_aula='LABORATORIO',
                  sede='".$campus."',grupo='2',estado='ABIERTA', vacantes='".$vacantes."', ciclo='2020-2',
                  iddocente='".$lb2_docente."' where codcurso='".$codcurso."' and sede='".$campus."' and tiposesion='".$lb2_tiposesion_actual."' and grupo='".$lb2_grupo_actual."' and ciclo='2020-2'";



  				 if($mysqli->query($sql)){
			      	 echo '<script language =javascript>
			     	alert("Se ha modificado el horario correctamente")
			   		self.location = "../menu_admin.php"</script>';
			      }
			     

  			}
  				
  		}
  	}
  	

  }
  ?>