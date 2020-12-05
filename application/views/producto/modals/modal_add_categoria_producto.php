<div id="modal_add_categoria_producto" class="modal">
  	<div class="modal-content">
  	<center><b><h4>Registrar Categoria Producto</h4></b></center><br>
  		<div class="row">
  			<div class="row">
  				<div class="input-field col s4 m6 l6">
  					
	  				<input id="dbc_categoria_producto" type="text" autocomplete="off" placeholder="Ingrese Tipo Producto: ">
  				</div>
  				<div class="input-field col s4 m3 l3">
  					<button class="btn round-btn waves-effect waves-light green darken-1 " id="btn_add_categoria_productos">Agregar Tipo Producto
		        	</button>
		        	
  				</div>
  				<div class="input-field col s4 m3 l3">
  					<button class="btn round-btn waves-effect waves-light red darken-1 " id="btn_cancel_categoria_productos">cancelar Tipo producto
		        	</button>		        	
  				</div>
  				
  			</div>
  			<div class="row">
  				<div class="input-field col s6 m3 l3">
		            <input name="dia_lunes" id="dia_lunes" type="checkbox" class="filled-in tipo_producto_add" checked="checked" >
		            <label for="dia_lunes" class="black-text">Lunes</label>
				</div>
				<div class="input-field col s6 m3 l3">
		            <input name="dia_miercoles" id="dia_miercoles" type="checkbox" class="filled-in tipo_producto_add" checked="checked" >
		            <label for="dia_miercoles" class="black-text">Miércoles</label>
				</div>
				<div class="input-field col s6 m3 l3">
		            <input name="dia_viernes" id="dia_viernes" type="checkbox" class="filled-in tipo_producto_add" checked="checked" >
		            <label for="dia_viernes" class="black-text">Viernes</label>
				</div>
				<div class="input-field col s6 m3 l3">
		            <input name="dia_domingo" id="dia_domingo" type="checkbox" class="filled-in tipo_producto_add" checked="checked" >
		            <label for="dia_domingo" class="black-text">Domingo</label>
				</div>
  				<div class="input-field col s6 m3 l3">
		            <input name="dia_martes" id="dia_martes" type="checkbox" class="filled-in tipo_producto_add" checked="checked" >
		            <label for="dia_martes" class="black-text">Martes</label>
				</div>
				<div class="input-field col s6 m3 l3">
		            <input name="dia_jueves" id="dia_jueves" type="checkbox" class="filled-in tipo_producto_add" checked="checked" >
		            <label for="dia_jueves" class="black-text">Jueves</label>
				</div>
				<div class="input-field col s6 m3 l3">
		            <input name="dia_sabado" id="dia_sabado" type="checkbox" class="filled-in tipo_producto_add" checked="checked" >
		            <label for="dia_sabado" class="black-text">Sábado</label>
				</div>
  			</div>
  			<div class="seccion_diasChecks" hidden="">
               <input type="text" name="Lunes" id="dbc_Lunes" value="1" class="dbc_Lunes">
               <input type="text" name="Martes" id="dbc_Martes" value="2" class="dbc_Martes">
               <input type="text" name="Miercoles" id="dbc_Miercoles" value="3" class="dbc_Miercoles">
               <input type="text" name="Jueves" id="dbc_Jueves" value="4" class="dbc_Jueves">
               <input type="text" name="Viernes" id="dbc_Viernes" value="5" class="dbc_Viernes">
               <input type="text" name="Sabado" id="dbc_Sabado" value="6" class="dbc_Sabado">
               <input type="text" name="Domingo" id="dbc_Domingo" value="7" class="dbc_Domingo">
            </div>
  		</div>
  	</div>
</div>