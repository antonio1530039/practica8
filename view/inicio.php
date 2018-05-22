<?php
  $inicio_controller = new MVC();
  $inicio_controller->verificarLoginController();
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
  </head>
  <body>
    <div class="row">
      <div>
        <h3>Inicio</h3>
        </div>

        <div>
          <?php $inicio_controller->mostrarInicioController(); ?>
        </div>
      </div>

    </div>

  </body>
  </html>