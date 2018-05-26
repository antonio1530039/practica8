<?php
  //instancia de la clase controlador
  $controller_tutorias = new MVC();
  //se verifica que se haya iniciado sesion
  $controller_tutorias->verificarLoginController();


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detalle de Sesión de Tutoria</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <form method="post">
    <div class="row">
      <div>
        <h3>Información de sesión de tutorias</h3>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=sesion_tutoria'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
            
              <?php
                //se muestra la informacion de la tutoria especificada
                  $controller_tutorias->getTutoriaController();

              ?>
              
            
            <!--content !-->
        </div>
      </div>
    </div>
    </form>
  </body>
  </html>
