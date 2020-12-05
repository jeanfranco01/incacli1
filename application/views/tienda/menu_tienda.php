<div class="row">
	<div class="col s1 m1 l1"></div>    
	    <div  class="col s10 m10 l10">
	    	<div class="col s12 m3 l3">
	    		<div class="card " >
		            <div class="card-panel #64b5f6 orange darken-1" >
		            	<div class="row">
		            		<h6 style="color:white;font-size: 15px"><center>PENDIENTES</center></h6>
			              	
			              	<div class=" col s5 m5 l7 " id="div_compra_pendiente"> 

				              	<h4 style="color:white" >
				              	0
				              	</h4>

			              	</div>
			              	<div class=" col s5 m5 l5 ">
			              		<a style="color:white" Id="compra_pendiente" href="#"><i class="large material-icons" style="color:black">alarm</i></a>
			              	</div>
		             	</div>
		            </div>
		        </div>
	    	</div>
	    	<div class="col s12 m3 l3">
	    		<div class="card">
		            <div class="card-panel #7cb342 light-green darken-2" >
		              	<div class="row ">
			              	<h6 style="color:white;font-size: 14px"><center>EN PROCESO</center></h6>
			              	<div class=" col s5 m5 l7 " id="div_compra_enviado">	
				              	<h4 style="color:white" >
				              	0
				              	</h4>

			              	</div>
			              	<div class=" col s5 m5 l5 ">
			              		<a style="color:white" Id="compra_enviado" href="#"> <i class="large material-icons" style="color:#D9D5D4">send</i></a>
			              	</div>
			            </div>
		        	</div>
	      		</div>
	    	</div> 
	    	<div class="col s12 m3 l3">
	    		<div class="card">
		            <div class="card-panel #7cb342 red darken-3" >
		              	<div class="row ">
			              	<h6 style="color:white"><center>CANCELADOS</center></h6>
			              	<div class=" col s5 m5 l7 " id="div_compra_cancelado">	
				              	<h4 style="color:white" >
				              	0
				              	</h4>
			              	</div>
			              	<div class=" col s5 m5 l5 ">
			              		<a style="color:white" Id="compra_cancelado" href="#"> <i class="large material-icons" style="color:#D9D5D4">do_not_disturb_alt</i></a>
			              	</div>
			            </div>
		        	</div>
	      		</div>
	    	</div>
	    	<div class="col s12 m3 l3">
	    		<div class="card">
		            <div class="card-panel #7cb342 blue darken-3" >
		              	<div class="row ">
			              	<h6 style="color:white"><center>CONCLUIDOS</center></h6>
			              	<div class=" col s5 m5 l7 " id="div_compra_concluido">	
				              	<h4 style="color:white" >
				              	0
				              	</h4>
			              	</div>
			              	<div class=" col s5 m5 l5 ">
			              		<a style="color:white" Id="compra_concluido" href="#"> <i class="large material-icons" style="color:#D9D5D4">done_all</i></a>
			              	</div>
			            </div>
		        	</div>
	      		</div>
	    	</div>
		</div>
	<div class="col s1 m1 l1"></div>    
</div>
<div class="row" id="div_principal_text_info">
	<center><h4 style="color: #4F0B25";>PENDIENTE</h4></center>
</div>
<?php if ($_SESSION['Id_usuario']==3) { ?>

<div class="row">
	<div class="col s12 m12 l12">
		<center><button id="btn_tienda_cierre_caja" class="btn orange darken-1 waves-effect waves-light"><i class="material-icons">edit</i> Cerrar caja</button></center>
	</div>
	
</div>
<?php } ?>
<div class="row">
	<div class="col s12 m12 l12" id="div_table_principal">
		<!-- <input type="date" id="fecha_fin" style="width:150px;position:absolute;padding-top:35px;"> -->
		<table class="striped" id="data_table_principal" style="width: 100%">
			<thead style="background-color: #F9F6F6">
				<tr>
					<th><center>#Pedido</center></th>
					<th><center>Fecha</center></th>
					<th><center>Hora</center></th>
					<th><center>Cliente</center></th>
					<th><center>Direccion</center></th>
					<th><center>Telefono</center></th>
					<th><center>Pedido</center></th>
					<th><center>Metodo Pago</center></th>
					<th><center>Monto Final</center></th>
					<?php if ($_SESSION['Id_usuario']==63) { ?>
						<th><center>Tienda</center></th>
					<?php }else{ ?>
						<th><center>Validar</center></th>
					<?php } ?>
					
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<div class="row" id="audio_pendiente"></div>

<?php 
	require "modals/modal_mensaje_cancelar.php";
	require "modals/modal_mensaje_enviar.php";
	require "modals/modal_mensaje_concluir.php";
	require "modals/modal_cierre_caja.php";
?>