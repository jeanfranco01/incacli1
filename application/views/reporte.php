<!DOCTYPE html>
<html>
    <?php require "base/head_html.php"; ?>
    <body>
      <?php require "base/menu.php"?>
      <script>
        $(document).ready(function(){
      

        });

        $(document).ready(function(){
          $('.button-collapse').sideNav({
              menuWidth: 320, 
              edge: 'left', 
              closeOnClick: false, 
              draggable: true 
            }
          );
        }); 
      </script>
      <main>
        <?php require "reporte/menu_reporte.php" ?>
      </main>
    </body>
</html>