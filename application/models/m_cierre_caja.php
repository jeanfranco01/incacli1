<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cierre_caja extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}

	function get_all_reporte_cierre(){

		$Id_tienda = $this->session->userdata('Id_tienda');

		$this->db->where("Id_tienda", $Id_tienda);
	 	return $this->db->get('v_cierre_caja_w')->result();

	}

	


}?>