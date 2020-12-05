<div id="modal_add_producto" class="modal ">
  <div class="modal-content">
  	<center><b><h4>Registrar Producto</h4></b></center><br>

  		 
  		<div class="row">
	        <select id="select_tipo_producto">
	        	<option value='' disabled selected>-- Selecciona una categoria producto --</option>
	        	<?php foreach ($tipo_productos as $tipo_producto) { ?>
	        		<option value="<?= $tipo_producto['Id_tipomenu'] ?>"><?= $tipo_producto['Nombre_menu'] ?></option>
	        	<?php } ?>
	        </select>
	        <label class="black-text">categoria producto</label>
	    </div>

  		<div class="divider"></div><br>
  		<!--<div id="div_tipo_producto_menu">
  			
  		</div>-->
		<div id="div_producto">
			<div class="row row_add_producto" id="1">
			    <div class="input-field col s12 m3 l3">
	        		<input id="1" id_ac="producto" type="text" class="validate add_producto" autocomplete="off">
	        		<label class="black-text">Producto</label>
			    </div>
			    <div class="input-field col s12 m5 l5">
				    <input class="add_descripcion" type="text" id="1" autocomplete="off">
				    <label class="active black-text">Descripcion</label>
				</div>
			    <div class="input-field col s6 m1 l1">
				    <input class="add_precio validanumericos" pattern="^\d*(\.\d{0,2})?$" step="0.01" type="number" id="1" value="0.00" min="0">
				    <label class="active black-text">Precio</label>
				</div>
				<div class="col s6 m3 l3" id="div_files_produc">
					<div class="file-field input-field">
				      	<div class="btn blue waves-effect waves-light">
				        	<span><i class="material-icons">attach_file</i></span>
				        	<input class="btn_imagen" type="file" id="add_archivo_1" name="cotizaciones[]" accept="image/x-png,image/gif,image/jpeg">
				      	</div>
				      	<div class="file-path-wrapper">
				        	<input name="add_adjunto" id="add_adjunto" readonly class="file-path" type="text" placeholder="Adjuntar imagen del producto">
				      	</div>
				    </div>
				</div>
			</div>
		</div>
		<div class="col s2">
			<div class="row">
				<button class="btn btn-floating waves-effect waves-light teal accent-4 tooltipped right btn_add_producto_row" data-position="bottom" data-tooltip="Agregar fila"><i class="material-icons">add</i></button>
				<button class="btn btn-floating waves-effect waves-light red right" id="btn_delete_producto_row" data-position="left" data-tooltip="Eliminar fila"><i class="material-icons">remove</i></button>
			</div>
		</div>

		<div class="divider"></div><br>

		<div class="row">

		    <div class="col s12 m12 l12 center">
		        <button class="btn round-btn waves-effect waves-light green darken-1" id="btn_form_add_producto">Guardar<i class="material-icons right">save</i>
		        </button>
		        <button class="btn round-btn waves-effect waves-light grey darken-1" id="btn_cancel_add_producto">Cancelar<i class="material-icons right">close</i>
		        </button>
		    </div>
		</div>
	  </div>
</div>