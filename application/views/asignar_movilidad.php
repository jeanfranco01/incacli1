<!DOCTYPE html>
<html>
    <?php require "base/head_html.php"; ?>
    <body>
      <?php require "base/menu.php"?>
      
      <script>

$(document).ready(function(){
  $.fn.dataTable.ext.errMode = 'none';
  /*setTimeout('document.location.reload()', 60000);*/
  $("label").addClass('black-text');
  $("select").material_select();


  var dt_movilidad= $("#data_table_movilidad").DataTable({
        "order": [[ 0, "desc" ]],
        "responsive": true,
          "scrollL": true,
          "scrollS": true,
          "scrollX": true,
        "iDisplayLength": -1,
          "dom": 'Bfrtip',
          "info": false,
          "bPaginate": false,
        "buttons": [
                {
                    extend: 'copyHtml5',
                    footer: true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    footer: true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    footer: true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                }

                //'colvis'    
        ],
        "language": {
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "zeroRecords": "No se encontró registros",
          "info": "Mostrando pagina _PAGE_ de _PAGES_",
          "infoFiltered":   "(Filtrado de _MAX_ total registros)",
          "infoEmpty": "No hay registros disponibles",
          "search": "Buscar",
          "display" : "cantidad",
          "paginate": {
            "first":      "Primero",
            "last":       "Ultimo",
            "next":       "Siguiente",
            "previous":   "Anterior"
          },
        },
        "processing": true,
        "paging": false,
        "info": false,
        "serverSide": false,
        "destroy": true,
        "ajax": {
          url: 'asignar_movilidad/getAllMovilidad',
          type: 'POST' 
        },

        "columns": [

        { "data": "Id_movilidad", "name": "Id_movilidad"},
        { "data": "Placa", "name": "Placa"},
        { "data": "Estado", "name": "Estado"},
        { "data": "Id_tienda", "name": "Id_tienda"},

        { "data": "Opciones", "name": "Opciones"}
      
        ]
      });


    function dtmovilidad(){
       var dt_movilidad= $("#data_table_movilidad").DataTable({
        "order": [[ 0, "desc" ]],
        "responsive": true,
          "scrollL": true,
          "scrollS": true,
          "scrollX": true,
        "iDisplayLength": -1,
          "dom": 'Bfrtip',
          "info": false,
          "bPaginate": false,
        "buttons": [
                {
                    extend: 'copyHtml5',
                    footer: true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    footer: true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    footer: true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                }

                //'colvis'    
        ],
        "language": {
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "zeroRecords": "No se encontró registros",
          "info": "Mostrando pagina _PAGE_ de _PAGES_",
          "infoFiltered":   "(Filtrado de _MAX_ total registros)",
          "infoEmpty": "No hay registros disponibles",
          "search": "Buscar",
          "display" : "cantidad",
          "paginate": {
            "first":      "Primero",
            "last":       "Ultimo",
            "next":       "Siguiente",
            "previous":   "Anterior"
          },
        },
        "processing": true,
        "paging": false,
        "info": false,
        "serverSide": false,
        "destroy": true,
        "ajax": {
          url: 'asignar_movilidad/getAllMovilidad',
          type: 'POST' 
        },

        "columns": [

        { "data": "Id_movilidad", "name": "Id_movilidad"},
        { "data": "Placa", "name": "Placa"},
        { "data": "Estado", "name": "Estado"},
        { "data": "Id_tienda", "name": "Id_tienda"},

        { "data": "Opciones", "name": "Opciones"}
      
        ]
      });

    }   
/*crear un nueva movilidad modal */    
  $("#btn_add_movilidad").click(function(e){

    $("#modal_add_movilidad").openModal()
  });
 /*AGREGAR UNA PLACA NUEVA**/
  $("#btn_form_add_movilidad").click(function(e){
  
    var placa=$("#add_placa").val();
    
    $.ajax({
          method: 'post',
              url:"asignar_movilidad/gettaddmovilidad",                               
              data: {
                placa:placa
              }
        }).always(function(respuesta){
      console.log(respuesta);
      Materialize.toast('Se agrego la nueva placa exitosamente',3000,'rounded green');
      dtmovilidad();
       $("#modal_add_movilidad").closeModal();
    });
  });
  /*EDITAR UNA PLACA **/


  $(document).on('click','.editar-movimiento',function(e){
  
    var movilidad=$(this).attr('Id_movilidad');
    $('#Id_movilidad').attr('value',movilidad);
  
    $.ajax({
       url: 'asignar_movilidad/getByIdmovilidad',
      type: 'post',
      dataType: 'json',
      data: {movilidad:movilidad}
    }).done(function(respuesta){
      console.log(respuesta);
      $('#modal_edit_movilidad input[id=edit_placa]').val(respuesta[0]['Placa']);
      $('#modal_edit_movilidad label').addClass('active');
      $('#modal_edit_movilidad').openModal();
    });


    $("#modal_edit_movilidad").openModal();
  });
  /*ACEPTAR DEL EDITAR UNA PLACA*/
  $("#btn_form_edit_movilidad").click(function(e){
    var movilidad=$("#Id_movilidad").val();
    var placa =$("#edit_placa").val();
    $.ajax({
          method: 'post',
              url:"asignar_movilidad/getteditmovilidad",                               
              data: {
                placa:placa,
                movilidad:movilidad
              }
        }).always(function(respuesta){
      console.log(respuesta);
      Materialize.toast('Actualizacion exitosa',3000,'rounded orange');
      $('#modal_edit_movilidad').closeModal();
      dtmovilidad();
    });
   
  });
  /*ELIMINAR UNA PLACA**/
  $(document).on('click','.delete_movilidad',function(e){
    var movilidad=$(this).attr("Id_movilidad");
    $('#Id_movilidad').attr('value',movilidad);   

      alertify.confirm("¿DESEA ELIMINAR LA PLACA?",
        function(){

          $.ajax({
            method: 'post',
            url:"asignar_movilidad/getteliminarmovilidad",                               
            data: {
              movilidad:movilidad               
            }
          }).done(function(response){
              console.log(response);
              Materialize.toast("CIERRE EXITOSO", 3000, "rounded green");
              dtmovilidad();
          });  

          }, function(){
          Materialize.toast("PROCESO CANCELADO", 3000, "rounded red");
          dtmovilidad();
        }); 
  });



});


        $(document).ready(function(){
          $('.button-collapse').sideNav({
              menuWidth: 320, 
              edge: 'left', 
              closeOnClick: false, 
              draggable: true 
            }
          );
        }); 
      </script>
       <main>
        <?php require "asignar_movilidad/menu_movilidad.php" ?>
      </main>
    </body>
</html>