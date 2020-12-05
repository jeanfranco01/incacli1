<!DOCTYPE html>
<html>
    <?php require "base/head_html.php"; ?>
    <body>
      	<?php require "base/menu.php"?>
      	<script>

        	$(document).ready(function(){
      		$("label").addClass('black-text');
          	$("select").material_select();

        		$.fn.dataTable.ext.errMode = 'none';
        		dtlistatien();
        function dtlistatien(){  
	          	var dt_lista_tienda= $("#data_table_lista_tienda").DataTable({
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
		                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
		                        }
		                    },
		                    {
		                        extend: 'excelHtml5',
		                        footer: true,
		                        exportOptions: {
		                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
		                        }
		                    },
		                    {
		                        extend: 'pdfHtml5',
		                        footer: true,
		                        exportOptions: {
		                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
		                        }
		                    },
		                    {
		                        extend: 'print',
		                        footer: true,
		                        exportOptions: {
		                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
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
		              url: 'lista_tienda/getAllListaTienda',
		              type: 'POST' 
		            },
		  
		            "columns": [
		 
		              { "data": "Id_tienda", "name": "Id_tienda"},
		              { "data": "Razon_social_nombre_tienda", "name": "Razon_social_nombre_tienda"},
		              { "data": "Propietario", "name": "Propietario"},
		              { "data": "DNI", "name": "DNI"},
		              { "data": "Telefono", "name": "Telefono"},
		              { "data": "Direccion", "name": "Direccion"},
		              { "data": "Fecha_registro", "name": "Fecha_registro"},
		              { "data": "Email", "name": "Email"},
		              { "data": "Opciones", "name": "Opciones"}
		          
		            ]
	          	});

	          }

        	
/***EDITAR LISTA TIENDA***/
		$(document).on('click','.btn_edit_tienda',function(e){ 
			var id_tienda=$(this).attr("id_tienda");
      		$('#id_tienda').attr('value',id_tienda);
      	
			$.ajax({
    		
            url:"lista_tienda/gettlistatienda",  
            type: 'post',
      		dataType: 'json',                             
            data: {
            	id_tienda:id_tienda
            }

    	}).always(function(respuesta){
		console.log(respuesta);		 
		$('#form_edit_listatienda input[id=direccion_tienda]').val(respuesta[0]['Direccion']);
		$('#form_edit_listatienda input[id=email_tienda]').val(respuesta[0]['Email']); 
		$('#form_edit_listatienda input[id=fecha]').val(respuesta[0]['Fecha_registro']);  
    	$('#form_edit_listatienda input[id=id_tienda]').val(respuesta[0]['Id_tienda']);
		$('#form_edit_listatienda input[id=nombre_tienda]').val(respuesta[0]['Razon_social_nombre_tienda']);
		$('#form_edit_listatienda input[id=propietario_tienda]').val(respuesta[0]['Propietario']);
		$('#form_edit_listatienda input[id=telefono_tienda]').val(respuesta[0]['Telefono']);
		
		$("#modal_edit_lista_tienda").openModal();
		 });

            
	});
/***EDITAR BOTON ACEPTAR LISTA TIENDA***/
		$(document).on('click','#btn_form_edite_listatienda',function(e){  
  			var Codigo=$("#id_tienda").val();
			var Nombre_tienda=$("#nombre_tienda").val();
			var Propietario=$("#propietario_tienda").val();
			var Telefono=$("#telefono_tienda").val();
			var Direccion=$("#direccion_tienda").val();
			var Fecha=$("#fecha").val();
			var Email=$("#email_tienda").val();
			$.ajax({
    		type: 'post',
            url:"lista_tienda/getteditlistatienda",                               
            data: {
            	Codigo:Codigo,
            	Nombre_tienda:Nombre_tienda,
            	Propietario:Propietario,
            	Telefono:Telefono,
            	Direccion:Direccion,
            	Fecha:Fecha,
            	Email:Email
            }

    	}).always(function(respuesta){
		console.log(respuesta);		
		dtlistatien(); 
		   $("#modal_edit_lista_tienda").closeModal();
		   
		Materialize.toast('Actualizacion exitosa',3000,'rounded green');
	    });
          }); 
/*****BOTON ELIMINAR**/
$(document).on('click','.btn_delete_tienda',function(e){  
	var id_tienda=$(this).attr("id_tienda");
	alertify.confirm("¿DESEA ELIMINAR LA TIENDA "+id_tienda+" ?",
        function(){

          $.ajax({
            type: 'post',
            url:"lista_tienda/getteliminartienda",                               
            data: {
              id_tienda:id_tienda               
            }
          }).always(function(response){
              console.log(response);
              dtlistatien();
              Materialize.toast("SE ELIMINO CORRECTAMENTE", 3000, "rounded green");
          });  

          }, function(){
          Materialize.toast("PROCESO CANCELADO", 3000, "rounded red");
        	dtlistatien();
        }); 
});

/***BOTON DE VISUALISAR LOGO***/
$(document).on('click','.btn_view_tienda',function(e){
	var id_tienda=$(this).attr("id_tienda");
	
	$("#modal_edit_imagen").openModal();
});

});
        	$(document).ready(function(){
	          	$('.button-collapse').sideNav({
	              menuWidth: 320, 
	              edge: 'left', 
	              closeOnClick: false, 
	              draggable: true 
	            });
        	}); 
	  	</script>
	  	<main>
	    	<?php require "lista_tienda/menu_lista_tienda.php" ?>
	  	</main>
	  	<div>
			<form action="cargar_archivo" method="post" enctype="multipart/form-data">
				<input type="file" name="upload">
				<input type="submit" value="Submit">
			</form>
		</div>
    </body>
</html>