<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller{
  
    public function __construct(){
        parent::__construct();
        //$this->load->model('M_liquidacion_acomp'); 
        $this->load->library(array('session'));
 	      $this->load->helper(array('url'));
    }
     
    public function index(){
    	if($this->session->userdata('Is_logued_in') == FALSE ){
    		redirect($this->config->item('project_url').'login');
    	}
    	$data['imagenes']=$this->config->item('imagenes');
    	$data['url']=$this->config->item('project_url');
  		$data['files_url']=$this->config->item('files_url');
  		$data['title']='INCACLIC';

  		//var_dump('REPORTE');
      	$this->load->view('reporte',$data);
    }
}