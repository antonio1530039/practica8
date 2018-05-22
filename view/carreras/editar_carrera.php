<?php
  $controller_carreras = new MVC();
  
  $controller_carreras->verificarLoginController();

  $controller_carreras->actualizarCarreraController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modificacion de carreras</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <form method="post">
    <div class="row">
      <div>
        <h3>Modificacion de carrera</h3>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=carreras'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
              <?php
                  $controller_carreras->getCarreraController();

              ?>
               <input type='submit' name='btn_actualizar' value='Guardar' class='button tiny success' style='float: right;' onclick="confirmar();">
            
            <!--content !-->
        </div>
      </div>
    </div>
    </form>
  </body>
  <script>
        function confirmar(){
          var x = confirm("Seguro que deseas guardar los datos?");
          if(!x)
            event.preventDefault();
        }

      </script>
  </html>
