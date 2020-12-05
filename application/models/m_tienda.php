<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tienda extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}

	function get_all_principal_pendiente(){
		
		$Id_tienda = $this->session->userdata('Id_tienda');
		$Id_usuario = $this->session->userdata('Id_usuario');
		$fecha_fin=date('Y-m-d');
		$fechas = array($fecha_fin, 
		date("Y-m-d",strtotime($fecha_fin."- 1 days")),
		date("Y-m-d",strtotime($fecha_fin."- 2 days")),
		date("Y-m-d",strtotime($fecha_fin."- 3 days")),
		date("Y-m-d",strtotime($fecha_fin."- 4 days")),
		date("Y-m-d",strtotime($fecha_fin."- 5 days")),
		date("Y-m-d",strtotime($fecha_fin."- 6 days"))
		);
		if($Id_usuario==63){
			$this->db->where_in("Fecha", $fechas);
		}else{
			$this->db->where_in("Fecha", $fechas);
			$this->db->where("Id_tienda", $Id_tienda);
		}
		
	 	return $this->db->get('v_compra_pendiente_w')->result();
		

		

	}

	function get_by_all_principal_pendiente($estado_compra){

		$Id_tienda = $this->session->userdata('Id_tienda');
		$Id_usuario = $this->session->userdata('Id_usuario');
		$fecha_fin=date('Y-m-d');
		$fechas = array($fecha_fin, 
		date("Y-m-d",strtotime($fecha_fin."- 1 days")), 
		date("Y-m-d",strtotime($fecha_fin."- 2 days")), 
		date("Y-m-d",strtotime($fecha_fin."- 3 days")),
		 date("Y-m-d",strtotime($fecha_fin."- 4 days")),
		 date("Y-m-d",strtotime($fecha_fin."- 5 days")),
		 date("Y-m-d",strtotime($fecha_fin."- 6 days")),
		);
		if($Id_usuario==63){
			
		}else{
			$this->db->where("Id_tienda", $Id_tienda);
		}
		
		$this->db->where_in("Fecha",$fechas);

	 	switch ($estado_compra) {
		 case 1:
	 		return $this->db->get('v_compra_pendiente_w')->result();
		 	break;
		case 2:
	 		return $this->db->get('v_compra_enviados_w')->result();
		 	break;
		case 3:
	 		return $this->db->get('v_compra_cancelados_w')->result();
		 	break;
		case 4:
	 		return $this->db->get('v_compra_concluidos_w')->result();
		 	break; 
		}
		//return $this->db->last_query();
	}

	function get_by_numero_compra_pendiente(){

		$Id_tienda = $this->session->userdata('Id_tienda');
		$Id_usuario = $this->session->userdata('Id_usuario');
		$fecha_fin=date('Y-m-d');
		$fechas = array($fecha_fin, 
		date("Y-m-d",strtotime($fecha_fin."- 1 days")), 
		date("Y-m-d",strtotime($fecha_fin."- 2 days")), 
		date("Y-m-d",strtotime($fecha_fin."- 3 days")),
		 date("Y-m-d",strtotime($fecha_fin."- 4 days")),
		 date("Y-m-d",strtotime($fecha_fin."- 5 days")),
		 date("Y-m-d",strtotime($fecha_fin."- 6 days")),
		);

		

		$this->db->trans_start();

		if($Id_usuario==63){
			$this->db->where_in("Fecha", $fechas);	
			$pendiente= $this->db->get('v_compra_pendiente_w');

			$this->db->where("Fecha", $fecha_fin);	
			$enviado= $this->db->get('v_compra_enviados_w');

			$this->db->where("Fecha", $fecha_fin);	
			$cancelado= $this->db->get('v_compra_cancelados_w');

			$this->db->where("Fecha", $fecha_fin);	
			$concluido= $this->db->get('v_compra_concluidos_w');
		
		}else{

			$this->db->where_in("Fecha", $fechas);	
			$this->db->where("Id_tienda", $Id_tienda);
			$pendiente= $this->db->get('v_compra_pendiente_w');

			$this->db->where("Fecha", $fecha_fin);	
			$this->db->where("Id_tienda", $Id_tienda);
			$enviado= $this->db->get('v_compra_enviados_w');

			$this->db->where("Fecha", $fecha_fin);	
			$this->db->where("Id_tienda", $Id_tienda);
			$cancelado= $this->db->get('v_compra_cancelados_w');

			$this->db->where("Fecha", $fecha_fin);	
			$this->db->where("Id_tienda", $Id_tienda);
			$concluido= $this->db->get('v_compra_concluidos_w');
		 
		}

		
	 	

	 	$this->db->trans_complete();

	 	return array($pendiente->num_rows(), $enviado->num_rows(), $cancelado->num_rows(), $concluido->num_rows());

	}

	function get_cancel_compra($post){

		$data=array(
			'Estado'=>3
		);

	 	$this->db->where("Id_compra", $post['Id_compra']);
	 	$this->db->update('jam_compra',$data);

	}

	function get_reintegrar_compra($post){

		$data=array(
			'Estado'=>1
		);

	 	$this->db->where("Id_compra", $post['Id_compra']);
	 	$this->db->update('jam_compra',$data);

	}

	function get_enviar_compra($post){

		$data=array(
			'Estado'=>2,
			'Id_tipo_distribuidor'=>$post['distribuidor']
		);

	 	$this->db->where("Id_compra", $post['Id_compra']);
	 	$this->db->update('jam_compra',$data);

	}

	function get_concluido_compra($post){
		$data_historial_cliente = array(
			'Id_compra' => $post['Id_compra'],
			'Id_tienda' => $post['Id_tienda'],
			'Id_usuario_cliente' => $post['Id_usuario_cliente'],
			'Estado' => 1,
			'Monto_total' => $post['Monto_total']
		);

		$data_historial_tienda = array(
			'Id_compra' => $post['Id_compra'],
			'Id_tienda' => $post['Id_tienda'],
			'Estado' => 1,
			'Monto_total' => $post['Monto_total']
		);

		$data=array(
			'Estado'=>4
		);

	 	$this->db->where("Id_compra", $post['Id_compra']);
	 	$this->db->update('jam_compra',$data);

	 	$this->db->trans_start();
	 	$this->db->insert('jam_historial_compra_cliente', $data_historial_cliente);
	 	$this->db->insert('jam_historial_compra_tienda', $data_historial_tienda);
	 	$this->db->trans_complete();

	}

	function get_cierre_caja_total_dia(){

		$Id_tienda = $this->session->userdata('Id_tienda');
		$fecha=date('Y-m-d');

	 	$this->db->where("Fecha", $fecha);	
	 	$this->db->where("Id_tienda", $Id_tienda);
	 	
	 	return $this->db->get('v_cierre_caja_total_dia_w')->result_array();

	}

	function cerrar_caja($post){
		$Id_tienda = $this->session->userdata('Id_tienda');
		$Id_usuario = $this->session->userdata("Id_usuario");
		$fecha=date('Y-m-d H:i:s');

		if ($post['is_gastos']==0) {
			$data = array(

				'Id_tienda' => $Id_tienda,
				'Fecha_cierre_caja' => $post['fecha'],
				'Monto_cierre_caja' => $post['total_dia'],
				'Gastos' => 0,
				'Detalle_gastos' => '-',
				'Monto_final' => $post['total_dia'],
				'Id_usuario' => $Id_usuario,
				'Fecha_registro' => $fecha,
				'Estado' => 1
			);
		}else{
			$data = array(

				'Id_tienda' => $Id_tienda,
				'Fecha_cierre_caja' => $post['fecha'],
				'Monto_cierre_caja' => $post['total_dia'],
				'Gastos' => $post['monto_gastos'],
				'Detalle_gastos' => $post['detalle_gastos'],
				'Monto_final' => $post['total_dia']-$post['monto_gastos'],
				'Id_usuario' => $Id_usuario,
				'Fecha_registro' => $fecha,
				'Estado' => 1
			);
		}
		
		$this->db->trans_start();
	 	$this->db->insert('jam_cierre_caja', $data);
	 	$id_caja=$this->db->insert_id();
	 	$this->db->query("CALL sp_actualizacion_cierre_jam_compra(".$Id_tienda.",'".$post['fecha']."',".$id_caja.")");

	 	$this->db->trans_complete();
	 	//return $post;

	}

}?>