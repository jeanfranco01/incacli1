<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currier extends CI_Controller{
  
    public function __construct(){
        parent::__construct();
        $this->load->model('M_currier'); 
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
        $data['movilidad'] = $this->M_currier->get_all_movilidad();
        $data['all_repartidor'] = $this->M_currier->get_all_repartidor();
        $data['cant_eliminados']=$this->M_currier->get_total_eliminados();
        $data['cant_procesos']=$this->M_currier->get_total_procesos();

       //var_dump($data['all_repartidor']);
        
        //$data['tipo_productos'] = $this->M_producto->get_all_tipo_producto();
       
	  		$data['title']='INCACLIC';
      

      	$this->load->view('currier',$data);
    }
  public function getAllCurrier(){
      if($this->input->is_ajax_request()){
        $estado_validador = $this->input->post("estado");
        $table = $this->M_currier->get_all_currier();

  if(count($table) > 0){
            foreach ($table as $row){


          if($row->Id_cierre_editar == 0){
              $Opciones = "<button Id_pedido='".$row->Id_compra."' class='btn green darken-1 waves-effect waves-light editar-pedido' ><i class='material-icons'>check</i></button><button Id_pedido='".$row->Id_compra."' class='btn red darken-1 waves-effect waves-light eliminar-pedido'><i class='material-icons'>delete</i></button>";

          }else if($row->Id_cierre_editar == 1){
              $Opciones = "<button Id_pedido='".$row->Id_compra."' class='btn orange darken-1 waves-effect waves-light pedido-concluido' ><i class='material-icons'>lock_outline</i></button><button Id_pedido='".$row->Id_compra."' class='btn red darken-1 waves-effect waves-light eliminar-pedido'><i class='material-icons'>delete</i></button>";

           }

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
                  "Placa" => $row->Placa,
                  
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


 public function getAllCanceladoCurrier(){
      if($this->input->is_ajax_request()){
        $estado_validador = $this->input->post("estado");
        $table = $this->M_currier->get_all_cancelados_currier();

  if(count($table) > 0){
            foreach ($table as $row){

if($estado_validador==3){
  $Opciones = "<button Id_pedido='".$row->Id_compra."' class='btn red darken-1 waves-effect waves-light alta-pedido' ><i class='material-icons'>lock_outline</i></button>";
} 
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
                  "Placa" => $row->Placa,
                  
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



      public function gettaddpedido(){
      if ($this->input->is_ajax_request()) {
        $info=$this->M_currier->get_add_pedido($this->input->post());
        echo json_encode($info);
      }else{
        show_404();
      }
    }



/*ELIMINAR UN PEDIDO*/
public function getteliminarpedido(){
      if ($this->input->is_ajax_request()) {
        $info=$this->M_currier->get_eliminar_pedido($this->input->post());
        echo json_encode($info);
      }else{
        show_404();
      }
    }


}