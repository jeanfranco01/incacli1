<!DOCTYPE html>
<html>
    <?php require "base/head_html.php"; ?>
    <body>
      <?php require "base/menu.php"?>
      <script>
        $(document).ready(function(){
      	
      	$.fn.dataTable.ext.errMode = 'none';
           
           $('select').material_select();

          	var dt_producto= $("#data_table_producto").DataTable({
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
	              url: 'producto/getAllProducto',
	              type: 'POST' 
	            },
	  
	            "columns": [
	 
	              { "data": "Id_platillo", "name": "Id_platillo"},
	              { "data": "Platillo", "name": "Platillo"},
	              { "data": "Descripcion", "name": "Descripcion"},
	              { "data": "Precio", "name": "Precio"},
	              { "data": "Nombre_menu", "name": "Nombre_menu"},
	              { "data": "Opciones", "name": "Opciones"}
	          
	            ]
          	}); 

          	function refrescarProducto(){
          		var dt_producto= $("#data_table_producto").DataTable({
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
		              url: 'producto/getAllProducto',
		              type: 'POST' 
		            },
		  
		            "columns": [
		 
		              { "data": "Id_platillo", "name": "Id_platillo"},
		              { "data": "Platillo", "name": "Platillo"},
		              { "data": "Descripcion", "name": "Descripcion"},
		              { "data": "Precio", "name": "Precio"},
	              	  { "data": "Nombre_menu", "name": "Nombre_menu"},
		              { "data": "Opciones", "name": "Opciones"}
		          
		            ]
	          	});
          	}

          	$(document).on('click','#btn_add_producto',function(e){
          		
	          
	          	var conteo_validador_categoria = <?= "'".count($conteo_categoria)."'" ?>;
							
				if(conteo_validador_categoria>0){
					$("#modal_add_producto").openModal();
	          		$("#btn_form_add_producto").removeAttr('disabled');
					} else{
						Materialize.toast('Primero necesitas registrar una categoria',2500,'rounded');
					}

	        });

	        $(document).on('click','#btn_add_categoria_producto',function(e){

	          	$("#modal_add_categoria_producto").openModal();
	          	//$("#btn_form_add_producto").removeAttr('disabled');

	        });

	        $(".btn_add_producto_row").click(function(event) {
	          	var temp = $('.add_producto').map(function() {
	            	return $(this).attr("id");
	          	});
	          
	          	var id_temp=temp.length;
	          	id_temp=id_temp+1;
	          	html="<div class='row row_add_producto prueba_"+id_temp+"' id='"+id_temp+"'>"+
	                  	"<div class='input-field col s12 m3 l3'>"+
	                    	"<input id='"+id_temp+"' id_ac='producto' type='text' class='validate add_producto' autocomplete='off'>"+
	                    	"<label class='black-text'>Producto</label>"+
	                	"</div>"+
	                    "<div class='input-field col s12 m5 l5'>"+
	                        "<input class='add_descripcion' type='text' id='"+id_temp+"' autocomplete='off'>"+
	                        "<label class='black-text'>Descripcion</label>"+
	                  	"</div>"+
	                  	"<div class='input-field col s6 m1 l1'>"+
	                        "<input class='add_precio validanumericos' step='0.01' type='number' id='"+id_temp+"' value='0.00' min='0'>"+
	                        "<label class='active black-text'>Precio</label>"+
	                  	"</div>"+
	                  	"<div class='col s6 m3 l3'>"+
	                        "<div class='file-field input-field'>"+
						      	"<div class='btn blue waves-effect waves-light'>"+
						        	"<span><i class='material-icons'>attach_file</i></span>"+
						        	"<input class='btn_imagen' type='file' id='add_archivo_"+id_temp+"' name='cotizaciones[]' accept='image/x-png,image/gif,image/jpeg'>"+
						      	"</div>"+
						      	"<div class='file-path-wrapper'>"+
						        	"<input name='add_adjunto' id='add_adjunto' readonly class='file-path' type='text' placeholder='Adjuntar imagen del producto'>"+
						      	"</div>"+
						    "</div>"+
	                  	"</div>"+
	                "</div>";
	          	$("#div_producto").append(html);

	        });

	        $(document).on('click','#btn_delete_producto_row',function(e){
        		/*codigo=$(this).attr("id_s");
				console.log("prueba_"+codigo);*/
				

				var temp = $('.add_producto').map(function() {
	            	return $(this).attr("id");
	          	});
				var id_temp=temp.length;
	          	//console.log("prueba_"+id_temp);
	          	$(".prueba_"+id_temp).remove();
			});

	        $("#btn_cancel_add_producto").click(function(event) {
	        	limpiar();
	        });
	        $("#btn_cancel_categoria_productos").click(function(e){
	        	$("#modal_add_categoria_producto").closeModal();
	        });
	        $("#btn_add_categoria_productos").click(function(e){
	        	/*$("#div_tipo_producto_menu").empty();
	          	var html="<div class='row row_add_producto' id=1>"+
		                  		
		                  		"<h4>Nombre de usuario:</h4>"+

		                    	"<input id=1 id_ac='producto' type='text' class='validate add_producto' autocomplete='off'>"+
		                	
		                "</div>";
	          	$("#div_tipo_producto_menu").append(html);*/
	          	var categoria_producto = $("#dbc_categoria_producto").val();
	          	var lunes = $("#dbc_Lunes").val();
	          	var martes = $("#dbc_Martes").val();
	          	var miercoles = $("#dbc_Miercoles").val();
	          	var jueves = $("#dbc_Jueves").val();
	          	var viernes = $("#dbc_Viernes").val();
	          	var sabado = $("#dbc_Sabado").val();
	          	var domingo = $("#dbc_Domingo").val();

	          	if(categoria_producto==null){
	            	Materialize.toast('Ingresa el catalogo del producto',2500,'rounded');
	          	} else{

		          	$.ajax({
		          		method: 'post',
	                    url:"producto/add_categoria_productos",
	                    dataType: 'json',
	                    data:{
	                    	categoria_producto:categoria_producto,
	                    	lunes:lunes,
	                    	martes:martes,
	                    	miercoles:miercoles,
	                    	jueves:jueves,
	                    	viernes:viernes,
	                    	sabado:sabado,
	                    	domingo:domingo
	                    },
	                    
		          	}).always(function(respuesta){
		          		//console.log(respuesta);
		          		$("#modal_add_categoria_producto").closeModal();
		          		$("#dbc_categoria_producto").val('');
		          		Materialize.toast('Exito se guardo el catalogo del producto',2500,'rounded');
		          		setTimeout('document.location.reload()',600);
		          	});
	          	}
	        });
	        $("#dia_lunes").click(function(){
	        	var valor = $("#dia_lunes").prop('checked');
	          	if(valor == true){ 
                  $("#dbc_Lunes").val(1);
                }else{  
                  $("#dbc_Lunes").val(0);
                }
            });
            $("#dia_martes").click(function(){
	        	var valor = $("#dia_martes").prop('checked');
	          	if(valor == true){ 
                  $("#dbc_Martes").val(2);
                }else{  
                  $("#dbc_Martes").val(0);
                }
            });
            $("#dia_miercoles").click(function(){
	        	var valor = $("#dia_miercoles").prop('checked');
	          	if(valor == true){ 
                  $("#dbc_Miercoles").val(3);
                }else{  
                  $("#dbc_Miercoles").val(0);
                }
            });
            $("#dia_jueves").click(function(){
	        	var valor = $("#dia_jueves").prop('checked');
	          	if(valor == true){ 
                  $("#dbc_Jueves").val(4);
                }else{  
                  $("#dbc_Jueves").val(0);
                }
            });
            $("#dia_viernes").click(function(){
	        	var valor = $("#dia_viernes").prop('checked');
	          	if(valor == true){ 
                  $("#dbc_Viernes").val(5);
                }else{  
                  $("#dbc_Viernes").val(0);
                }
            });
            $("#dia_sabado").click(function(){
	        	var valor = $("#dia_sabado").prop('checked');
	          	if(valor == true){ 
                  $("#dbc_Sabado").val(6);
                }else{  
                  $("#dbc_Sabado").val(0);
                }
            });
            $("#dia_domingo").click(function(){
	        	var valor = $("#dia_domingo").prop('checked');
	          	if(valor == true){ 
                  $("#dbc_Domingo").val(7);
                }else{  
                  $("#dbc_Domingo").val(0);
                }
            }); 

	        $("#btn_form_add_producto").click(function(e){
	        	var element=$(this);
	        	var select_tipo_producto=$("#select_tipo_producto").val();
	        	if(select_tipo_producto==null){
	            	Materialize.toast('Ingresa el tipo de productsdasdsao',2500,'rounded');
	          	} else{
	          		var add_producto =getArrayFromClass("add_producto");
	          		var add_descripcion =getArrayFromClass("add_descripcion");
	          		var add_precio =getArrayFromClass("add_precio");
	          		var add_id_tienda=<?php echo "'".$_SESSION['Id_tienda']."'"; ?>;
	          		var is_all_img=1;
	          		var formData = new FormData();

	          		for (var i = 1; i <= $('.add_producto').length; i++){
	                    var fileInput = $('#add_archivo_'+i)[0];
	                    //console.log(add_precio);
	                    if(fileInput.files.length>0){
	                      $.each(fileInput.files, function(k,file){
	                        formData.append('cotizaciones[]', file);
	                      });
	                    } else{
	                      is_all_img=0;
	                      break;
	                    }
	                }

	                if(is_all_img==1){
	                  	formData.append('add_producto',JSON.stringify(add_producto));
		              	formData.append('add_descripcion',JSON.stringify(add_descripcion));
		              	formData.append('add_precio',JSON.stringify(add_precio));
		              	formData.append('select_tipo_producto',select_tipo_producto);
		              	formData.append('add_id_tienda',add_id_tienda);
		              	element.attr('disabled',true);
	                  	$.ajax({
		                    method: 'post',
		                    url:"producto/add_productos",
		                    data: formData,
		                    dataType: 'json',
		                    contentType: false,
		                    processData: false
	                  	}).always(function(respuesta){
	                  		//console.log(respuesta);
		                    Materialize.toast('Registro agregado correctamente',3000,'rounded green');
		                    refrescarProducto();
		                    $("#modal_add_producto").closeModal();
		                    /*$("#btn_form_add_stock").removeAttr('disabled');
		                    $(this).removeData('modal_add_stock');*/
		                    limpiar();
		                    //setTimeout("location.reload()",600);
	                  	});
	                } else{
	                  Materialize.toast('Falta adjuntar imagen del producto',3000,'rounded orange');
	                }
	          	}
	        });


	        $(document).on('click','.btn_delete_producto',function(e){
	        	
	        	nom_producto=$(this).attr("nom_producto");
          		id_producto=$(this).attr("id_producto");
          		$("#btn_confirm_delete_producto").attr("value",id_producto);
          		$("#msg_delete_producto").html("<center><h5><p>¿Estas seguro que deseas eliminar el Producto <b>"+nom_producto+"</b>?</p></h5></center>");
	        	$("#modal_delete_producto").openModal();
	        });
	        $(document).on('change','#input_field',function(e){
	        	/*console.log(JSON.stringify({e}));*/
	        	var nueva_imagen =$("#input_field").val();
	        	let img = document.getElementById('input_field')
	        	let file = img?img.files[0]:null
	        	if(file){
	        		console.log('img file',file)

	        		let reader =new FileReader();
					reader.readAsDataURL(file);
					reader.onload=()=>{
						$('#imgShow').attr('src',reader.result);
						console.log('temp src',reader.result);
					}
	        	} else{
	        		console.log('something ewa daskdj');
	        	}    

	        });
	        /**actualizar imagen con un change**/
 			$(document).on('click','.btn_view_producto',function(e){
	        	imagen=$(this).attr("imagen");
	        	nom_view_producto=$(this).attr("nom_view_producto");
	        	$("#msg_view_producto").html("<center><h5 style='color:white;'><b>"+nom_view_producto+"</b></h5></center>");
	        	//console.log(imagen);
	        	$("#modal_view_producto").openModal();
						let date = new Date()
						let time = date.getTime()
	        	var src=<?php echo "'".$ftp_imagen."'" ?>+imagen+'?t='+time;
	            //var html="<iframe style='border:1px solid #666CCC' src='"+src+"' frameborder='1' scrolling='auto' width='100%' height='300' ></iframe>";
	            var html="<img style='border:1px solid #666CCC' src='"+src+"' alt='' width='100%' height='100%'>";
	            $("#div_view_producto").html(html);
	        });


	     /**mostrar datos antes de EDITAR **/
	       $(document).on('click','.btn_edit_producto',function(e){
	        	e.preventDefault();
			      var id_producto=$(this).attr("id_producto");
		      		$('#id_producto').attr('value',id_producto);
		      	  	var imagen=$(this).attr("url_imagen");
		      	  	var src=<?php echo "'".$ftp_imagen."'" ?>+imagen;	           
		            var html="<img id='imgShow' src='"+src+"' alt=''>";
		            $("#div_img_producto").html(html);
		       
					$.ajax({		    		
		            url:"producto/gettIdProducto",  
		            type: 'post',
		      		dataType: 'json',                             
		            data: {
		            	id_producto:id_producto
		            }
		    	}).done(function(respuesta){
				console.log(respuesta);
				/*var country= document.getElementById('country');
              $(country).empty();*/
              //console.log(respuesta[0]['Id_tipomenu']);
              	//$('#modal_edit_producto option[id=opcion_menu]').attr('selected','selected');
				//setSelectValue($('#modal_edit_producto select[id=tipo_menu]'),respuesta[0]['Id_tipomenu']);
				$('#modal_edit_producto input[id=nombre_producto]').val(respuesta[0]['Platillo']);
				$('#modal_edit_producto input[id=Descripcion]').val(respuesta[0]['Descripcion']); 
				$('#modal_edit_producto input[id=Precio]').val(respuesta[0]['Precio']); 
				$('#modal_edit_producto label').addClass('active');	    	
				$("#modal_edit_producto").openModal();
				 });
	
	        });
	       /**boton cerrar modal de editar producto*/
	       $("#btn_cancel_edit_producto").click(function(e){
	       		$("#modal_edit_producto").closeModal();
	       });
	       /***boton editar modal de editar producto*/
	       $("#btn_form_edit_producto").click(function(e){

	       
           /*	var id_producto=$("#id_producto").val();
	       	var nombre_producto=$("#nombre_producto").val();
	       	var Descripcion=$("#Descripcion").val();
	       	var Precio=$("#Precio").val();*/
	       	/*var tipo_menu=$("#tipo_menu").val();
	       	alert(src);*/
/***convertir en un formData***/
			let file =  document.getElementById('input_field').files[0];
	       	var id_producto =getArrayFromClass("id_producto");
      		var nombre_producto =getArrayFromClass("nombre_producto");
      		var Descripcion =getArrayFromClass("Descripcion");
      		var Precio=getArrayFromClass("Precio");      		
      		var formData = new FormData();      		
      		formData.append('id_producto',id_producto);
          	formData.append('nombre_producto',nombre_producto);
          	formData.append('Descripcion',Descripcion);
          	formData.append('Precio',Precio);
          	formData.append('file',(file || ''));
          	$.ajax({
          		method: 'post',
          		url:'producto/EditProducto',
          		data: formData,
                dataType: 'json',
                contentType: false,
                processData: false
          	}).always(function(respuesta){
          		console.log(respuesta);
          		if(respuesta==true){	        			
	        	Materialize.toast('Se agrego exitosamente',3000,'rounded green');
	        	refrescarProducto();
	        		}else{
	        	Materialize.toast('hubo problemas al actualizar',3000,'rounded red');
	        	refrescarProducto();
	        		}
	        	$("#modal_edit_producto").closeModal();
          	});

	       /*	$.ajax({
	        		url: 'producto/EditProducto',
	        		type: 'post',
	        		dataType: 'json',
	        		data: {
	        		id_producto:id_producto,
	        		nombre_producto:nombre_producto,
					Descripcion:Descripcion,
					Precio:Precio
	        		}
	        	}).always(function(respuesta){
	        		console.log(respuesta);
	        		if(respuesta==true){	        			
	        	Materialize.toast('Se agrego exitosamente',3000,'rounded green');
	        	refrescarProducto();
	        		}else{
	        	Materialize.toast('hubo problemas al actualizar',3000,'rounded red');
	        	refrescarProducto();
	        		}
	        		$("#modal_edit_producto").closeModal();
	        	});*/
	       });
	       
	        //$(document).on('click','.sadasd',function(e){
	        $("#btn_confirm_delete_producto").click(function(e){

	        	var id=$(this).attr("value");
	        	//console.log(id);

	        	$.ajax({
	        		url: 'producto/getByDeleteProducto',
	        		type: 'post',
	        		dataType: 'json',
	        		data: {id:id}
	        	}).always(function(respuesta){
	        		//console.log(respuesta);
	        		refrescarProducto();
	        		$("#modal_delete_producto").closeModal();
	        		Materialize.toast('Eliminacion exitosa',3000,'rounded red');
	        		//refrescarProducto();
	        	});
	        });

	        $("#btn_cancel_delete_producto").click(function(e){
	        	$("#modal_delete_producto").closeModal();
	        });

	        $("#btn_cerrar_view_producto").click(function(e){
	        	$("#modal_view_producto").closeModal();
	        });

	        

	        /***FUNCIONES***/
	        function getArrayFromClass(clase){
		        var valueArray = $('.'+clase).map(function() {
		          return this.value;
		        }).get();
		        return valueArray;
		    }

		    function limpiar(){
          		//$("#div_cotizacion").empty();
	          	var html="<div class='row row_add_producto' id=1>"+
		                  	"<div class='input-field col s12 m3 l3'>"+
		                    	"<input id=1 id_ac='producto' type='text' class='validate add_producto' autocomplete='off'>"+
		                    	"<label for='categoria' class='black-text'>Producto</label>"+
		                	"</div>"+
		                    "<div class='input-field col s12 m5 l5'>"+
		                        "<input class='add_descripcion' type='text' id=1 autocomplete='off'>"+
		                        "<label class='black-text'>Descripcion</label>"+
		                  	"</div>"+
		                  	"<div class='input-field col s6 m1 l1'>"+
		                        "<input class='add_precio validanumericos' step='0.01' type='number' id=1 value='0.00' min='0'>"+
		                        "<label class='active black-text'>Precio</label>"+
		                  	"</div>"+
		                  	"<div class='col s6 m3 l3' id='div_files_produc'>"+

		                  	"</div>"+
		                "</div>";
	          	$("#div_producto").html(html);

	          	var html2="<div class='file-field input-field'>"+
				      	"<div class='btn blue waves-effect waves-light'>"+
				        	"<span><i class='material-icons'>attach_file</i></span>"+
				        	"<input class='btn_imagen' type='file' id='add_archivo_1' name='cotizaciones[]' accept='image/x-png,image/gif,image/jpeg'>"+
				      	"</div>"+
				      	"<div class='file-path-wrapper'>"+
				        	"<input name='add_adjunto' id='add_adjunto' readonly class='file-path' type='text' placeholder='Adjuntar imagen del producto'>"+
				      	"</div>"+
				    "</div>";

	          	$("#div_files_produc").html(html2);
	          	$("#modal_add_producto").closeModal();
          	}

          	onload = function(){ 
			  var ele = document.querySelectorAll('.validanumericos')[0];
			  ele.onkeypress = function(e) {
			     if(isNaN(this.value+String.fromCharCode(e.charCode)))
			        return false;
			  }
			  ele.onpaste = function(e){
			     e.preventDefault();
			  }
			}

			/*$('.validanumericos').keyup(function(){
		       var val = $(this).val();
		       if(isNaN(val)){
		            val = val.replace(/[^0-9\.]/g,'');
		            if(val.split('.').length>2) 
		                val =val.replace(/\.+$/,"");
		       }
		       $(this).val(val); 
		       console.log("hola");
			});​*/

			$(document).on('keydown', 'input[pattern]', function(e){
			  var input = $(this);
			  var oldVal = input.val();
			  var regex = new RegExp(input.attr('pattern'), 'g');

			  setTimeout(function(){
			    var newVal = input.val();
			    if(!regex.test(newVal)){
			      input.val(oldVal); 
			    }
			  }, 0);
			});
			/*$(document).on('keyup','.validanumericos',function(e){

			});

			function Numeros(string){//Solo numeros
	          var out = $(this);
	          var filtro = '1234567890.';//Caracteres validos
	        
	          //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
	          for (var i=0; i<string.length; i++)
	             if (filtro.indexOf(string.charAt(i)) != -1) 
	                   //Se añaden a la salida los caracteres validos
	             out += string.charAt(i);
	        
	          //Retornar valor filtrado
	          return out;
	        }

	        function redondar(x) {
	          return Number.parseFloat(x).toFixed(1);
	        }*/

		    /***FIN FUNCIONES***/

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
        <?php require "producto/menu_producto.php" ?>
      </main>
    </body>
</html>