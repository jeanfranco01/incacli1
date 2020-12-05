<?php 
defined('ID_SISTEMA')       OR define('ID_SISTEMA',1);

class MySession
{
    function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('America/Lima');
    }
//public $session_id;
//private $session_token;
public $Id_session;
public $session;
public $ip="161.132.98.19";
public $contra="jama2020";
public $bd="jamear";

public function __construct()
{   

    $mysqli = new mysqli($ip, "root", $contra, $bd);
    $result = $mysqli->query("SELECT Id_session FROM jam_session");
    //obtener registro  de la tabla session en bd y luego setear a la variable "session"($this->session)
    $this->session=[];
}

/*
* Configura caché de sesión y la inicializa
* 
* @params: void
*
* @return:  void
*/
public function set_id_sistema($Id_session){
    $this->Id_session=$Id_session;
}
//public function userdata($parametro='')
public function userdata($parametro=''){
    $mysqli = new mysqli($ip, "root", $contra, $bd);
    $result = $mysqli->query("SELECT Id_session FROM jam_session");//
    //var_dump ($result);
    $row = $result->fetch_array(MYSQLI_NUM);//Obtiene una fila de resultados como un array asociativo, numérico, o ambos
    $arr_sistemas=$row;
    //var_dump ($arr_sistemas);
    //$arr_sistemas=$this->session['id_sistema'];//voy a obtener ese parametro con consultas en mysql
    //$arr_data=$this->session['data'];

    $resuldata = $mysqli->query("SELECT data FROM jam_session");//
     //$data = {} pero tiene que estar en ''
    foreach ($resuldata as $rowdata) {
        $redata=$rowdata['data'];
        # code...
    }
     /*while($rowdata = $resultdata->fetch_array(MYSQL_ASSOC)) {
            $data[] = $rowdata;
    }*/
    //var_dump ($redata);
    //$arr_data=json_decode($redata,true);//true para que devuelva una matriz asociativa
    if($arr_sistemas!=NULL){//solo si hay registros va a ejecutar
        $arr_data=(array)json_decode($redata);//para que devuelva una matriz asociativa  
    
    //$arr_data=json_decode('$resuldata');//data lo obtengo de mi base de datos
    //var_dump ($arr_data);
    //var_dump ($arr_data['perfil']);
    //$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}'; 
    //var_dump(json_decode($json));
    $keys = array_keys($arr_data);//para poder acceder de la matriz asociativa por indice numerico
    $data_return=[];
    for ($i=0; $i < count($arr_sistemas); $i++) { 
        if ($arr_sistemas[$i] == $this->id_sistema) {
            $data_return[] = $arr_data[$keys[$i]];
            break;
        }
    }
    //var_dump ($data_return);
    if($parametro==NULL){
        return $data_return;
        echo "entro aqui";
    } else{
        //return $data_return[$parametro];
        return $arr_data[$parametro];
    }

    }
}

public function set_userdata($data){
    $dat=json_encode($data);
    $fecha_actual = date('Y-m-d H:i:s');
    $id_sistema=$this->id_sistema;
    $mysqli = new mysqli($ip, "root", $contra, $bd);
    //var_dump ($id_sistema);//NULL
    $result = $mysqli->query("SELECT Id_session FROM jam_session");//devuelve todosss los registros
    $row = $result->fetch_array(MYSQLI_NUM);
    $arr_sistemas=$row;
    //var_dump ($result);
    //$row = $result->fetch_object();
    //echo "$row->id_sistema";/
    //$fila =mysql_fetch_array($result);
    //for ($i=0; $i <count($fila) ; $i++) { 
    if($result != $arr_sistemas){
        $sql = "INSERT INTO jam_session(Id_session, Fecha_registro, Data, Estado) VALUES ('','$fecha_actual','$dat', '1')";
        //echo $sql;
        //echo "INGRESA..................................";
       $mysqli->query($sql);
       //VALUES ($id_sistema, $data)")
    //$this->db->insert('sesion', $data);
    }else{
            echo "esta registrado";
    }
    //}
    
}

public function sess_destroy()
{
    $Id_session=$this->Id_session;
    $mysqli = new mysqli($ip, "root", $contra, $bd);
    $result = $mysqli->query("UPDATE jam_session SET Estado=0 WHERE Id_session = $id_sistema");
    redirect('http://$ip/tienda/login','refresh');  
}








/*public function set_userdata($data,$id_sistema){
    $dat=json_encode($data);
    
    $mysqli = new mysqli($ip, "root", $contra, $bd);
    //var_dump ($id_sistema);//NULL
    $result = $mysqli->query("SELECT id_sistema FROM session");//devuelve todosss los registros
    $row = $result->fetch_array(MYSQLI_NUM);
    $arr_sistemas=$row;
    //var_dump ($result);
    //$row = $result->fetch_object();
    //echo "$row->id_sistema";/
    //$fila =mysql_fetch_array($result);
    //for ($i=0; $i <count($fila) ; $i++) { 
    if($result != $arr_sistemas){
        $sql = "INSERT INTO session(id_session,id_sistema, data) VALUES ('',$id_sistema,'$dat')";
        //echo $sql;
        //echo "INGRESA..................................";
       $mysqli->query($sql);
       //VALUES ($id_sistema, $data)")
    //$this->db->insert('sesion', $data);
    }else{
            echo "esta registrado";
    }
    //}
    
}*/

