 <?php
    echo "hola";
    include('basedatos/conectar_bd.php');
    $mysqli=conectarBD();
     $json=[];
 if($_SERVER['REQUEST_METHOD'] == "POST"){
        parse_str(file_get_contents("php://input"),$post_data);
        if(!empty($post_data['curso']) && !empty($post_data['seccion'])  && !empty($post_data['docente'])  && !empty($post_data['inicio']) && !empty($post_data['fin']) && !empty($post_data['sesion']) && !empty($post_data['aula']) && !empty($post_data['dia']))
        {
            $curso= $post_data['curso'];
            $seccion=$post_data['seccion'];
            $docente=$post_data['docente'];
            $inicio=$post_data['inicio'];
            $fin=$post_data['fin'];
            $sesion=$post_data['sesion'];
            $aula=$post_data['aula'];
            $dia=$post_data['dia'];

            var_dump($post_data);

        }

 
    }

    ?>