<!DOCTYPE html>
<html>
    <?php require "base/head_html.php"; ?>
    <body>
      <?php require "base/menu.php"?>
      <script>
        $(document).ready(function(){

          $.fn.dataTable.ext.errMode = 'none';
          
          var dt_reporte_caja= $("#data_table_cierre_caja").DataTable({
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
                            columns: [ 0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5]
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
              url: 'cierre_caja/getAllReporteCierre',
              type: 'POST' 
            },
  
            "columns": [
 
              { "data": "Fecha_cierre_caja", "name": "Fecha_cierre_caja"},
              { "data": "Usuario_tienda", "name": "Usuario_tienda"},
              { "data": "Monto_cierre_caja", "name": "Monto_cierre_caja"},
              { "data": "Gastos", "name": "Gastos"},
              { "data": "Detalle_gastos", "name": "Detalle_gastos"},
              { "data": "Monto_final", "name": "Monto_final"}
          
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
        <?php require "cierre_caja/menu_cierre_caja.php" ?>
      </main>
    </body>
</html>