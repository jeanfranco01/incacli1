<?php 
  $a=current_url();
  $b=explode("/",$a);
  $last_url=end($b);
  $primary="cyan lighten-4";
  $second="white";
?>

 

<nav>

    <div class="nav-wrapper cyan blue-grey darken-2">
      <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
      
      <a href="javascript:void(0);" class="brand-logo" target="_blank"></a>
      <ul class="right">
        <!--<li><a class="dropdown-button" href = "#" data-activates="dropdown_notificaciones">
          <i class = "mdi-navigation-arrow-drop-down right"></i>
          <i class="material-icons">notifications</i></a></li>
	    <li><a href="javascript:void(0);"><i class="material-icons">account_circle</i></a></li>-->
	    <li><a class="dropdown-button" href="javascript:void(0);" data-activates="dropdown_opciones" data-constrainwidth><i class="material-icons">arrow_drop_down</i></a></li></ul>

       <!--  <ul id = "dropdown_notificaciones" class = "dropdown-content">
       <li class="header">
        <p> hola mundo</p>
       </li>
             
      </ul>

    <ul id = "dropdown_notificacioness" class = "dropdown-content">
         <ul class="dropdown-menu">
          
            <li class="header">New Mensaje <i class="material-icons"> card_giftcard </i></li>
            <li>
               
              <ul class="badge">
                <li> 
                  <a href="#">
                    <div class="pull-left">
                    </div>
                    <h4>  Support Team
                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                     
              </ul>
            </li>
              <li class="footer"><a href="#">See All Messages</a></li>
          
            </ul>
      </ul>
    
      -->
        



	    <ul id="dropdown_opciones" class="dropdown-content">
            <!--<li>
                <a href="javascript:void(0);" class="grey-text text-darken-1"><i class="material-icons">face</i> Perfil</a>
            </li>
            <li>
                <a href="javascript:void(0);" class="grey-text text-darken-1" id="menu_ayuda"><i class="material-icons">live_help</i> Ayuda</a>
            </li>-->
            <li class="divider"></li>
            <li>
                <a href="<?= $url ?>login/logout" id="logout" class="grey-text text-darken-1"><i class="material-icons">keyboard_tab</i> Cerrar Sesión</a>
            </li>
        </ul>
         
      <ul class="side-nav white" id="mobile-demo">
        <li class="sidenav-header cyan blue-grey darken-1">
          <div class="row">
          	<div style="height: 15px;"></div>
            <div class="col s4">
                <img src="<?= $imagenes ?>tienda/ico.png" width="60px" height="60px" alt="" class="circle responsive-img valign profile-image">
            </div>
            <div class="col s8">

                <a class="btn-flat dropdown-button waves-effect waves-light white-text" href="#" data-activates="profile-dropdown"><?= $_SESSION['Usuario'] ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                <!--<ul id="profile-dropdown" class="dropdown-content">
                    <li><a href=""><i class="material-icons">person</i>Perfil</a></li>
                    <li><a href="<?= $url ?>login/logout"><i class="material-icons">exit_to_app</i>Logout</a></li>
                </ul>--> 
            </div>
          </div>
        </li>


          <!-- SECCION -->  
          <li><a class="subheader">ADMINISTRAR</a></li>

          <li <?php if($last_url=="tienda_admin") { echo "class='$primary'"; } else { echo "class='$second'"; } ?> ><a href="<?= $url ?>tienda_admin" class="waves-effect waves-light"><i class="material-icons">home</i>Principal</a></li>

          <?php if ($_SESSION['Tipo_usuario_master']=="Administrador" || $_SESSION['Tipo_usuario_master']=="Supervisor") { ?>
            <li <?php if($last_url=="cierre_caja") { echo "class='$primary'"; } else { echo "class='$second'"; } ?> ><a href="<?= $url ?>cierre_caja" class="waves-effect waves-light"><i class="material-icons">home</i>Reporte Cierre</a></li>
          

          <li><a class="subheader">AGREGAR</a></li>

          <li <?php if($last_url=="producto") { echo "class='$primary'"; } else { echo "class='$second'"; } ?> ><a href="<?= $url ?>producto" class="waves-effect waves-light"><i class="material-icons">home</i>Producto</a></li>
          <?php } ?>

          <?php if($_SESSION['Id_tipo_usuario_master']==3){ ?>
            <li><a class="subheader">Currier</a></li>

            <li <?php if($last_url=="currier") { echo "class='$primary'"; } else { echo "class='$second'"; } ?> ><a href="<?= $url ?>currier" class="waves-effect waves-light"><i class="material-icons">home</i>Currier</a></li>

            <li><a class="subheader">Asignar movilidad</a></li>

            <li <?php if($last_url=="asignar_movilidad") { echo "class='$primary'"; } else { echo "class='$second'"; } ?> ><a href="<?= $url ?>asignar_movilidad" class="waves-effect waves-light"><i class="material-icons">home</i>asignar_movilidad</a></li>
            <li><a class="subheader">Asignar operador</a></li>

            <li <?php if($last_url=="asignar_operador") { echo "class='$primary'"; } else { echo "class='$second'"; } ?> ><a href="<?= $url ?>asignar_operador" class="waves-effect waves-light"><i class="material-icons">home</i>asignar_operador</a></li>
          <?php } ?>






        <!-- TIPO USUARIO ADMINISTRADOR -->  
        <?php if($_SESSION['Id_tipo_usuario_master']==1){ ?>

          <li><a class="subheader">PRUEBAS</a></li>

          <li <?php if($last_url=="lista_tienda") { echo "class='$primary'"; } else { echo "class='$second'"; } ?> ><a href="<?= $url ?>lista_tienda" class="waves-effect waves-light"><i class="material-icons">home</i>LISTA TIENDAS</a></li>

        <?php } ?>

        <?php if($_SESSION['Id_tipo_usuario_master']==4){ ?>
            <li><a class="subheader">Repartidor</a></li>

            <li <?php if($last_url=="repartidor") { echo "class='$primary'"; } else { echo "class='$second'"; } ?> ><a href="<?= $url ?>repartidor" class="waves-effect waves-light"><i class="material-icons">home</i>Repartidor</a></li>

          <?php } ?>
        <!-- FIN TIPO USUARIO ADMINISTRADOR -->  
          
        
      </ul>
      
    </div>
    
