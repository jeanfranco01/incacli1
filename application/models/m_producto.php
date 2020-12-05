<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_producto extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}

	function get_all_producto(){

		$Id_tienda = $this->session->userdata('Id_tienda');

		$this->db->where("Estado !=", 0);
		$this->db->where("Id_tienda", $Id_tienda);
	 	return $this->db->get('v_platillo_m')->result();

	}

	function get_all_tipo_producto(){

		$Id_tienda = $this->session->userdata('Id_tienda');

		$this->db->where("Id_tienda", $Id_tienda);
	 	return $this->db->get('v_tipo_menu_m')->result_array();

	}
 	function get_count_categoria(){

		$Id_tienda = $this->session->userdata('Id_tienda');
			//"Id_tienda", $Id_tienda
		//EXISTS (SELECT $Id_tienda FROM v_conteo_tipo_menu)
			   		$this->db->where("Id_tienda", $Id_tienda);
	 	 	return   $this->db->get('v_conteo_tipo_menu')->result_array();
	 	/*if($prueba ==''){
	 		return $prueba==['conteo_categoria'][0];
	 		
	 	}else{
	 		$prueba==['conteo_categoria'][0];
	 		return $prueba;
	 	} */

	 	/*if($prueba==''){
	 		$prueba=0;
	 	}*/
	}
	function get_by_delete_producto($id){
		$data=array(
			'Estado' => 0
		);
		$this->db->where('Id_platillo', $id);
		$this->db->update('jam_platillo', $data);
	}

	function add_adjunto_img_producto($id,$nombre){
		
		$data_adjunto = array(
				'Imagen' => $nombre
		);
		$this->db->where('Id_platillo', $id);
		$this->db->update('jam_platillo', $data);
	}
/***traer datos de editar */
	function get_by_id_producto($id_producto){
		$data=array(
			'Id_platillo' => $id_producto
		);
		
		$query = $this->db->get_where('v_platillo_m', $data);
		return $query->result_array();
	}
/****editar producto*/
	function edit_lista_producto($nombreImg,$id_producto,$nombre_producto,$Descripcion,$Precio){
		$Id_tienda = $this->session->userdata('Id_tienda');	

		$data = array(
		    'Platillo' => $nombre_producto,
		    'Descripcion' => $Descripcion,
		    'Precio' => $Precio,
		    'Id_tienda' => $Id_tienda
		    
		);
		if($nombreImg!=null){
			$data['Imagen'] =$nombreImg;
			
			

		}
				$this->db->where('Id_platillo',$id_producto);
		$query =$this->db->update('jam_platillo', $data);
		return $query;
	}



	/*function edit_lista_producto($post){
		$Id_tienda = $this->session->userdata('Id_tienda');	

		$data = array(

		    'Platillo' => $post['nombre_producto'],
		    'Descripcion' => $post['Descripcion'],
		    'Precio' => $post['Precio'],
		    'Id_tienda' => $Id_tienda
		    
		);
				$this->db->where('Id_platillo',$post['id_producto']);
		return 	$this->db->update('jam_platillo', $data);
		
	}*/

	function add_produc($post,$select_tipo_producto){ // parameter post: array of rows
		//$fecha_actual = date('Y-m-d H:i:s');

		$ids=[];
		foreach ($post as $detalle) {
			$data = array(

			        'Platillo' => $detalle[0],
			        'Precio' => $detalle[2],
			        'Id_tienda' => $this->session->userdata("Id_tienda"),
			        'Descripcion' => $detalle[1],
			        'Id_tipomenu'=> $select_tipo_producto,
			        'Estado' => '1',
			        'Imagen' => '1'
			);
			$this->db->insert('jam_platillo', $data);
			$id=$this->db->insert_id();
			array_push($ids, $id);
		}
		return $ids;
		/*$this->db->trans_start();
		$this->db->insert('jam_platillo', $data);
		$id=$this->db->insert_id(); //use to update id_pm_detalle
		$query =$this->db->query($sql_1);
		foreach ($post as $detalle) {
			//[0] Id_producto,[1] cantidad,[2] Id_unidad_medida
			$data_detalle=array(
					1=>$detalle[0], //Id_producto
					2=>$detalle[2], //Id_unidad_medida
					3=>$detalle[1], //cantidad
					4=> $fecha_actual, //fecha_registro
					5=>$this->session->userdata('id_usuario'),
					6=> $detalle[3], //cantidad_detalle
			);
			$query =$this->db->query($sql_2,$data_detalle);
		}
		$sql_3="update orden_pedido set Id_orden_detalle=@temp_id where Id_orden_pedido=$id";
		$query =$this->db->query($sql_3);
		$this->db->trans_complete();
		return $id;*/
	}

	function add_adjunto_producto($id,$archivo){
		/*$data=array(
			'Imagen' => $archivo
		);*/
		$this->db->set('Imagen', $archivo);
		$this->db->where('Id_platillo',$id);
		$this->db->update('jam_platillo',$data);
	}

	function add_categoria_produc($post){
		$Id_tienda = $this->session->userdata('Id_tienda');

		$lunes=$post['lunes'];
		$martes=$post['martes'];
		$miercoles=$post['miercoles'];
		$jueves=$post['jueves'];
		$viernes=$post['viernes'];
		$sabado=$post['sabado'];
		$domingo=$post['domingo'];


		$data = array(

		    'Nombre_menu' => $post['categoria_producto'],
		    'Id_tienda' => $Id_tienda,
		    'Estado' => 1,
		    'Dia_disponible' => $lunes.'-'.$martes.'-'.$miercoles.'-'.$jueves.'-'.$viernes.'-'.$sabado.'-'.$domingo
		);
		$this->db->insert('jam_tipo_menu', $data);
	}

}?>