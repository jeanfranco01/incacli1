<div class="row">
	<center><h4 style="color: #4F0B25";>Repartidor</h4></center>
</div>

<div class="row">
	<div class="col s12 m12 l12" id="div_table_repartidor">
		<table class="striped" id="data_table_repartidor" style="width: 100%">
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
					<th><center>Validar</center></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

<?php 
	require "modals/modal_mensaje_cancelar.php";
	require "modals/modal_mensaje_concluir.php";
?>