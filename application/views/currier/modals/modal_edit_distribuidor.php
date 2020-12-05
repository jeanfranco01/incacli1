<div id="modal_edit_distribuidor" class="modal">
  <div class="modal-content">
    <center><b><h4>Asignar Distribuidor</h4></b></center><br>
    <form method="post" id="form_edit_distribuidor">
      <div class="row">
        <input type="hidden" name="id_compra" id="id_compra" value="">
        <div class="col-s4 col-xl-4">
          <label>Distribuidor</label>
        </div>
        <div class="col s12 m12 l12"> 
          <div class="col s6 m6 l6">
          <select id="Id_tipo_distribuidor" placeholder="selececione distribuidor">       

            <?php foreach ($movilidad as $movilidads) { ?>
            <option value="<?= $movilidads['Id_movilidad'] ?>"><?= $movilidads["Id_movilidad"] ." / " .$movilidads["Placa"] ?></option>
          <?php } ?>
          </select>
          </div>
          <div class="col s6 m6 l6">
          <select id="Id_repatidor" placeholder="selececione repartidor">       

            <?php foreach ($all_repartidor as $all_repartidors) { ?>
            <option value="<?= $all_repartidors['Id_usuario_tienda'] ?>"><?= $all_repartidors["Usuario_tienda"] ." / " .$all_repartidors["Dni"] ?></option>
          <?php } ?>
          </select>
          </div>
        </div>
       
    </div>    
    </form>
    
    <div class="row">
      <div class="col s1"><div class="row"></div></div>
      <center>
      <div class="col s10">
          <button class="btn round-btn waves-effect waves-light green darken-1" id="btn_form_add_pedido">Agregar<i class="material-icons right">save</i>
          </button>
          <button class="btn round-btn waves-effect waves-light grey darken-1" id="btn_cancel_add_pedido">Cancelar<i class="material-icons right">close</i>
          </button>
      </div>
      </center>
    </div>
  </div>
</div>