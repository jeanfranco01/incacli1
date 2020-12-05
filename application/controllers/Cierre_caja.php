<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cierre_caja extends CI_Controller{
  
    public function __construct(){
        parent::__construct();
        $this->load->model('M_cierre_caja'); 
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

  		//var_dump('Cierre_caja');
      	$this->load->view('cierre_caja',$data);
    }

    public function getAllReporteCierre(){
      if($this->input->is_ajax_request()){
        $table = $this->M_cierre_caja->get_all_reporte_cierre();

        if(count($table) > 0){
            foreach ($table as $row){

                $tab = array(
                  "Fecha_cierre_caja" => $row->Fecha_cierre_caja,
                  "Usuario_tienda" => $row->Usuario_tienda,
                  "Monto_cierre_caja" => $row->Monto_cierre_caja,
                  "Gastos" => $row->Gastos,
                  "Detalle_gastos" => $row->Detalle_gastos,
                  "Monto_final" => $row->Monto_final
      
                 );
                $r_tab[] = $tab;                
            }
            $output = array(
                "data" =>  $r_tab
            );
            echo json_encode($output);
        }
      } else{
        show_404();
      }
    }
}