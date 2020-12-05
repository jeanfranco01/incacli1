<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_currier extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}
	function get_all_currier(){
			
			//$Id_tienda = $this->session->userdata('Id_tienda');
			$fecha_fin=date('Y-m-d');

			//$this->db->where("Fecha", $fecha_fin);
			//$this->db->where("Id_tienda", $Id_tienda);
		 	return $this->db->get('v_compra_currier_pendiente')->result();
			
	}

function get_all_cancelados_currier(){
			
			//$Id_tienda = $this->session->userdata('Id_tienda');
			$fecha_fin=date('Y-m-d');

			//$this->db->where("Fecha", $fecha_fin);
			//$this->db->where("Id_tienda", $Id_tienda);
		 	return $this->db->get('v_compra_currier_cancelados')->result();
			
	}
	function get_all_movilidad(){
		
				$this->db->where("Estado", 1);
		return $this->db->get('v_movilidad')->result_array();
		
	}
	function get_all_repartidor(){

		$Id_tienda = $this->session->userdata('Id_tienda');
		
				$this->db->where("Id_tienda", $Id_tienda);
				$this->db->where("Id_tipo_usuario_master", 4);
		return $this->db->get('v_usuario_tienda_w')->result_array();
		
	}

	function get_add_pedido($post){
		$data=array(
		
			'Id_cierre_editar'=>1,
			'Id_motorizado'=>$post['Id_tipo_distribuidor'],
			'Id_repartidor'=>$post['Id_repatidor']
			//'Id_compra'=$post[''id_compra'']
		);
		$this->db->where('Id_compra', $post['id_compra']);
		$this->db->update('jam_compra',$data);
	}

/*ELIMINAR EL PEDIDOD DE COMPRA*/
function get_eliminar_pedido($post){
	
		$data=array(
			'Estado'=>3
		);
			//$this->db->where('Id_movilidad',$post['movilidad'],);
			$this->db->where('Id_compra', $post['id_compra']);	
		return $this->db->update('jam_compra',$data);
	}

function get_total_eliminados(){				
		$query= $this->db->get('v_compra_currier_estado3');
		return $query->result_array();
	}
function get_total_procesos(){				
		$query= $this->db->get('v_compra_currier_estado2');
		return $query->result_array();
	}

}
