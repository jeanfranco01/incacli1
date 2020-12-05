<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_asignar_operador extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}


function get_all_pedido(){
			
			$Id_tienda = $this->session->userdata('Id_tienda');
			$fecha_fin=date('Y-m-d');

			//$this->db->where("Fecha", $fecha_fin);
			//$this->db->where("Id_tienda", $Id_tienda);
		 	return $this->db->get('v_compra_currier_pendiente')->result();
			
	}
}
