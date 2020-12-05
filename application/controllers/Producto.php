<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller{
  
    public function __construct(){
        parent::__construct();
        $this->load->model('M_producto'); 
        $this->load->library('session');
        $this->load->library('ftp');
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
      $data['tipo_productos'] = $this->M_producto->get_all_tipo_producto();
  		$data['conteo_categoria'] = $this->M_producto->get_count_categoria();
      //var_dump($data['tipo_productos']);
      //echo $data['tipo_productos'][0];
  		$data['title']='INCACLIC';

  		//var_dump('REPORTE');
      	$this->load->view('producto',$data);
    }

    public function getAllProducto(){
      if($this->input->is_ajax_request()){
        $table = $this->M_producto->get_all_producto();

        if(count($table) > 0){
            foreach ($table as $row){
            	$btn_opciones = "<center><button class='btn red waves-effect waves-light btn_delete_producto' id_producto='".$row->Id_platillo."' nom_producto='".$row->Platillo."'><i class='material-icons'>delete</i></button><button class='btn blue waves-effect waves-light btn_view_producto' nom_view_producto='".$row->Platillo."' imagen='".$row->Imagen."'><i class='material-icons'>visibility</i></button>
                <button class='btn orange waves-effect waves-light btn_edit_producto'id_producto='".$row->Id_platillo."' url_imagen='".$row->Imagen."'><i class='material-icons'>create</i></button>
              </center>";

                $tab = array(
                  "Id_platillo" => $row->Id_platillo,
                  "Platillo" => $row->Platillo,
                  "Descripcion" => $row->Descripcion,
                  "Precio" => $row->Precio,
                  "Nombre_menu"=>$row->Nombre_menu,
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

    public function getByDeleteProducto(){
    	if ($this->input->is_ajax_request()) {
    		$this->M_producto->get_by_delete_producto($this->input->post('id'));
    	}else{
    		show_404();
    	}
    } 

    public function add_productos(){
  		if($this->input->is_ajax_request()){

  			$add_producto=json_decode($this->input->post("add_producto"));
  			$add_descripcion=json_decode($this->input->post("add_descripcion"));
  			$add_precio=json_decode($this->input->post("add_precio"));
  			$select_tipo_producto=$this->input->post("select_tipo_producto");
  			$add_id_tienda=$this->input->post("add_id_tienda");

  			$post = array();
  			$n=count($add_producto);
  			for ($i=0; $i < $n; $i++){
  				$temp_row = array($add_producto[$i],$add_descripcion[$i],$add_precio[$i]);
  				array_push($post,$temp_row);
  			}

  			$ids=$this->M_producto->add_produc($post,$select_tipo_producto);

  			$F = array();
  			$files = $_FILES;
  			$count_uploaded_files = count($_FILES['cotizaciones']['name']);
  			for( $i = 0; $i < $count_uploaded_files; $i++ ){
  			    $_FILES['userfile'] = [
  			      'name'     => $files['cotizaciones']['name'][$i],
  				    'type'     => $files['cotizaciones']['type'][$i],
  				    'tmp_name' => $files['cotizaciones']['tmp_name'][$i],
  				    'error'    => $files['cotizaciones']['error'][$i],
  				    'size'     => $files['cotizaciones']['size'][$i]
  				  ];

  				  $F[] = $_FILES['userfile'];
  				  $ext = end((explode(".",$F[$i]["name"])));

  				  //FTP configuration
  		        $ftp_config['hostname'] = '161.132.98.19'; 
	            $ftp_config['username'] = 'repositorio';
	            $ftp_config['password'] = 'jama2020';
  		        $ftp_config['debug']    = TRUE;

  				  //Connect to the remote server
  		        $this->ftp->connect($ftp_config);
  		        //$ruta_destino="test/varilla/v$ids[$i]-tc$ids_tipo_combustible[$i]".".".$ext; //***use in building
  		        $ruta_destino="imagenes/producto_imagenes/T$add_id_tienda-TM$select_tipo_producto-P$ids[$i]".".".$ext; //***use in produccion
  		        $ruta_archivo=$F[$i]["tmp_name"];
  		        $this->ftp->upload($ruta_archivo, $ruta_destino);
  		        $ruta_destino="T$add_id_tienda-TM$select_tipo_producto-P$ids[$i]".".".$ext; //***use in produccion
  		        $this->M_producto->add_adjunto_producto($ids[$i],$ruta_destino);
  			}
  			//Close FTP connection
  		    $this->ftp->close();
  		}else{
  			show_404();
  		}
	  }
/**traer datos de editar*/
public function gettIdProducto(){
        if($this->input->is_ajax_request()){
            $info = $this->M_producto->get_by_id_producto($this->input->post('id_producto'));
            echo json_encode($info);
        } 
        else{
            show_404();
        }
    }
/**editar*/
    public function EditProducto(){
      if($this->input->is_ajax_request()){
        /**pasar los datos a un formdata**/

       /* $id_producto=json_decode($this->input->post("id_producto"));
        $nombre_producto=json_decode($this->input->post("nombre_producto"));
        $Descripcion=json_decode($this->input->post("Descripcion"));
        $Precio=json_decode($this->input->post("Precio"));*/
        $id_producto=$this->input->post("id_producto");
        $nombre_producto=$this->input->post("nombre_producto");
        $Descripcion=$this->input->post("Descripcion");
        $Precio=$this->input->post("Precio");

        $ftp_config['hostname'] = '161.132.98.19';
        $ftp_config['username'] = 'repositorio';
        $ftp_config['password'] = 'jama2020';
        $ftp_config['debug']    = TRUE;   //Connect to the remote server
        $this->ftp->connect($ftp_config);
        
        $img = $_FILES['file'];
        if($img!=''){
          $temp = explode(".",$img["name"]);
          $ext = end($temp);
          $nombreImg = "P$id_producto".".".$ext;
          $ruta_destino="imagenes/producto_imagenes/$nombreImg";
          $ruta_archivo=$img["tmp_name"];
          $this->ftp->upload($ruta_archivo, $ruta_destino);
          $this->ftp->close();
          $respuesta=$this->M_producto->edit_lista_producto($nombreImg,$id_producto,$nombre_producto,$Descripcion,$Precio);
         echo "true";
        } else{
          $nombreImg = null;
          $respuesta=$this->M_producto->edit_lista_producto($nombreImg,$id_producto,$nombre_producto,$Descripcion,$Precio);
          echo "true";
        }

        
        }else{
          show_404();
        }


       /* $respuesta=$this->M_producto->edit_lista_producto($this->input->post());
        echo json_encode($respuesta);
      }else{
        show_404();
      }*/
    }

    public function add_categoria_productos(){
      if($this->input->is_ajax_request()){

        $respuesta=$this->M_producto->add_categoria_produc($this->input->post());
        echo json_encode($respuesta);
      }else{
        show_404();
      }
    }

    public function addPostulante(){
      if ($this->input->is_ajax_request()) {
        $config_email = array(
         'protocol' => 'smtp',
         'smtp_host' => 'ssl://smtp.gmail.com',
         'smtp_port' => 587,
         'smtp_user' => 'incaclic.soporte@gmail.com',
         'smtp_pass' => 'incaclic2020',
         'starttls'  => true,
         'mailtype' => 'html',
         'charset' => 'utf-8',
         'newline' => "\r\n"
        );

        $this->email->initialize($config_email);
        $this->email->from('incaclic.soporte@gmail.com','Incaclic');//correo corporativo
        $this->email->to('darkin4554@gmail.com'); //use in production
        //$this->email->cc('yccanto@vipusa.pe');
        //$this->email->to('jvizarro@vipusa.pe');
        $this->email->subject('SISTEMA SOPORTE INCACLIC (REGISTRO DE USUARIO) ');
        //$this->email->message('<h4><b>BIEN VENIDO A LA FAMILIA INCACLIC</b></h4><br><br>Se le brindara un usuario y contraseña para que pueda acceder al <a href=http://app.incaclic.com/tienda/>sistema de gestion de su tienda</a>.<br><br>usuario: <b>'.$usuario.'</b><br>contraseña: <b>'.$usuario.'</b>.<br><br><br> <small><i>NOTA: Este mensaje se ha generado automáticamente, si hubiera algún inconveniente comunicarse con el área de soporte de <b>INCACLIC</b><br>Soporte Incaclic: 999999999</i></small>');
        //$this->email->send();
        $this->email->message('hola');
        $is_send = $this->email->send();
        echo $this->email->print_debugger();
         if($is_send){
          echo json_encode('is send');
          $this->session->set_flashdata('envio', 'Email enviado correctamente');
        }else{
          $arr = $this->email->get_debugger_messages();
          echo json_encode($arr);
          $this->session->set_flashdata('envio', 'No se a enviado el email');
        } 
      }else{
        show_404();
      }
    }
}