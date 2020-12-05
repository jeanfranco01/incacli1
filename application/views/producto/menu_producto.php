<div class="row">
	<center><h4 style="color: #4F0B25";>Producto</h4></center>
</div>

<div class="row">
	<div class="col s6 m2 l3">
		<button class="btn waves-effect waves-light" type="submit" name="action" data-tooltip="Nuevo Producto" id="btn_add_categoria_producto"style="font-size: 13px">nuevo categoria
    		<i class="material-icons right">send</i>
 		 </button>

 		 
	</div>
	<div class="col s6 m9 l8">
		
		<button class="btn btn-floating btn-large waves-effect waves-light blue accent-4 tooltipped right" data-position="bottom" data-tooltip="Nuevo Producto" id="btn_add_producto"><i class="material-icons">add</i></button>
		<!-- <input type="text" id_sec="<?= $conteo_categoria[0]['conteo_categoria']?>"name="" hidden> -->
		

	</div>
	<div class="col s1 m1 l1"></div>
</div>

<div class="row">
	<div class="col s12 m12 l12" id="div_table_producto">
		<table class="striped" id="data_table_producto" style="width: 100%">
			<thead style="background-color: #F9F6F6">
				<tr>
					<th><center>Codigo</center></th>
					<th><center>Nombre Producto</center></th>
					<th><center>Descripcion</center></th>
					<th><center>Precio</center></th>
					<th><center>Categoria principal</center></th><!--Nombre_menu-->
					<th><center>Opciones</center></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

<?php 
	require "modals/modal_add_producto.php";
	require "modals/modal_delete_producto.php";
	require "modals/modal_view_producto.php";
	require "modals/modal_add_categoria_producto.php";
	require "modals/modal_edit_producto.php";
 ?>