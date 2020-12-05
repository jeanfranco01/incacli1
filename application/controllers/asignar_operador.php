<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar_operador extends CI_Controller{
  
    public function __construct(){
        parent::__construct();
        $this->load->model('M_asignar_operador'); 
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
            $this->load->view('asignar_operador',$data);
    }   
public function getAllPedido(){
      if($this->input->is_ajax_request()){
        $table = $this->M_asignar_operador->get_all_pedido();

  if(count($table) > 0){
            foreach ($table as $row){
              $Opciones = "<button Id_pedido='".$row->Id_compra."' class='btn green darken-1 waves-effect waves-light editar-pedido' ><i class='material-icons'>check</i></button><button Id_pedido='".$row->Id_compra."' class='btn red darken-1 waves-effect waves-light eliminar-pedido'><i class='material-icons'>delete</i></button>";

           

                $tab = array(
                  "Id_compra" => $row->Id_compra,
                  "Fecha" => $row->Fecha,
                  "Hora" => $row->Hora, 
                  "Usuario_cliente" => $row->Usuario_cliente,
                  "Direccion" => $row->Direccion,
                  "Telefono" => $row->Telefono,  
                  "Pedido" => $row->Platillo . ' <br> '.$row->Extra,
                  "Metodo" => $row->Metodo,
                  
                  "nombre_tienda" => $row->nombre_tienda,
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