<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repartidor extends CI_Controller{
  
    public function __construct(){
        parent::__construct();
        $this->load->model('M_repartidor'); 
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

      	/*$prueba = $this->M_tienda->get_by_numero_compra_pendiente();*/

  		//var_dump($this->session->userdata('Id_tienda'));
      $this->load->view('repartidor',$data);
    }

    public function getAllRepartidorPendiente(){
      if($this->input->is_ajax_request()){
        $table = $this->M_repartidor->get_all_repartidor_pendiente();

        if(count($table) > 0){
            foreach ($table as $row){
              $Opciones = "<button Id_compra='".$row->Id_compra."' Id_tienda='".$row->Id_tienda."' Id_usuario_cliente='".$row->Id_usuario_cliente."' Monto_total='".$row->Monto_total."' class='btn green darken-1 waves-effect waves-light concluir-compra' ><i class='material-icons'>check</i></button><button Id_compra='".$row->Id_compra."' class='btn red darken-1 waves-effect waves-light cancel-compra' ><i class='material-icons'>delete</i></button>";

                $tab = array(
                  "Id_compra" => $row->Id_compra,
                  "Fecha" => $row->Fecha,
                  "Hora" => $row->Hora, 
                  "Usuario_cliente" => $row->Usuario_cliente,
                  "Direccion" => $row->Direccion,
                  "Telefono" => $row->Telefono,  
                  "Pedido" => $row->Platillo . ' <br> '.$row->Extra,
                  "Metodo" => $row->Metodo,
                  //"Extra" => $row->Extra,
                  //"Monto_platillo" => $row->Monto_platillo, 
                  //"Monto_extra" => $row->Monto_extra,
                  "Monto_total" => $row->Monto_total,
                  "Opciones" => $Opciones
      
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