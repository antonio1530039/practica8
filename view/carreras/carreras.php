<?php
  $controller_carreras = new MVC();
  $controller_carreras->verificarLoginController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion de carreras</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>

    <div class="row">
 
      <div>
        <h3>Carreras</h3>
        <input type="button" name="btn_back" value="Registrar carrera" onclick="window.location = 'index.php?action=registro_carrera'" class="button tiny success" style="float: right;">
      </div>
        <div>
          <table width="100%">
            <thead>
              <td>Id</td>
              <td>Nombre</td>
              <td></td>
              <td></td>
            </thead>
            <tbody>
              <?php $controller_carreras->getCarrerasController();  ?>
            </tbody>
          </table>
          
        </div>
      </div>
      <script>
        function confirmar(){
          var x = confirm("Seguro que deseas borrrar el registro?");
          if(!x)
            event.preventDefault();
        }

      </script>
    </div>