/*public function set_userdata($data,$value=NULL){
    if (is_array($data)){
        $id_sistema=$this->id_sistema;
        $dat=json_encode($data);
    
        $mysqli = new mysqli($ip, "root", $contra, $bd);
        //var_dump ($id_sistema);//NULL
        $result = $mysqli->query("SELECT id_sistema FROM session");//devuelve todosss los registros
        $row = $result->fetch_array(MYSQLI_NUM);
         $arr_sistemas=$row;
        //var_dump ($result);
        //$row = $result->fetch_object();
        //echo "$row->id_sistema";
        //$fila =mysql_fetch_array($result);
        //for ($i=0; $i <count($fila) ; $i++) { 
        if($result != $arr_sistemas){
            $sql = "INSERT INTO session(id_session,id_sistema, data) VALUES ('',$id_sistema,'$dat')";
        //echo $sql;
        //echo "INGRESA..................................";
            $mysqli->query($sql);
       //VALUES ($id_sistema, $data)")
    //$this->db->insert('sesion', $data);
        }else{
            echo "esta registrado";
        }
    //}
    }
    else{
        $mysqli = new mysqli($ip, "root", $contra, $bd);
        $resuldata = $mysqli->query("SELECT data FROM session");//
    
        foreach ($resuldata as $rowdata) {
            $redata=$rowdata['data'];
       
        }//para cada registro de data
        $result = $mysqli->query("SELECT id_sistema FROM session");
        $row = $result->fetch_array(MYSQLI_NUM);
         $arr_sistemas=$row;
        if($arr_sistemas!=NULL){
        $arr_data=(array)json_decode($redata);
        //va insertar el toquen o valor del parametro a el arreglo de la data
        $arr_data= array(
                    $value   =>   $value      
                );
        }
    }
}*/





























/*private function initSession()
{
    $this->setSessionCacheLimiter('private');
    $this->setSessionCacheExpire(0);
    $this->setCookieParams();

    session_start();

    $this->sessionRegenerateId();
}*/

/*
* Establece el limitador del caché actual
* 
* @params: String limiter: el limitador
*
* @return: void
*/
/*private function setSessionCacheLimiter($limiter)
{
    session_cache_limiter($limiter);
}

/*
* Establece la caducidad del caché en minutos
* 
* @params: Int minutes: duración del caché
*
* @return: void
*/
/*private function setSessionCacheExpire($minutes)
{
    session_cache_expire($minutes);
}

/*
* Establece los parámetros de la cookie. Su efecto dura lo mismo que el script invocador
* 
* @params: Int minutes: duración del caché
*
* @return: void
*/
/*private function setCookieParams()
{
    $cookie_params = session_get_cookie_params();

    session_set_cookie_params(
            $cookie_params['path'],
            $cookie_params['domain'],
            'SECURE',
            true);
}

/*
* Crea un token personalizado para mayor seguridad
* 
* @params: void
*
* @return: void
*/
/*private function setSessionToken()
{
    $this->session_token = sha1($this->session_id . 'DeveloperoShield');
}

/*
* Asigna el id de sesión al atributo session_id
* 
* @params: void
*
* @return: void
*/
/*public function setSessionId()
{
    $this->session_id = session_id();
}

/*
* Recupera el valor de session_id
* 
* @params: void
*
* @return: void
*/
/*public function getSessionId()
{
    return $this->session_id;
}

/*
* Crea un nuevo valor al array $_SESSION
* 
* @params: 
*       String name_key: nombre de la llave del array de sesión
*   String value: el valor asociado a la llave
*
* @return: void
*/
/*public function setSessionValue($name_key, $value)
{
    $_SESSION[$name_key] = $value;
}

/*
* Recupera un elemento del array $_SESSION
* 
* @params: String session_value: la llave del array a recuperar
*
* @return: el valor del elemento del array solicitado. Si no existe, false
*/
/*public function getSessionValue($session_value)
{
    if (! empty($_SESSION[$session_value]))
        return $_SESSION[$session_value];

    return false;
}

/*
* Elimina un elemento del array $_SESSION
* 
* @params: String session_value: la llave del array a eliminar
*
* @return: void
*/
/*public function removeSessionValue($session_value)
{
    if (! empty( $_SESSION[$session_value]))
        unset ($_SESSION[$session_value]);
}

/*
* Valida sesión iniciada usando session_token y session_id
*
*   Al autogenerarse al instanciar, siempre deben ser iguales
* 
* @params: void
*
* @return: true en caso de éxito, false lo contrario
*/
/*public function checkSession()
{
    if ($this->session_token === $_SESSION['_session_token_'] and $this->session_id === session_id() )
        return true;

    return false;
}

/*
* Regenera el session_id cuando se deje de hacer referencia al objeto 
* 
* @params: void
*
* @return: void
*/
/*public function __destruct()
{
    $this->sessionRegenerateId();
}

/*
* Regenera el session_id
* 
* @params: void
*
* @return: void
*/
/*private function sessionRegenerateId()
{
    session_regenerate_id();
    $this->setSessionId();
}

/*
* Borra los datos y destruye la sesión.
* 
* @params: void
*
* @return: void
*/
/*public function destroy()
{
    $this->session_id = '';
    session_unset();
    session_destroy();
}*/

}

 ?>