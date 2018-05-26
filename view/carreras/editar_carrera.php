<?php
  //instancia de la clase controlador
  $controller_carreras = new MVC();
    //se verifica si se inicio sesion
  $controller_carreras->verificarLoginController();
  //ejecucion de la actualizacion de la carrera
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
        <p>
          Realice los cambios correspondientes y presione Guardar
        </p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=carreras'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
              <?php
                //se muestran los datos de la carrera
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
      //funcion de confirmacion de guardado
        function confirmar(){
          var x = confirm("Seguro que deseas guardar los datos?");
          if(!x)
            event.preventDefault();
        }

      </script>
  </html>