</nav>


<div id="modal_ayuda" class="modal">
  <div class="modal-content">
     
      <header id="header_seccion_ayuda"><h3>SECCION AYUDA </h3></header>

      <div class="container" id="seccion_cuerpo_ayuda">
          <p>
            GESTION TIENDA ES UN SISTEMA CREADO, PARA LA GESTION DE COMPRAS.
          </p>
            
          <p>
            PARA RECIBIR ALGUN TIPO DE AYUDA POR FAVOR CONTACTARSE POR ESTE MEDIO.
            <br><br>
            <li><b>Telefono: </b>123456 / Anex. 123 </li>
            <li><b>Correo: </b>soporte.incaclic@gmail.com </li>
          </p>
      </div>

      <div>
        <center><button id="regresar_ayuda" class="btn btn-success"> VOLVER</button></center>
      </div>
  </div>
</div>









<style type="text/css">

  li{
    display: block;
  }

  #seccion_cuerpo_ayuda{
    font-family: 'Slabo 27px', serif; 
  }

  #header_seccion_ayuda{
    font-weight: bold;
    
    margin-bottom: 35px;
    font-family: font-family: 'Bitter', serif;
  }

  #credipusa{
    color:white;
  }

  #dropdown_notificaciones{
    padding:15px;
    margin-top: 5%;  
    max-height:550px;
    background-color: #546e7a;
  }

 
  .round-btn {
    margin: 1px;
    border-radius: 25px;
  }
  .full { 
    width: 95%;
    max-height: 95%;
    height: 95%;
    top: 0 !important;
  }
  label {
    color: #000;
  }
  .tabs .tab a{
    color:#00ACC1;
  }
  .tabs .tab a:hover,.tabs .tab a.active {
    background-color:transparent;
    color:#008B9B;
  }
  .tabs .tab.disabled a,.tabs .tab.disabled a:hover {
    color:rgba(102,147,153,0.7);  
  }
  .tabs .indicator {
    background-color:#009BAD;
  }
  .checkbox-black[type="checkbox"] + label:before{
    border: 2px solid black;
    background: transparent;
  }
  .checkbox-black[type="checkbox"]:checked + label:before{
    border: 2px solid transparent;
    border-bottom: 2px solid black;
    border-right: 2px solid black;
    background: transparent;
  }
  .checkbox-black.filled-in[type="checkbox"] + label:after{
    border: 2px solid black;
    background: transparent;
  }
  .checkbox-black.filled-in[type="checkbox"]:checked + label:after{
    background: black;
  }
  .checkbox-black.filled-in[type="checkbox"]:checked + label:before{
    border-top: 2px solid transparent;
    border-left: 2px solid transparent;
    border-right: 2px solid #fff;
    border-bottom: 2px solid #fff;
  }
</style>

<script type="text/javascript">

  $("#menu_ayuda").click(function(e){
     $("#modal_ayuda").openModal();
  });


  $("#regresar_ayuda").click(function(e){
    e.preventDefault();
    $("#modal_ayuda").closeModal();
  })

 // $("#menu_ayudas").openModal();
  function getFormatFromDate(fecha){
    return fecha.getFullYear()+"-"+((fecha.getMonth()<9)?"0":"")+(fecha.getMonth()+1)+"-"+((fecha.getDate()<10)?"0":"")+fecha.getDate();
  }
  function getFormatDBFromDate(fecha){
    return fecha.getFullYear()+"-"+((fecha.getMonth()<9)?"0":"")+(fecha.getMonth()+1)+"-"+((fecha.getDate()<10)?"0":"")+fecha.getDate();
  }
  function getDate(fecha){
    fecha_show=new Date(fecha.replace(/-/g, '\/'));
    return fecha_show;
  }

  function setDataTable(entidad,i){
    return $("#data_table_"+entidad).DataTable({
        "order": [[ i, "asc" ]],
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontró registros",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoFiltered":   "(Filtrado de _MAX_ total registros)",
        "infoEmpty": "No hay registros disponibles",
        "search": "Buscar",
        "display" : "cantidad",
        "paginate": {
                        "first":      "Primero",
                        "last":       "Ultimo",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
        }
    });
}
function isLogin(){
  var is;
  $.ajax({
    url:'login/isLogin',
    method: 'post',
    dataType: 'json'
  })
  .done(function(respuesta){
    console.log(respuesta);
    if(respuesta!=""){
      is=true;
    } else{
      is=false;
    }
    return is;
  });
}
function setDataTableAsc(entidad,i){
    return $("#data_table_"+entidad).DataTable({
        "order": [[ i, "asc" ]],
        "destroy": true,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontró registros",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoFiltered":   "(Filtrado de _MAX_ total registros)",
        "infoEmpty": "No hay registros disponibles",
        "search": "Buscar",
        "display" : "cantidad",
        "paginate": {
                        "first":      "Primero",
                        "last":       "Ultimo",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
        }
    });
}
</script>