<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda_admin extends CI_Controller{
  
    public function __construct(){
        parent::__construct();
        $this->load->model('M_tienda'); 
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
      $this->load->view('tienda',$data);
    }

    public function getAllPrincipalPendiente(){
      if($this->input->is_ajax_request()){
        $estado_compra=$this->input->post('estado_compra');
        $table = $this->M_tienda->get_all_principal_pendiente($estado_compra);

        /*$Opciones = "<button Id_compr=$row->Id_compra class='btn green darken-1 waves-effect waves-light' ><i class='material-icons'>edit</i></button>";
        //var_dump($table);
        $btn_informe = "<center><button id_pm='".$row->Id_orden_p."' class='btn blue darken-1 waves-effect waves-light view-cotizacion_oc'><i class='material-icons'>attach_file</i></button><button id_oc='".$row->Id_orden."' tipo_oc='".$row->Tipo."' class='btn teal waves-effect waves-light view-pdf_oc'><i class='material-icons'>note</i></button><button id_pm='".$row->Id_orden_p."' class='btn orange waves-effect waves-light view-pdf_material'><i class='material-icons'>format_list_bulleted</i></button><button id_oc='".$row->Id_orden."' class='btn red waves-effect waves-light view-pdf_im'><i class='material-icons'>playlist_add_check</i></button></center>";*/


        if(count($table) > 0){
            foreach ($table as $row){
              if ($_SESSION['Id_usuario']==63) {
                $Opciones = $row->Nombre_tienda;
              }else{
                $Opciones = "<button Id_compra='".$row->Id_compra."' class='btn green darken-1 waves-effect waves-light enviar-compra' ><i class='material-icons'>check</i></button><button Id_compra='".$row->Id_compra."' class='btn red darken-1 waves-effect waves-light cancel-compra'><i class='material-icons'>delete</i></button>";
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

    public function getByAllPrincipalPendiente(){
      if($this->input->is_ajax_request()){
       
        $prueba = $this->input->post("estado_compra");
        $table = $this->M_tienda->get_by_all_principal_pendiente($prueba);
        //echo json_encode($table);
        //$Opciones = "<button Id_compr=$row->Id_compra class='btn green darken-1 waves-effect waves-light' ><i class='material-icons'>edit</i></button>";
        //var_dump($table);
        if(count($table) > 0){

            foreach ($table as $row){
              if ($_SESSION['Id_usuario']==63) {
                $Opciones = $row->Nombre_tienda;
              }else{
                if ($prueba == 1) {
                  $Opciones = "<button Id_compra='".$row->Id_compra."' class='btn green darken-1 waves-effect waves-light enviar-compra' ><i class='material-icons'>check</i></button><button Id_compra='".$row->Id_compra."' class='btn red darken-1 waves-effect waves-light cancel-compra' ><i class='material-icons'>delete</i></button>";
                }else if ($prueba == 2) {
                  $Opciones = "<button Id_compra='".$row->Id_compra."' Id_tienda='".$row->Id_tienda."' Id_usuario_cliente='".$row->Id_usuario_cliente."' Monto_total='".$row->Monto_total."' class='btn green darken-1 waves-effect waves-light concluir-compra' ><i class='material-icons'>check</i></button><button Id_compra='".$row->Id_compra."' class='btn red darken-1 waves-effect waves-light cancel-compra' ><i class='material-icons'>delete</i></button>";
                }else if ($prueba == 3) {
                  $Opciones = "<button Id_compra='".$row->Id_compra."' class='btn orange darken-1 waves-effect waves-light reintegrar-compra' ><i class='material-icons'>reply</i></button>";
                }else if ($prueba == 4) {
                  $Opciones = "<button Id_compra='".$row->Id_compra."' class='btn blue darken-1 waves-effect waves-light' ><i class='material-icons'>description</i></button>";
                }
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

    public function getByNumeroCompraPendiente(){
      if($this->input->is_ajax_request()){
        $data = $this->M_tienda->get_by_numero_compra_pendiente();
        echo json_encode($data);

      } else{
        show_404();
      }
    }

    public function getCancelCompra(){
      if($this->input->is_ajax_request()){
        $data = $this->M_tienda->get_cancel_compra($this->input->post());
      } else{
        show_404();
      }
    }

    public function getReintegrarCompra(){
      if($this->input->is_ajax_request()){
        $data = $this->M_tienda->get_reintegrar_compra($this->input->post());
      } else{
        show_404();
      }
    }

    public function getEnviarCompra(){
      if($this->input->is_ajax_request()){
        $data = $this->M_tienda->get_enviar_compra($this->input->post());
      } else{
        show_404();
      }
    }

    public function getConcluidoCompra(){
      if($this->input->is_ajax_request()){
        $data = $this->M_tienda->get_concluido_compra($this->input->post());
      } else{
        show_404();
      }
    }

    public function geCierreCajaTotalDia(){
      if($this->input->is_ajax_request()){
        $data = $this->M_tienda->get_cierre_caja_total_dia();
        //var_dump($data);
        echo json_encode($data);
      } else{
        show_404();
      }
    }

    public function cerrarCaja(){
      if($this->input->is_ajax_request()){
        //var_dump($this->input->post());
        $data = $this->M_tienda->cerrar_caja($this->input->post());
        echo json_encode($data);
      } else{
        show_404();
      }
    }

}