$(document).ready(function(){

    $("#crear_horario").click(function(){
         $("#titulo").hide();
         $("#crear_horario_div").toggle(2000);
         $("#ver_ocupabilidad_div").hide();
         $("#modificar_horario_div").hide();
         $("#cambiar_clave").hide();
         $("#eliminar_horario_div").hide();
         $("#crear_docente").hide();
         $("#ver_disponibilidad_docente_adm").hide();
         $("#disponibilidad_docente_adm").hide();
         $("#editar_docente").hide();
         $("#ver_horarios_por_curso").hide();
         $("#ver_horarios_por_ciclo").hide();
         $("#ver_todos_horarios_por_carrera").hide();
         
    });

 $("#ver_ocupabilidad").click(function(){
 		
         $("#titulo").hide();
         $("#crear_horario_div").hide();
         $("#ver_ocupabilidad_div").toggle(2000);
         $("#modificar_horario_div").hide();
         $("#cambiar_clave").hide();
         $("#disponibilidad_docente_adm").hide();
         $("#eliminar_horario_div").hide();
         $("#crear_docente").hide();
         $("#editar_docente").hide();
         $("#ver_disponibilidad_docente_adm").hide();
         $("#ver_horarios_por_curso").hide();
         $("#ver_horarios_por_ciclo").hide();
         $("#ver_todos_horarios_por_carrera").hide();
    });

  $("#modificar_horario").click(function(){
  
         $("#titulo").hide();
         $("#crear_horario_div").hide();
         $("#ver_ocupabilidad_div").hide();
         $("#modificar_horario_div").toggle(2000);
         $("#cambiar_clave").hide();
         $("#disponibilidad_docente_adm").hide();
         $("#eliminar_horario_div").hide();
         $("#ver_horarios_por_curso").hide();
         $("#ver_horarios_por_ciclo").hide();
         $("#ver_disponibilidad_docente_adm").hide();
         $("#crear_docente").hide();
         $("#editar_docente").hide();
         $("#ver_todos_horarios_por_carrera").hide();
         
    });

   $("#clave_admin").click(function(){
    
         $("#titulo").hide();
         $("#crear_horario_div").hide();
         $("#ver_ocupabilidad_div").hide();
         $("#modificar_horario_div").hide();
         $("#cambiar_clave").toggle(2000);
         $("#ver_disponibilidad_docente_adm").hide();
         $("#eliminar_horario_div").hide();
         $("#ver_horarios_por_curso").hide();
         $("#disponibilidad_docente_adm").hide();
         $("#ver_horarios_por_ciclo").hide();
         $("#editar_docente").hide();
         $("#ver_todos_horarios_por_carrera").hide();
         $("#crear_docente").hide();
    });

   $("#eliminar_horario").click(function(){
 
         $("#titulo").hide();
         $("#crear_horario_div").hide();
         $("#ver_ocupabilidad_div").hide();
         $("#modificar_horario_div").hide();
         $("#cambiar_clave").hide();
         $("#ver_disponibilidad_docente_adm").hide();
         $("#eliminar_horario_div").toggle(2000);
         $("#ver_horarios_por_curso").hide();
         $("#ver_horarios_por_ciclo").hide();
         $("#disponibilidad_docente_adm").hide();
         $("#editar_docente").hide();
         $("#ver_todos_horarios_por_carrera").hide();
         $("#crear_docente").hide();
    });

    $("#ver_horario_curso").click(function(){
 
         $("#titulo").hide();
         $("#crear_horario_div").hide();
         $("#ver_ocupabilidad_div").hide();
         $("#modificar_horario_div").hide();
         $("#cambiar_clave").hide();
         $("#ver_disponibilidad_docente_adm").hide();
         $("#disponibilidad_docente_adm").hide();
         $("#eliminar_horario_div").hide();
         $("#ver_horarios_por_curso").toggle(2000);
         $("#ver_horarios_por_ciclo").hide();
         $("#editar_docente").hide();
         $("#ver_todos_horarios_por_carrera").hide();
         $("#crear_docente").hide();
         
    });

       $("#ver_horario_ciclo").click(function(){
 
         $("#titulo").hide();
         $("#crear_horario_div").hide();
         $("#ver_ocupabilidad_div").hide();
         $("#disponibilidad_docente_adm").hide();
         $("#ver_disponibilidad_docente_adm").hide();
         $("#modificar_horario_div").hide();
         $("#cambiar_clave").hide();
         $("#eliminar_horario_div").hide();
         $("#ver_horarios_por_curso").hide();
         $("#editar_docente").hide();
         $("#ver_horarios_por_ciclo").toggle(2000);
         $("#ver_todos_horarios_por_carrera").hide();
         $("#crear_docente").hide();
         
    });
       $("#ver_horario_todos").click(function(){
 
         $("#titulo").hide();
         $("#crear_horario_div").hide();
         $("#ver_ocupabilidad_div").hide();
         $("#modificar_horario_div").hide();
         $("#cambiar_clave").hide();
         $("#eliminar_horario_div").hide();
         $("#ver_horarios_por_curso").hide();
         $("#ver_horarios_por_ciclo").hide();
         $("#crear_docente").hide();
         $("#ver_disponibilidad_docente_adm").hide();
         $("#disponibilidad_docente_adm").hide();
         $("#editar_docente").hide();
         $("#ver_todos_horarios_por_carrera").toggle(2000);
         
    });

       $("#InsertarNuevoDocente").click(function(){
 
         $("#titulo").hide();
         $("#crear_horario_div").hide();
         $("#ver_ocupabilidad_div").hide();
         $("#modificar_horario_div").hide();
         $("#cambiar_clave").hide();
         $("#eliminar_horario_div").hide();
         $("#ver_horarios_por_curso").hide();
         $("#ver_horarios_por_ciclo").hide();
         $("#ver_todos_horarios_por_carrera").hide();
         $("#ver_disponibilidad_docente_adm").hide();
         $("#crear_docente").toggle(2000);
         $("#editar_docente").hide();
         $("#disponibilidad_docente_adm").hide();
         
    });

       $("#EditarDatosDocente").click(function(){
 
         $("#titulo").hide();
         $("#crear_horario_div").hide();
         $("#ver_ocupabilidad_div").hide();
         $("#modificar_horario_div").hide();
         $("#cambiar_clave").hide();
         $("#eliminar_horario_div").hide();
         $("#ver_horarios_por_curso").hide();
         $("#ver_horarios_por_ciclo").hide();
         $("#ver_todos_horarios_por_carrera").hide();
         $("#crear_docente").hide()
         $("#editar_docente").toggle(2000);
         $("#disponibilidad_docente_adm").hide();
         $("#ver_disponibilidad_docente_adm").hide();

         
         
    });


     $("#InsertarDisponibilidadDocente").click(function(){
     
             $("#titulo").hide();
             $("#crear_horario_div").hide();
             $("#ver_ocupabilidad_div").hide();
             $("#modificar_horario_div").hide();
             $("#cambiar_clave").hide();
             $("#eliminar_horario_div").hide();
             $("#ver_horarios_por_curso").hide();
             $("#ver_horarios_por_ciclo").hide();
             $("#ver_todos_horarios_por_carrera").hide();
             $("#crear_docente").hide();
             $("#disponibilidad_docente_adm").toggle(2000);
             $("#ver_disponibilidad_docente_adm").hide();
             
        });

      $("#VerDisponibilidadDocente").click(function(){
     
             $("#titulo").hide();
             $("#crear_horario_div").hide();
             $("#ver_ocupabilidad_div").hide();
             $("#modificar_horario_div").hide();
             $("#cambiar_clave").hide();
             $("#eliminar_horario_div").hide();
             $("#ver_horarios_por_curso").hide();
             $("#ver_horarios_por_ciclo").hide();
             $("#ver_todos_horarios_por_carrera").hide();
             $("#crear_docente").hide();
             $("#disponibilidad_docente_adm").hide();
             $("#ver_disponibilidad_docente_adm").toggle(2000);

             
             
        });



});