<?php

  //instancia de la clase controlador
  $controller_maestros = new MVC();
  //se verifica que se haya iniciado sesion 
  $controller_maestros->verificarLoginController();
  //ejecucion del metodo para actualizar el maestro especificado
  $controller_maestros->actualizarMaestroController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modificacion de maestro</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <form method="post">
    <div class="row">
      <div>
        <h3>Modificacion de maestro</h3>
        <p>
          Realice los cambios correspondientes y presione Guardar
        </p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=maestros'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
              <?php
                //se muestran los datos del maestro
                  $controller_maestros->getMaestroController();

              ?>
               <input type='submit' name='btn_actualizar' value='Guardar' class='button tiny success' style='float: right;' onclick="confirmar();">
            
            <!--content !-->
        </div>
      </div>
    </div>
    </form>
  </body>
  <script>
      //confirmacion de guardar cambios
        function confirmar(){
          var x = confirm("Seguro que deseas guardar los datos?");
          if(!x)
            event.preventDefault();
        }

      </script>
  </html>
