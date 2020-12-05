
<!DOCTYPE html>
<html>
    <?php require "base/head_html.php"; ?>
    <body>
      <?php require "base/menu.php"?>
      <script>
        $(document).ready(function(){
          
          $.fn.dataTable.ext.errMode = 'none';

          /*setTimeout('document.location.reload()', 60000);*/
          $("label").addClass('black-text');
          $("select").material_select();

          //FIN READY
     }); 

        /*add in base.js*/
        $(document).ready(function(){
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
      	<div>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="file" name="upload">
				<input type="submit" value="Submit">
			</form>
		</div>
    </body>
</html>