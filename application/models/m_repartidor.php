<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_repartidor extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}

	function get_all_repartidor_pendiente(){
		
		$Id_usuario = $this->session->userdata('Id_usuario');
		//$fecha_fin=date('Y-m-d');

		//$this->db->where("Fecha", $fecha_fin);
		$this->db->where("Id_repartidor", $Id_usuario);
		$this->db->where("Id_tipo_distribuidor", 2);

	 	return $this->db->get('v_compra_enviados_w')->result();

	}
}