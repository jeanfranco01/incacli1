<div class="container">
	
    
    <div class="row">
      	<!--<div class="col s12 m7 l7">
      		<center>
      			<div class="row">
      				<h4 style="color: white;">LAS OPORTUNIDADES SIEMPRE LLEGAN SOLO DEBES APROVECHARLAS</h4>
      			</div>
      			
      		</center>
      	</div>-->
      	<br><br><br>
      	<div class="col s1 m3 l3"></div>
      	<div class="col s10 m6 l6 ">
	        <center>
				<div class="row">
					<div class="col s2 m2 l2"></div>
					<div class="col s8 m8 l8">
						<img src="http://161.132.98.19/files/imagenes/tienda/blanco.png" width="125" height="180" alt="" class="white-text">
						<h5 style="font-weight: bold;" class="black-text">GESTION DE DELIVERY</h5><br>
					</div>
					<div class="col s2 m2 l2"></div>
				</div>

				<form id="form_login" method="post" action="login/validador" >
					<div class="row">
						<div class="col m2 l2"></div>
						<div class="input-field col s12 m8 l8">
							<input type="text" name="login_email" id="login_email" class="input-login" style=" color: black;border-radius: 4px; font-weight: bold;">
							<label for="login_email" class="black-text" style="font-weight: bold;">Usuario</label>
						</div>
						<div class="col m2 l2"></div>
					</div>

					<div class="row">
						<div class="col m2 l2"></div>
						<div class="input-field col s12 m8 l8">
							<input type="password" name="login_password" id="login_password" class="input-login" style=" color: black;border-radius: 4px; font-weight: bold;">
							<label for="login_password" class="black-text" style="font-weight: bold;">Contraseña</label>
						</div>
						<div class="col m2 l2"></div>
					</div>

					<div class="row">
						<div class="col s0 m2 l2"></div>
						<div class="col s12 m8 l8">
						<button type="submit" id="btn_form_login" class="btn btn-large waves-effect accent-4" style="background-color: #4F0B25;">Iniciar Sesion</button>
						</div>
						<div class="col s0 m2 l2"></div>
					</div>
				</form>
					<?php
						if($this->session->set_flashdata('usuario_incorrecto')){
							echo "usuario inconrrecto";
						}
					?>
					<!--<div class="row">
						<a style="position: left" href="welcome" type="submit" id="login_recuperar_clave">Olvide mi contraseña</a>
					</div>-->	
				
				
			</center>
      	</div>
      	<div class="col s1 m3 l3"></div>
    </div>

  </div>