<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar_movilidad extends CI_Controller{
  
    public function __construct(){
        parent::__construct();
        $this->load->model('M_asignar_movilidad'); 
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

        //$data['tipo_productos'] = $this->M_producto->get_all_tipo_producto();
       
	  		$data['title']='INCACLIC';
            $this->load->view('asignar_movilidad',$data);
    }   


public function getAllMovilidad(){
      if($this->input->is_ajax_request()){
        $table = $this->M_asignar_movilidad->get_all_movilidad();

  if(count($table) > 0){
            foreach ($table as $row){
              $Opciones = "<button Id_movilidad='".$row->Id_movilidad."' class='btn green darken-1 waves-effect waves-light editar-movimiento' ><i class='material-icons'>check</i></button><button Id_movilidad='".$row->Id_movilidad."' class='btn red darken-1 waves-effect waves-light delete_movilidad'><i class='material-icons'>delete</i></button>";

                $tab = array(
                  "Id_movilidad" => $row->Id_movilidad,
                  "Placa" => $row->Placa,
                  "Estado" => $row->Estado, 
                  "Id_tienda" => $row->Id_tienda,
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


/*CREAR UNA MOVILIDAD CONTROLADOR**/
public function gettaddmovilidad(){
      if ($this->input->is_ajax_request()) {
        $info=$this->M_asignar_movilidad->get_add_movilidad($this->input->post());
        echo json_encode($info);
      }else{
        show_404();
      }
    }


public function getByIdmovilidad(){
        if($this->input->is_ajax_request()){
            $info = $this->M_asignar_movilidad->get_by_id_movilidad($this->input->post('movilidad'));
            echo json_encode($info);
        } 
        else{
            show_404();
        }
    }

/*EDITAR UNA MOVILIDAD*/
public function getteditmovilidad(){
      if ($this->input->is_ajax_request()) {
        $info=$this->M_asignar_movilidad->get_edit_movilidad($this->input->post());
        echo json_encode($info);
      }else{
        show_404();
      }
    }

/*ELIMINAR UNA MOVILIDAD*/
public function getteliminarmovilidad(){
      if ($this->input->is_ajax_request()) {
        $info=$this->M_asignar_movilidad->get_eliminar_movilidad($this->input->post());
        echo json_encode($info);
      }else{
        show_404();
      }
    }

}