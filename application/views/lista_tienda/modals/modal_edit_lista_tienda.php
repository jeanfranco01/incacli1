<div id="modal_edit_lista_tienda" class="modal">
  <div class="modal-content">
    <center><b><h4>Lista Tienda</h4></b></center><br>
    <form method="post" id="form_edit_listatienda">
      <div class="row">
        <div class="col s12 m12">
          <div class="card">
            <div class="card-image col s12 m6 l6 ">
                <div id="div_img_producto"></div>                          
                <div class="file-field input-field">
                  <div class="btn">
                    <span>File</span>
                    <input type="file" id="imagen_listatienda">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" id="imagen_texto"type="text">
                  </div>
                </div>
               
             </div>
            <div class="card-content col s12 m6 l6">
              <input type="hidden" name="id_tienda" id="id_tienda" value="">        
              <div class="col s12 m4 l4"> 
                <label for="nombre_tienda" class="black-text">Nombre de la tienda</label>
                <input name="nombre_tienda" id="nombre_tienda" type="text" class="validate" autocomplete="off">
              </div>
              <div class="col s12 m4 l4"> 
                <label for="propietario_tienda" class="black-text">propietario de la tienda</label>
                <input name="propietario_tienda" id="propietario_tienda" type="text" class="validate" autocomplete="off">
              </div>
              <div class="col s12 m4 l4"> 
                <label for="telefono_tienda" class="black-text">telefono de la tienda</label>
                <input name="telefono_tienda" id="telefono_tienda" type="number" class="validate" autocomplete="off">
              </div>
              <div class="col s12 m4 l4"> 
                <label for="direccion_tienda" class="black-text">direccion de la tienda</label>
                <input name="direccion_tienda" id="direccion_tienda" type="text" class="validate" autocomplete="off">
              </div>
              <div class="col s12 m4 l4"> 
                <label for="fecha" class="black-text">fecha creacion</label>
                <input name="fecha" id="fecha" type="text" class="validate" autocomplete="off">
              </div>
              <div class="col s12 m4 l4"> 
                <label for="email_tienda" class="black-text">email de la tienda</label>
                <input name="email_tienda" id="email_tienda" type="text" class="validate" autocomplete="off">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    
    <div class="row">
      <div class="col s1"><div class="row"></div></div>
      <center>
      <div class="col s10">
          <button class="btn round-btn waves-effect waves-light green darken-1" id="btn_form_edite_listatienda">Agregar<i class="material-icons right">save</i>
          </button>
          <button class="btn round-btn waves-effect waves-light grey darken-1" id="btn_cancel_edite_listatienda">Cancelar<i class="material-icons right">close</i>
          </button>
      </div>
      </center>
    </div>
  </div>
</div>