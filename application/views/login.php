<!DOCTYPE html>
<html>
<head>
  <?php require "base/head_html.php"; ?>

    <meta charset="utf-8"> 

    <style>
    html {
        height:100%;
        width:100%;
    }
    html{

        background:#8ba987 url("http://app.incaclic.com/files/imagenes/tienda/fondo3.jpg") center center;
        animation-name: logo;
        animation-duration: 3s;
        background-size:100% 100%;

    }
    @keyframes logo{
      0%{
        opacity: 0%;
       
        -webkit-transform: scale(1);
      }  
      50%{
        -webkit-transform: scale(1);
      }
      100%{

        -webkit-transform: scale(2));
        opacity: 1;
      }
    }
    </style>
</head>
<body> 
   

  <script>
  	$(document).ready(function(){

      $(document).on('keyup','.input-login',function(e){
        var key=e.keyCode;
        if(key==13){
          var usuario=$("#login_email").val();
          var password=$("#login_password").val();
          //var password=sha1(password);

          $.ajax({
            url: 'login/validador',
            method: 'POST',
            dataType: 'JSON',
            data:{
              usuario:usuario,
              password:password
            }
            
          }).always(function(response){
            console.log(response);
           /* if (response>0) {
            Materialize.toast('hiciste clic en imput-login',2500,'rounded');
           
            }else{
              Materialize.toast("USUARIO O CLAVE INVALIDO",5000,"red rounded");
            
            }*/
            
            /*location.reload();*/
          });
        }
      });
      
  		$("#btn_form_login").click(function(){
  			var usuario=$("#login_email").val();
  			var password=$("#login_password").val();
        

  			$.ajax({
  				url: 'login/validador',
  				method: 'POST',
  				dataType: 'JSON',
  				data:{
  					usuario:usuario,
  					password:password
  				}
          
  			}).always(function(response){
          console.log(response);
          /*location.reload();*/
  				/*if (response>0) {
  					Materialize.toast("BIENVENIDO ",5000,"green rounded");
  				}else{
  					Materialize.toast("USUARIO O CLAVE INVALIDO",5000,"red rounded");
  				}*/
  			});

        
  		});
  		//FIN READY
  	});
  </script>
  <main><?php require "login/inicio_login.php"; ?></main>
</body>
</html>