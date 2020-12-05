<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lista_tienda extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}
 
	function get_all_lista_tienda(){
		$this->db->where("Estado !=", 0);
		//$this->db->where("Id_tienda", $Id_tienda);
	 	return $this->db->get('v_tienda_w')->result();
	}
	function get_by_id_lista_tienda($id_tienda){
		$data=array(
			'id_tienda' => $id_tienda
		);
		
		$query = $this->db->get_where('v_tienda_w', $data);
		return $query->result_array();
	}
	function get_edit_lista_tienda($post){
		$data=array(			
			'Razon_social_nombre_tienda'=>$post['Nombre_tienda'],
			'Propietario'=>$post['Propietario'],
			'Telefono'=>$post['Telefono'],
			'Direccion'=>$post['Direccion'],		
			'Fecha_registro'=>$post['Fecha']
			//'Email'=>$post['Email']			
		);
		$this->db->where('Id_tienda', $post['Codigo']);
		$this->db->update('jam_tienda',$data);

		$datos=array(
			'Direccion'=>$post['Email']
			);
		$this->db->where('Id_tienda', $post['Codigo']);
		$this->db->update('jam_usuario_tienda',$datos);
	}
function get_eliminar_tienda($post){
		$data=array(			
			'Estado'=>0			
		);
		$this->db->where('Id_tienda', $post['id_tienda']);
		$this->db->update('jam_tienda',$data);

		$datos=array(
			'Estado'=>0
			);
		$this->db->where('Id_tienda', $post['id_tienda']);
		$this->db->update('jam_usuario_tienda',$datos);
	}
}?>