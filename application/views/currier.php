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
		dt_tab_currier(2);
         
		function dt_tab_currier(estado){
			var estado=estado;
			
			if (estado==2) {

			var dt_currier= $("#data_table_principal").DataTable({
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
	              url: 'currier/getAllCurrier',
	              type: 'POST' ,
	              data:{
                    estado:estado
                  }
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
              { "data": "nombre_tienda", "name": "nombre_tienda"},
              { "data": "Monto_total", "name": "Monto_total"},
              { "data": "Placa", "name": "Placa"},
              { "data": "Opciones", "name": "Opciones"}
	          
	            ]
          	});

		}else{
			var dt_currier= $("#data_table_principal").DataTable({
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
	              url: 'currier/getAllCanceladoCurrier',
	              type: 'POST' ,
	              data:{
                    estado:estado
                  }
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
              
              { "data": "nombre_tienda", "name": "nombre_tienda"},
              { "data": "Monto_total", "name": "Monto_total"},
              { "data": "Placa", "name": "Placa"},
              { "data": "Opciones", "name": "Opciones"}
	          
	            ]
          	});




		}

		

		}
/****CARD PENDIENTE*/		
	$(document).on('click','#compra_enviado', function(e){
            t_pendiente="<center><h4 style='color:#4F0B25' >"+'PENDIENTE'+"</h4></center>";
              $("#div_principal_text_info").html(t_pendiente);
              dt_tab_currier(2);
          });
/****CARD CANCELADOS*/		
	$(document).on('click','#compra_cancelado', function(e){
            t_cancelado="<center><h4 style='color:#4F0B25' >"+'CANCELADO'+"</h4></center>";
              $("#div_principal_text_info").html(t_cancelado);
              dt_tab_currier(3);
          });
/****CARD CONCLUIDOS*/		
	$(document).on('click','#compra_concluido', function(e){
            t_concluido="<center><h4 style='color:#4F0B25' >"+'CONCLUIDO'+"</h4></center>";
              $("#div_principal_text_info").html(t_concluido);
          });



        $(document).on('click','.pedido-concluido',function(e){  
  			Materialize.toast('YA HA SIDO ASIGNADO LA MOVILIDAD',3000,'rounded orange');            
          }); 

		$(document).on('click','.editar-pedido',function(e){
            var id_compra=$(this).attr("Id_pedido");
             $('#id_compra').attr('value',id_compra);            
            $("#modal_edit_distribuidor").openModal();
          });

	/**BOTON ACEPTAR DEL MODAL ASIGNAR MOVILIDAD*/
	$(document).on('click','#btn_form_add_pedido',function(e){
    	var Id_tipo_distribuidor=$("#Id_tipo_distribuidor").val();
    	var id_compra=$("#id_compra").val();
    	var Id_repatidor=$("#Id_repatidor").val();

    	//console.log("Id_repatidor: "+Id_repatidor);

    	$.ajax({
    		method: 'post',
            url:"currier/gettaddpedido",                               
            data: {
            	Id_tipo_distribuidor:Id_tipo_distribuidor,
            	id_compra:id_compra,
            	Id_repatidor:Id_repatidor
            }

    	}).always(function(respuesta){
		console.log(respuesta);
		 //dt_currier.ajax.reload();
		 //$("#modal_edit_distribuidor").closeModal();
		   $("#modal_edit_distribuidor").closeModal();
		   dt_tab_currier(2);
		Materialize.toast('Actualizacion exitosa',3000,'rounded green');
	    });
	 });
	//*BOTON CANCELAR DEL MODAL ASIGNAR MOVILIDAD*/
	 $(document).on('click','#btn_cancel_add_pedido',function(e){
		document.getElementById("form_edit_distribuidor").reset();
		 $("#modal_edit_distribuidor").closeModal();
		
        });

	 $(document).on('click','.eliminar-pedido',function(e){
var id_compra=$(this).attr("Id_pedido");
  

	 alertify.confirm("¿DESEA ELIMINAR EL ORDEN DE PEDIDO #"+id_compra+" ",
        function(){
          $.ajax({
            method: 'post',
            url:"currier/getteliminarpedido",                               
            data: {
              id_compra:id_compra               
            }
          }).done(function(response){
              console.log(response);
              Materialize.toast(" SE ELIMINO EL PEDIDO EXITOSAMENTE", 3000, "rounded green");
              dt_tab_currier(2);
          });  

          }, function(){
          Materialize.toast("PROCESO CANCELADO", 3000, "rounded red");
          dt_tab_currier(2);
        }); 


	 });
          //FIN READY
     }); 

        

        /*add in base.js*/
        $(document).ready(function(){
          $('.button-collapse').sideNav({
              menuWidth: 320, // Default is 300
              edge: 'left', // Choose the horizontal origin
              closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
              draggable: true // Choose whether you can drag to open on touch screens
            }
          );
          // START OPEN
          //$('.button-collapse').sideNav('show');
        }); 
      </script>
      <main>
        <?php require "currier/menu_currier.php" ?>
      </main>
    </body>
</html>