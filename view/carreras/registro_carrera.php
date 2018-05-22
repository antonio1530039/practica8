<?php
  $controller_carreras = new MVC();

  $controller_carreras->verificarLoginController();

  $controller_carreras->registroCarreraController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de carrera</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <form method="post">
    <div class="row">
      <div>
        <h3>Registro de carrera</h3>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=carreras'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
            <p>
              <label>Nombre</label>
              <input type="text" name="nombre" placeholder="Nombre" required="">
            </p>
               <input type="submit" name="btn_agregar" value="Registrar" class="button tiny success" style="float: right;">
            
            <!--content !-->
        </div>
      </div>
    </div>
    </form>
  </body>
  </html>
