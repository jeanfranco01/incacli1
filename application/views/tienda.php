<!DOCTYPE html>
<html>
    <?php require "base/head_html.php"; ?>
    <body>
      <?php require "base/menu.php"?>
      <script>
        $(document).ready(function(){
          
          $.fn.dataTable.ext.errMode = 'none';

          setTimeout('document.location.reload()', 60000);

          var n_compra_pendiente='';
          var n_compra_enviado='';
          var n_compra_cancelado='';
          var n_compra_concluido='';
          var t_pendiente='';
          var t_enviado='';
          var t_cancelado='';
          var t_concluido='';

          var dt_principal= $("#data_table_principal").DataTable({
            "order": [[ 0, "desc" ]],
            "responsive": true,
              "scrollL": true,
              "scrollS": true,
              "scrollX": true,
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
            },
            "processing": true,
            "paging": false,
            "info": false,
            "serverSide": false,
            "destroy": true,
            "ajax": {
              url: 'tienda_admin/getAllPrincipalPendiente',
              type: 'POST' 
            },
  
            "columns": [
 
              { "data": "Id_compra", "name": "Id_compra"},
              { "data": "Fecha", "name": "Fecha"},
              { "data": "Hora", "name": "Hora"},
              { "data": "Usuario_cliente", "name": "Usuario_cliente"},
              { "data": "Direccion", "name": "Direccion"},
              { "data": "Telefono", "name": "Telefono"},
              { "data": "Pedido", "name": "Pedido"},
              { "data": "Metodo", "name": "Metodo"},
              /*{ "data": "Extra", "name": "Extra"},
              { "data": "Monto_platillo", "name": "Monto_platillo"},
              { "data": "Monto_extra", "name": "Monto_extra"},*/
              { "data": "Monto_total", "name": "Monto_total"},
              { "data": "Opciones", "name": "Opciones"}
          
            ]
          });

          function tabla_principal(estado_compra){
            var estado_compra = estado_compra;
            //let fecha_fin = $('#fecha_fin').val()
            //fecha_fin
            let data = { estado_compra, }

            if (estado_compra==3 || estado_compra==4) {
              var dt_principales= $("#data_table_principal").DataTable({
                "order": [[ 0, "desc" ]],
                "responsive": true,
                  "scrollL": true,
                  "scrollS": true,
                  "scrollX": true,
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
                },
                "processing": true,
                "paging": false,
                "info": false,
                "columnDefs": [
                {
                    "targets": [ 8 ],
                    "visible": false,
                    "searchable": false
                }],
                "serverSide": false,
                "destroy": true,
                "ajax": {
                  url: 'tienda_admin/getByAllPrincipalPendiente',
                  type: 'POST',
                  data
                },
      
                "columns": [
     
                  { "data": "Id_compra", "name": "Id_compra"},
                  { "data": "Fecha", "name": "Fecha"},
                  { "data": "Hora", "name": "Hora"},
                  { "data": "Usuario_cliente", "name": "Usuario_cliente"},
                  { "data": "Direccion", "name": "Direccion"},
                  { "data": "Telefono", "name": "Telefono"},
                  { "data": "Pedido", "name": "Pedido"},
                  { "data": "Metodo", "name": "Metodo"},
                  { "data": "Monto_total", "name": "Monto_total"},
                  { "data": "Opciones", "name": "Opciones"}
                ]
              });
            }else{
              var dt_principales= $("#data_table_principal").DataTable({
                "order": [[ 0, "desc" ]],
                "responsive": true,
                  "scrollL": true,
                  "scrollS": true,
                  "scrollX": true,
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
                },
                "processing": true,
                "paging": false,
                "info": false,
                "serverSide": false,
                "destroy": true,
                "ajax": {
                  url: 'tienda_admin/getByAllPrincipalPendiente',
                  type: 'POST',
                  data
                },
      
                "columns": [
     
                  { "data": "Id_compra", "name": "Id_compra"},
                  { "data": "Fecha", "name": "Fecha"},
                  { "data": "Hora", "name": "Hora"},
                  { "data": "Usuario_cliente", "name": "Usuario_cliente"},
                  { "data": "Direccion", "name": "Direccion"},
                  { "data": "Telefono", "name": "Telefono"},
                  { "data": "Pedido", "name": "Pedido"},
                  { "data": "Metodo", "name": "Metodo"},
                  { "data": "Monto_total", "name": "Monto_total"},
                  { "data": "Opciones", "name": "Opciones"}
              
                ]
              });
            }
            
          };

          $(document).on('click','#compra_pendiente', function(e){
            tabla_principal(1);
            $("#div_principal_text_info").empty();
            t_pendiente="<center><h4 style='color:#4F0B25' >"+'PENDIENTE'+"</h4></center>";
              $("#div_principal_text_info").html(t_pendiente);
          });

          $(document).on('click','#compra_enviado', function(e){
            tabla_principal(2);
            t_enviado="<center><h4 style='color:#4F0B25' >"+'EN PROCESO'+"</h4></center>";
              $("#div_principal_text_info").html(t_enviado);
          });

          $(document).on('click','#compra_cancelado', function(e){
            tabla_principal(3);
            t_cancelado="<center><h4 style='color:#4F0B25' >"+'CANCELADO'+"</h4></center>";
              $("#div_principal_text_info").html(t_cancelado);
          });

          $(document).on('click','#compra_concluido', function(e){
            tabla_principal(4);
            t_concluido="<center><h4 style='color:#4F0B25' >"+'CONCLUIDO'+"</h4></center>";
              $("#div_principal_text_info").html(t_concluido);
          });

          $.ajax({
            url: 'tienda_admin/getByNumeroCompraPendiente',
            method: 'post',
            dataType: 'json'
          }).always(function(respuesta){
            if (respuesta[0]>0) {
              audio_compra_pendiente="<audio src='<?= $files_url; ?>audio/incaclic.mp3' controls autoplay hidden></audio>";
              $("#audio_pendiente").html(audio_compra_pendiente);
            }
            
            n_compra_pendiente="<h4 style='color:white' >"+respuesta[0]+"</h4>";
            $("#div_compra_pendiente").html(n_compra_pendiente);

            n_compra_enviado="<h4 style='color:white' >"+respuesta[1]+"</h4>";
            $("#div_compra_enviado").html(n_compra_enviado);

            n_compra_cancelado="<h4 style='color:white' >"+respuesta[2]+"</h4>";
            $("#div_compra_cancelado").html(n_compra_cancelado);

            n_compra_concluido="<h4 style='color:white' >"+respuesta[3]+"</h4>";
            $("#div_compra_concluido").html(n_compra_concluido);
            
          });

          function n_principal(){
            $.ajax({
              url: 'tienda_admin/getByNumeroCompraPendiente',
              method: 'post',
              dataType: 'json'
            }).always(function(respuesta){
              if (respuesta[0]>0) {
                audio_compra_pendiente="<audio src='<?= $files_url; ?>audio/incaclic.mp3' controls autoplay hidden></audio>";
                $("#audio_pendiente").html(audio_compra_pendiente);
              }
              
              n_compra_pendiente="<h4 style='color:white' >"+respuesta[0]+"</h4>";
              $("#div_compra_pendiente").html(n_compra_pendiente);

              n_compra_enviado="<h4 style='color:white' >"+respuesta[1]+"</h4>";
              $("#div_compra_enviado").html(n_compra_enviado);

              n_compra_cancelado="<h4 style='color:white' >"+respuesta[2]+"</h4>";
              $("#div_compra_cancelado").html(n_compra_cancelado);

              n_compra_concluido="<h4 style='color:white' >"+respuesta[3]+"</h4>";
              $("#div_compra_concluido").html(n_compra_concluido);
              
            });
          }
          //INICIO PENDIENTE
            //INICIO BTN CANCELAR
          $(document).on('click','.cancel-compra',function(e){
            var Id_compra=$(this).attr("Id_compra");
            
            $("#btn_form_cancelar_compra").attr("value",Id_compra);
            $("#cancelar_compra_mensaje").html("<center><h4>¿Estas seguro que deseas cancelar el pedido #<b>"+Id_compra+"</b>?</h4></center>");
            $("#modal_mensaje_cancelar").openModal();

          });

          $("#btn_form_cancelar_compra").click(function(e){

            var Id_compra=$("#btn_form_cancelar_compra").attr("value");

            $.ajax({
              url: 'tienda_admin/getCancelCompra',
              method: 'post',
              dataType: 'json',
              data:{
                Id_compra:Id_compra
              }
            }).always(function(respuesta) {
              tabla_principal(1);
              //vaciar();
              //n_principal();
              location.reload();
              $("#modal_mensaje_cancelar").closeModal();
            });
          });
          $("#btn_cancel_cancelar_compra").click(function(){
            $("#modal_mensaje_cancelar").closeModal();
          });

          
            //FIN BTN CANCELAR
            //INICIO BTN PROGRESO
          
          $(document).on('click','.enviar-compra',function(e){
            var Id_compra=$(this).attr("Id_compra");
            
            $("#btn_form_enviar_compra").attr("value",Id_compra);
            $("#enviar_compra_mensaje").html("<center><h4>¿Estas seguro que deseas pasar el pedido #<b>"+Id_compra+"</b> a progreso?</h4></center>");
            $("#modal_mensaje_enviar").openModal();
          });

          $("#btn_form_enviar_compra").click(function(e){

            var Id_compra=$("#btn_form_enviar_compra").attr("value");
            var distribuidor=$('#distribuidor').val();

            //console.log("distribuidor : "+distribuidor);

            $.ajax({
              url: 'tienda_admin/getEnviarCompra',
              method: 'post',
              dataType: 'json',
              data:{
                Id_compra:Id_compra,
                distribuidor:distribuidor
              }
            }).always(function(respuesta) {
              tabla_principal(2);
              //n_principal();
              location.reload();
              $("#modal_mensaje_enviar").closeModal();
            });
          });

          $("#btn_enviar_compra").click(function(){
            $("#modal_mensaje_enviar").closeModal();
          });
            //FIN BTN PROGRESO

          //FIN PENDIENTE

          ///INICIO CONCLUIR
          $(document).on('click','.concluir-compra',function(e){
            var Id_compra=$(this).attr("Id_compra");
            var Id_tienda=$(this).attr("Id_tienda");
            var Id_usuario_cliente=$(this).attr("Id_usuario_cliente");
            var Monto_total=$(this).attr("Monto_total");
            
            $("#btn_form_concluir_compra").attr("value",Id_compra);
            $("#btn_form_concluir_compra").attr("Id_tienda",Id_tienda);
            $("#btn_form_concluir_compra").attr("Id_usuario_cliente",Id_usuario_cliente);
            $("#btn_form_concluir_compra").attr("Monto_total",Monto_total);
            $("#concluir_compra_mensaje").html("<center><h4>¿Estas seguro que deseas concluir el pedido #<b>"+Id_compra+"</b>?</h4></center>");
            $("#modal_mensaje_concluir").openModal();
          });

          $("#btn_form_concluir_compra").click(function(e){

            var Id_compra=$("#btn_form_concluir_compra").attr("value");
            var Id_tienda=$(this).attr("Id_tienda");
            var Id_usuario_cliente=$(this).attr("Id_usuario_cliente");
            var Monto_total=$(this).attr("Monto_total");

            $.ajax({
              url: 'tienda_admin/getConcluidoCompra',
              method: 'post',
              dataType: 'json',
              data:{
                Id_compra:Id_compra,
                Id_tienda:Id_tienda,
                Id_usuario_cliente:Id_usuario_cliente,
                Monto_total:Monto_total
              }
            }).always(function(respuesta) {
              tabla_principal(2);
              //n_principal();
              location.reload();
              $("#modal_mensaje_concluir").closeModal();
            });
          });

          $("#btn_concluir_compra").click(function(){
            $("#modal_mensaje_concluir").closeModal();
          });


          /*$(document).on('click','.concluir-compra',function(e){
            var Id_compra=$(this).attr("Id_compra");
            var Id_tienda=$(this).attr("Id_tienda");
            var Id_usuario_cliente=$(this).attr("Id_usuario_cliente");
            var Monto_total=$(this).attr("Monto_total");

            
            $.ajax({
              url: 'tienda_admin/getConcluidoCompra',
              method: 'post',
              dataType: 'json',
              data:{
                Id_compra:Id_compra,
                Id_tienda:Id_tienda,
                Id_usuario_cliente:Id_usuario_cliente,
                Monto_total:Monto_total
              }
            }).always(function(respuesta) {
              tabla_principal(2);
              //n_principal();
              location.reload();
              $("#modal_mensaje_cancelar").closeModal();

            });

          });*/

          //FIN CONCLUIR


          /*$(document).on('click','.reintegrar-compra',function(e){
            var Id_compra=$(this).attr("Id_compra");
            
            $.ajax({
              url: 'tienda_admin/getReintegrarCompra',
              method: 'post',
              dataType: 'json',
              data:{
                Id_compra:Id_compra
              }
            }).always(function(respuesta) {
              tabla_principal(3);
              //n_principal();
              location.reload();
              $("#modal_mensaje_cancelar").closeModal();

            });

          });*/

          $(document).on('click','#btn_tienda_cierre_caja',function(e){
            $.ajax({
              url: 'tienda_admin/geCierreCajaTotalDia',
              method: 'get',
              dataType: 'json',

            }).always(function(respuesta){
              //console.log(respuesta);
              $("#cierre_caja_mensaje").html("<center><h4>¿Estas seguro que deseas cerrar caja?</h4><h3>Monto del dia S./<b>"+respuesta[0]['Total_dia']+"</b></h3></center>");

              $("#modal_cierre_caja input[id=Total_dia]").val(respuesta[0]['Total_dia']);
              $("#modal_cierre_caja input[id=Fecha]").val(respuesta[0]['Fecha']);

              $("#modal_cierre_caja").openModal();
            });
            
            

          });
          $(document).on('click','#btn_cancel_concluir_compra',function(e){

              $("#modal_mensaje_concluir").closeModal();
          });
          $(document).on('click','#btn_cancel_cierre_caja',function(e){

              $("#modal_cierre_caja").closeModal();
          });

          $(document).on('change','#chk_gastos',function(e){
            //$("#chk_gastos").prop("checked",false);
            if (this.checked){

              var html="<div class='input-field col l4 m4 s12'><input type='number' id='monto_gastos' step='0.01' value='0.00'/><label class='black-text active'>Gasto</label></div><div class='input-field col l8 m8 s12'><input type='text' id='detalle_gastos' value=''/><label class='black-text active'>Detalle gasto</label></div>";
              $("#div_gastos").html(html);

            } else{
              $("#div_gastos").html("");
            }
          });

          $(document).on('click','#btn_form_cerrar_caja',function(e){

            var fecha=$('#Fecha').val();
            var total_dia=$('#Total_dia').val();
            var monto_gastos=$('#monto_gastos').val();
            var detalle_gastos=$('#detalle_gastos').val();
            var is_gastos=($("#chk_gastos").prop('checked'))?1:0;

            /*console.log(Fecha);
            console.log(Total_dia);
            console.log(monto_gastos);
            console.log(detalle_gastos);*/

            if ($("#chk_gastos").prop('checked') == false) {
              //console.log('hola mundo');

              $.ajax({
                url: 'tienda_admin/cerrarCaja',
                method: 'post',
                dataType: 'json',
                data: { 
                  fecha: fecha,
                  total_dia: total_dia,
                  is_gastos: is_gastos
                }

              }).always(function(respuesta){
                //console.log(respuesta);
                Materialize.toast('Se registró el cierre de caja',3000,'rounded');
                setTimeout("location.reload()",600);
              });
            }else{
              //console.log('hola mundo x2');
              $.ajax({
                url: 'tienda_admin/cerrarCaja',
                method: 'post',
                dataType: 'json',
                data: { 
                  fecha: fecha,
                  total_dia: total_dia,
                  monto_gastos: monto_gastos,
                  detalle_gastos: detalle_gastos,
                  is_gastos: is_gastos
                }

              }).always(function(respuesta){
                //console.log(respuesta);
                Materialize.toast('Se registró el cierre de caja',3000,'rounded');
                setTimeout("location.reload()",600);
              });
            }

          });




          $("label").addClass('black-text');
          $("select").material_select();

          //FIN READY
        });
        /*add in base.js*/
        $(document).ready(function(){
          /* setTimeout(() => {
            $("#fecha_fin").val(//"'".date('Y-m-d')."'" )
          }, 100); */
          $('.button-collapse').sideNav({
              menuWidth: 320, // Default is 300
              edge: 'left', // Choose the horizontal origin
              closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
              draggable: true // Choose whether you can drag to open on touch screens
            }
          );
          // START OPEN
          //$('.button-collapse').sideNav('show');
        }); 
      </script>
      <main>
        <?php require "tienda/menu_tienda.php" ?>
      </main>
    </body>
</html>