<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_asignar_movilidad extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}
	function get_all_movilidad(){
			
			//$Id_tienda = $this->session->userdata('Id_tienda');
			$fecha_fin=date('Y-m-d');

			//$this->db->where("Fecha", $fecha_fin);
			//$this->db->where("Id_tienda", $Id_tienda);
		 	return $this->db->get('v_movilidad')->result();
			
	}
	/*CREAR UNA NUEVA MOVLIDAD*/
function get_add_movilidad($post){
	$Id_tienda = $this->session->userdata('Id_tienda');
		$data=array(
			'Id_movilidad'=>'',
			'Placa'=>$post['placa'],
			'Estado'=>1,
			'Id_tienda'=>$Id_tienda
		);
		
		$this->db->insert('jam_movilidad',$data);
	}

function get_by_id_movilidad($movilidad){
		$data=array(
			'Id_movilidad' => $movilidad
		);
		
		$query = $this->db->get_where('jam_movilidad', $data);
		return $query->result_array();
	}


	/*EDITAR UNA NUEVA MOVLIDAD*/
function get_edit_movilidad($post){
	$Id_tienda = $this->session->userdata('Id_tienda');
		$data=array(
			'Placa'=>$post['placa'],
			'Id_tienda'=>$Id_tienda
		);
			$this->db->where('Id_movilidad',$post['movilidad'],);	
		$this->db->update('jam_movilidad',$data);
	}

	/*ELIMINAR UNA NUEVA MOVLIDAD*/
function get_eliminar_movilidad($post){
	$Id_tienda = $this->session->userdata('Id_tienda');
		$data=array(
			'Estado'=>0,
			'Id_tienda'=>$Id_tienda
		);
			$this->db->where('Id_movilidad',$post['movilidad'],);	
		$this->db->update('jam_movilidad',$data);
	}


}
