<div id="modal_edit_producto" class="modal"style="height: 800px">
  	<div class="modal-content">
	  	<center><b><h4>Editar Producto</h4></b></center>  	
		<form method="post"id="form_edit_producto">

			<!-- card prueba-->
		<div class="row">
		    <div class="col s12 m12">
		      <div class="card">
		        <div class="card-image col s12 m6 l6 ">
		        	<div id="div_img_producto"></div>
		          <!-- <img  style="width:80px"src="ftp_imagenes/<?php ?>">
		        	<input type="file" name="">
		          <span class="card-title blue">imagen</span> -->
		        
				    <div class="file-field input-field">
				      <div class="btn">
				        <span>File</span>
				        <input  class="input_field "type="file" id="input_field">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" id="texto_file"type="text">
				      </div>
				    </div>
				 
		        </div> 
		        <div class="row_edit_producto card-content col s12 m6 l6 ">
		          	<input  class="id_producto"id="id_producto"name="id_producto"type="text" hidden>
			        <div class="input-field col s12 m3 l12">
				        <select name="tipo_menu" id="tipo_menu" class="validate tipo_menu">
				        	<option value='' disabled selected>-- Selecciona una categoria producto --</option>
				        	<?php foreach ($tipo_productos as $tipo_producto) { ?>
				        		<option id="opcion_menu" value="<?= $tipo_producto['Id_tipomenu'] ?>"><?= $tipo_producto['Nombre_menu'] ?></option>
				        	<?php } ?>
				        </select>
				        <label class="black-text">categoria producto</label>
				    </div>
					<div class="input-field col s12 m3 l12">
					    <input class="nombre_producto" id="nombre_producto"name="nombre_producto" type="text"placeholder="ingresa">
					    <label class=" black-text active">nombre del producto</label>
					</div>		    
				    <div class="input-field col s12 m3 l12">
					    <input class="Descripcion" id="Descripcion"name="Descripcion"type="text"placeholder="ingresa">
					    <label class=" black-text active">Descripcion</label>
					</div>
				    <div class="input-field col s12 m3 l12">
					    <input class="Precio" id="Precio"name="Precio" type="number"  value="0.00" min="0">
					    <label class=" black-text ">Precio</label>
					</div>

		        </div>		        
		      </div>
		    </div>
		</div>
			
		</form>
		<div class="row">
		    <div class="col s12 m12 l12 center">
		        <button class="btn round-btn waves-effect waves-light green darken-1" id="btn_form_edit_producto">Guardar<i class="material-icons right">save</i>
		        </button>
		        <button class="btn round-btn waves-effect waves-light grey darken-1" id="btn_cancel_edit_producto">Cancelar<i class="material-icons right">close</i>
		        </button>
		    </div>
		</div>
	</div>
</div>