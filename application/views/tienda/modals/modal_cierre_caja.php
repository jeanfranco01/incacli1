<div id="modal_cierre_caja" class="modal">
  <div class="modal-content">
    <form method="post" id="form_mensaje_cierre_caja">
    	<input type="hidden" name="Id_tienda" id="Id_tienda" value="">
    	<input type="hidden" name="Fecha" id="Fecha" value="">
    	<input type="hidden" name="Total_dia" id="Total_dia" value="">
		<div class="row">
			<div class="col l0 m0 s1"><div class="row"></div></div>
		    <div class="col l12  m12 s10">
		        <span id="cierre_caja_mensaje"></span>
		    </div>

	   </div>
	   <div class="row">
	   		<input type='checkbox' id='chk_gastos' class='checkbox-black filled-in' value="false" />
		    <label  for='chk_gastos'>Gastos</label>
	   		<div id="div_gastos"></div>

	   		

	   </div>
	</form>
	<div class="row">
	      <div class="col s0 m4 l4"></div>
	      	<div class="col s12 m6 l6">
	      		<div class="col s6 m6 l6">
		         	<button class="btn waves-effect waves-light red darken-1" id="btn_form_cerrar_caja">SI<i class="material-icons medium right">assignment_turned_in</i></button>
		      	</div>
		      	<div class="col s6 m6 l6">
		         	<button class="btn waves-effect waves-light grey lighten-1" id="btn_cancel_cierre_caja">NO<i class="material-icons right">close</i></button>
		      	</div>
	      	</div>
	      	<div class="col s0 m4 l4"></div>
	   </div>
  </div>
</div>