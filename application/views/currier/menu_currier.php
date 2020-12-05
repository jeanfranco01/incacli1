<div class="row">
	<div class="col s1 m1 l1"></div>    
	    <div  class="col s10 m10 l10">
	    	
	    	<div class="col s12 m12 l4">
	    		<div class="card">
		            <div class="card-panel #7cb342 light-green darken-2" >
		              	<div class="row ">
			              	<h6 style="color:white;font-size: 14px"><center>EN PROCESO</center></h6>
			              	<div class=" col s5 m5 l7 " id="div_compra_enviado">	
				              	<h4 style="color:white" >
				               <?php
				      		foreach ($cant_procesos as $cant_procesoss) {    
				      		?>
				              	  <?= $cant_procesoss['cantidad_en_procesos']?>

				              	<?php }?>
				              	</h4>

			              	</div>
			              	<div class=" col s5 m5 l5 ">
			              		<a style="color:white" Id="compra_enviado" href="#"> <i class="large material-icons" style="color:#D9D5D4">send</i></a>
			              	</div>
			            </div>
		        	</div>
	      		</div>
	    	</div> 
	    	<div class="col s12 m12 l4">
	    		<div class="card">
		            <div class="card-panel #7cb342 red darken-3" >
		              	<div class="row ">
			              	<h6 style="color:white"><center>CANCELADOS</center></h6>
			              	<div class=" col s5 m5 l7 " id="div_compra_cancelado">	
				              	<h4 style="color:white" >
				              			0
				            <!-- <?php
				      		foreach ($cant_eliminados as $cant_eliminadoss) {    
				      		?>
				              	  <?= $cant_eliminadoss['cantida_cancelados']?>

				              	<?php }?>-->
				              	</h4>
			              	</div>
			              	<div class=" col s5 m5 l5 ">
			              		<a style="color:white" Id="compra_cancelado" href="#"> <i class="large material-icons" style="color:#D9D5D4">do_not_disturb_alt</i></a>
			              	</div>
			            </div>
		        	</div>
	      		</div>
	    	</div>
	    	<div class="col s12 m12 l4">
	    		<div class="card">
		            <div class="card-panel #7cb342 blue darken-3" >
		              	<div class="row ">
			              	<h6 style="color:white"><center>CONCLUIDOS</center></h6>
			              	<div class=" col s5 m5 l7 " id="div_compra_concluido">	
				              	<h4 style="color:white" >
				              	<!--<?php echo $cant_eliminados?> -->
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
					<th><center>Metodo</center></th>
					<th><center>nombre_tienda</center></th>
					<th><center>Monto_total</center></th>
					<th><center>Placa</center></th>
					<th><center>Validar</center></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<div class="row" id="audio_pendiente"></div>


<?php 
	require "modals/modal_edit_distribuidor.php";
 ?>
