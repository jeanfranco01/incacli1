<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper(array('url','form'));
		$this->load->library('session');
	}
	public function index(){

		if($this->session->userdata('Is_logued_in')==TRUE){

			$data['title'] = 'GESTION TIENDA';
			
		 	header("Location: ".$this->config->item('project_url')."tienda_admin");

		}else{

			$data['title'] = 'GESTION TIENDA';
		 	$data['ip']=$this->config->item('ip');
		 	$data['project_url']=$this->config->item('project_url');

		 	$this->load->view('login',$data);

		}
	}
	public function validador(){
		
		$usuario = $this->input->post('usuario');
		$password = sha1($this->input->post('password'));

		// var_dump($password);

		$check_user = $this->M_login->validate($usuario,$password);

		if($check_user == TRUE){
			$data = array(
	           'Is_logued_in' 	=> 		TRUE,
	           'Id_usuario' 	=> 		$check_user->Id_usuario_tienda,
	           'Usuario_tienda' => 		$check_user->Usuario_tienda,
	           'Nombre_tienda' 	=> 		$check_user->Nombre_tienda,
	           'Usuario' 		=> 		$check_user->Usuario,
	           'Id_tienda' 		=> 		$check_user->Id_tienda,
	           'Id_tipo_usuario_master' 		=> 		$check_user->Id_tipo_usuario_master,
	           'Tipo_usuario_master' 			=> 		$check_user->Tipo_usuario_master
           	);
			$this->session->set_userdata($data);
		
			redirect($this->config->item('ip').'tienda_admin','refresh');
		}
			echo json_encode($check_user);
			
		
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
		
		//echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
	}

}

?>