<!DOCTYPE html>
<html>
    <?php require "base/head_html.php"; ?>
    <body>
      	<?php require "base/menu.php"?>
      	<script>
        	$(document).ready(function(){
          
	          	$.fn.dataTable.ext.errMode = 'none';

	          	//setTimeout('document.location.reload()', 60000);

	          	var dt_principal= $("#data_table_repartidor").DataTable({
		            "order": [[ 0, "desc" ]],
		            "responsive": true,
		              "scrollL": true,
		              "scrollS": true,
		              "scrollX": true,
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
		              url: 'repartidor/getAllRepartidorPendiente',
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
		              { "data": "Monto_platillo", "name": "Monto_platillo"},
		              { "data": "Monto_extra", "name": "Monto_extra"},*/
		              { "data": "Monto_total", "name": "Monto_total"},
		              { "data": "Opciones", "name": "Opciones"}
		          
		            ]
		        });

		        function tabla_principal(estado_compra){
		            var estado_compra = estado_compra;

		            if (estado_compra==3 || estado_compra==4) {
		              var dt_principales= $("#data_table_repartidor").DataTable({
		                "order": [[ 0, "desc" ]],
		                "responsive": true,
		                  "scrollL": true,
		                  "scrollS": true,
		                  "scrollX": true,
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
		                "columnDefs": [
		                {
		                    "targets": [ 8 ],
		                    "visible": false,
		                    "searchable": false
		                }],
		                "serverSide": false,
		                "destroy": true,
		                "ajax": {
		                  url: 'repartidor/getAllRepartidorPendiente',
		                  type: 'POST',
		                  data:{
		                    estado_compra:estado_compra
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
		                  { "data": "Monto_total", "name": "Monto_total"},
		                  { "data": "Opciones", "name": "Opciones"}
		                ]
		              });
		            }else{
		              var dt_principales= $("#data_table_repartidor").DataTable({
		                "order": [[ 0, "desc" ]],
		                "responsive": true,
		                  "scrollL": true,
		                  "scrollS": true,
		                  "scrollX": true,
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
		                  url: 'repartidor/getAllRepartidorPendiente',
		                  type: 'POST',
		                  data:{
		                    estado_compra:estado_compra
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
		                  { "data": "Monto_total", "name": "Monto_total"},
		                  { "data": "Opciones", "name": "Opciones"}
		              
		                ]
		              });
		            }
		            
		        };

		        ///INICIO CONCLUIR
		        $(document).on('click','.concluir-compra',function(e){
		            var Id_compra=$(this).attr("Id_compra");
		            var Id_tienda=$(this).attr("Id_tienda");
		            var Id_usuario_cliente=$(this).attr("Id_usuario_cliente");
		            var Monto_total=$(this).attr("Monto_total");
		            
		            $("#btn_form_concluir_compra").attr("value",Id_compra);
		            $("#btn_form_concluir_compra").attr("Id_tienda",Id_tienda);
		            $("#btn_form_concluir_compra").attr("Id_usuario_cliente",Id_usuario_cliente);
		            $("#btn_form_concluir_compra").attr("Monto_total",Monto_total);
		            $("#concluir_compra_mensaje").html("<center><h4>¿Estas seguro que deseas concluir el pedido #<b>"+Id_compra+"</b>?</h4></center>");
		            $("#modal_mensaje_concluir").openModal();
		        });

		        $("#btn_form_concluir_compra").click(function(e){

		            var Id_compra=$("#btn_form_concluir_compra").attr("value");
		            var Id_tienda=$(this).attr("Id_tienda");
		            var Id_usuario_cliente=$(this).attr("Id_usuario_cliente");
		            var Monto_total=$(this).attr("Monto_total");

		            $.ajax({
		              url: 'tienda_admin/getConcluidoCompra',
		              method: 'post',
		              dataType: 'json',
		              data:{
		                Id_compra:Id_compra,
		                Id_tienda:Id_tienda,
		                Id_usuario_cliente:Id_usuario_cliente,
		                Monto_total:Monto_total
		              }
		            }).always(function(respuesta) {
		              tabla_principal(2);
		              //n_principal();
		              location.reload();
		              $("#modal_mensaje_concluir").closeModal();
		            });
		        });

		        $("#btn_concluir_compra").click(function(){
		            $("#modal_mensaje_concluir").closeModal();
		        });


		        $(document).on('click','.cancel-compra',function(e){
		            var Id_compra=$(this).attr("Id_compra");
		            
		            $("#btn_form_cancelar_compra").attr("value",Id_compra);
		            $("#cancelar_compra_mensaje").html("<center><h4>¿Estas seguro que deseas cancelar el pedido #<b>"+Id_compra+"</b>?</h4></center>");
		            $("#modal_mensaje_cancelar").openModal();

		        });

		        $("#btn_form_cancelar_compra").click(function(e){

		            var Id_compra=$("#btn_form_cancelar_compra").attr("value");

		            $.ajax({
		              url: 'tienda_admin/getCancelCompra',
		              method: 'post',
		              dataType: 'json',
		              data:{
		                Id_compra:Id_compra
		              }
		            }).always(function(respuesta) {
		              tabla_principal(1);
		              //vaciar();
		              //n_principal();
		              location.reload();
		              $("#modal_mensaje_cancelar").closeModal();
		            });
		        });
		        $("#btn_cancel_cancelar_compra").click(function(){
		            $("#modal_mensaje_cancelar").closeModal();
		        });

          	//FIN READY
          	});

        	$(document).ready(function(){
          		$('.button-collapse').sideNav({
              		menuWidth: 320, // Default is 300
              		edge: 'left', // Choose the horizontal origin
              		closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
              		draggable: true // Choose whether you can drag to open on touch screens
            	});
        	}); 
      	</script>
      	<main>
        	<?php require "repartidor/menu_repartidor.php" ?>
      	</main>
    </body>
</html>