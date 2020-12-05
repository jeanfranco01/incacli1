<div id="modal_mensaje_enviar" class="modal">
  	<div class="modal-content">
	    <form method="post" id="form_mensaje_enviar">
	    	<input type="hidden" name="Id_compra" id="enviar_id_compra" value="">
			<div class="row">
				<!--<div class="col s1"><div class="row"></div></div>
			    <div class="col s10">
			        <span id="enviar_compra_mensaje"></span>
			    </div>-->
			    <div class="col s1 m1 l1"></div>
			    <div class="col s10 m10 l10">
			    	<span id="enviar_compra_mensaje"></span>
			    </div>
			    <div class="col s1 m1 l1"></div>
		   </div>
		   <div class="row">
		   		<label class="black-text active">Elegir Distribuidor</label>
				<select name="distribuidor" id="distribuidor" class="validate">
					
					<option value="1">Interno</option>
					<option value="2">Externo</option>
					
				</select>
		   </div>
		</form>
		<div class="row">
	      	<!--<div class="col s3"><div class="row"></div></div>
	      	<div class="col s3">
	         	<button class="btn waves-effect waves-light red darken-1" id="btn_form_enviar_compra">SI<i class="material-icons medium right">delete_forever</i>
	         	</button>
	      	</div>
	      	<div class="col s3">
	         	<button class="btn waves-effect waves-light grey lighten-1" id="btn_cancel_enviar_compra">NO<i class="material-icons right">save</i>
	         	</button>
	      	</div>-->
	      	<div class="col s0 m4 l4"></div>
	      	<div class="col s12 m6 l6">
	      		<div class="col s6 m6 l6">
		         	<button class="btn waves-effect waves-light red darken-1" id="btn_form_enviar_compra">SI<i class="material-icons medium right">done</i>
		         	</button>
		      	</div>
		      	<div class="col s6 m6 l6">
		         	<button class="btn waves-effect waves-light grey lighten-1" id="btn_cancel_enviar_compra">NO<i class="material-icons right">close</i>
		         	</button>
		      	</div>
	      	</div>
	      	<div class="col s0 m4 l4"></div>
	   	</div>
  	</div>
</div>