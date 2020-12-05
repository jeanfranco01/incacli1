<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista_tienda extends CI_Controller{
  
    public function __construct(){
        parent::__construct();
        $this->load->model('M_lista_tienda'); 
        $this->load->library('session');
 	    $this->load->helper(array('url'));
    }
      
    public function index(){
    	if($this->session->userdata('Is_logued_in') == FALSE ){
    		redirect($this->config->item('project_url').'login');
    	}
    	$data['imagenes']=$this->config->item('imagenes');
    	$data['url']=$this->config->item('project_url');
  		$data['files_url']=$this->config->item('files_url');
  		$data['ftp_imagen']=$this->config->item('ftp_imagenes');
  		//$data['lista_tienda'] = $this->M_lista_tienda->get_all_lista_tienda();
  		$data['title']='INCACLIC';
  		//var_dump($data['lista_tienda']);
      	$this->load->view('lista_tienda',$data);
        
    }

    /**FUNCION FORMULARIo PARA SUBIR IMAGEN PRUEBA OK**/
    public function formulario(){
      $this->load->view('formulario');
      $this->cargar_archivo();
    }
    /*****SUBIR IMAGEN**/
    function cargar_archivo() {

            $mi_archivo = 'upload';
            $config['upload_path'] = "uploads/";
            $config['file_name'] = "nombre_archivo";
            $config['allowed_types'] = "*";
            $config['max_size'] = "50000";
            $config['max_width'] = "2000";
            $config['max_height'] = "2000";

            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload($mi_archivo)) {
                //*** ocurrio un error
                //$data['uploadError'] = $this->upload->display_errors();
                 $this->upload->display_errors();
                return;
            }

            var_dump($this->upload->data());
        }
  /*****FIN DE SUBIR IMAGEN*/  
    public function getAllListaTienda(){
      if($this->input->is_ajax_request()){
        $table = $this->M_lista_tienda->get_all_lista_tienda();

        if(count($table) > 0){
            foreach ($table as $row){

            	$btn_opciones = "<center><button class='btn red waves-effect waves-light btn_delete_tienda' id_tienda='".$row->Id_tienda."' nom_tienda='".$row->Razon_social_nombre_tienda."'><i class='material-icons'>delete</i></button><button class='btn blue waves-effect waves-light btn_view_tienda' id_tienda='".$row->Id_tienda."' nom_view_tienda='".$row->Razon_social_nombre_tienda."' imagen='".$row->Imagen."'><i class='material-icons'>visibility</i></button><button class='btn orange waves-effect waves-light btn_edit_tienda' id_tienda='".$row->Id_tienda."'nom_edit_tienda='".$row->Razon_social_nombre_tienda."' imagen='".$row->Imagen."'><i class='material-icons'>edit</i></button></center>";

                $tab = array(
                  "Id_tienda" => $row->Id_tienda,
                  "Razon_social_nombre_tienda" => $row->Razon_social_nombre_tienda,
                  "Propietario" => $row->Propietario,
                  "DNI" => $row->DNI,
                  "Telefono" => $row->Telefono,
                  "Direccion" => $row->Direccion,
                  "Fecha_registro" => $row->Fecha_registro,
                  "Email" => $row->Email,
                  "Opciones" => $btn_opciones
      
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
public function gettlistatienda(){
        if($this->input->is_ajax_request()){
            $info = $this->M_lista_tienda->get_by_id_lista_tienda($this->input->post('id_tienda'));
            echo json_encode($info);
        } 
        else{
            show_404();
        }
    }

 public function getteditlistatienda(){
      if ($this->input->is_ajax_request()) {
        $info=$this->M_lista_tienda->get_edit_lista_tienda($this->input->post());
        echo json_encode($info);
      }else{
        show_404();
      }
    }
/*ELIMINAR UNA TIENDA*/
public function getteliminartienda(){
      if ($this->input->is_ajax_request()) {
        $info=$this->M_lista_tienda->get_eliminar_tienda($this->input->post());
        echo json_encode($info);
      }else{
        show_404();
      }
    }


}