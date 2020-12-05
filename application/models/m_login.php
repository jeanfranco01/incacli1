<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_login extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function validate($usuario,$password){
		$this->db->where('Usuario',$usuario);
		$this->db->where('Clave',$password);
		 $query = $this->db->get('v_usuario_tienda_w');
		if($query->num_rows() == 1){
		 	return $query->row();
		}else{
		 	$this->session->set_flashdata('usuario_incorrecto');
		 	redirect($this->config->item('project_url').'login');
		}
	}
}