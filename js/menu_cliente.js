
$(document).ready(function(){

    $("#disponibilidad").click(function(){
         $("#titulo").hide();
         $("#disponibilidad_docente").toggle(2000);
         $("#cambiar_clave").hide();
         $("#ver_horario_2").hide();
         $("#ver_estadisticas_div").hide();
    });

    $("#clave").click(function(){
         $("#titulo").hide();
         $("#disponibilidad_docente").hide();
         $("#cambiar_clave").toggle(2000);
         $("#ver_horario_2").hide();
         $("#ver_estadisticas_div").hide();
    });

     $("#ver_horario").click(function(){
         $("#titulo").hide();
         $("#disponibilidad_docente").hide();
         $("#cambiar_clave").hide();
         $("#ver_horario_2").toggle(2000);
         $("#ver_estadisticas_div").hide();

    });

     $("#ver_estadisticas").click(function(){
         $("#titulo").hide();
         $("#disponibilidad_docente").hide();
         $("#cambiar_clave").hide();
         $("#ver_estadisticas_div").toggle(2000);
         $("#ver_horario_2").hide();

        });        
});