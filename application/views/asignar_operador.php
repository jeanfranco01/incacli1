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


var dt_operador= $("#data_table_operador").DataTable({
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
                url: 'asignar_operador/getAllPedido',
                type: 'POST' 
              },
    
              "columns": [
   
              { "data": "Id_compra", "name": "Id_compra"},
              { "data": "Fecha", "name": "Fecha"},
              { "data": "Hora", "name": "Hora"},
              { "data": "Usuario_cliente", "name": "Usuario_cliente"},
              { "data": "Direccion", "name": "Direccion"},
              { "data": "Telefono", "name": "Telefono"},
              { "data": "Pedido", "name": "Pedido"},
              { "data": "Metodo", "name": "Metodo"},
              /*{ "data": "Extra", "name": "Extra"},
              { "data": "Monto_platillo", "name": "Monto_platillo"},*/
              { "data": "nombre_tienda", "name": "nombre_tienda"},
              { "data": "Monto_total", "name": "Monto_total"},
              { "data": "Opciones", "name": "Opciones"}
            
              ]
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
        <?php require "asignar_operador/menu_operador.php" ?>
      </main>
    </body>
</html>