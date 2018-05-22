<?php
  $controller_maestros = new MVC();
  $controller_maestros->verificarLoginController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reportes</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>

    <div class="row">
 
      <div>
        <h3>Reportes</h3>
        <select name="query">
          <option value="alumnos">Alumnos</option>
          <option value="maestros">Mestros</option>
          <option value="sesion_tutoria">Sesiones de Tutoria</option>
        </select>
        <input type="submit" name="btn_filtrar" value="Filtrar" class="button tiny success" style="float: right;">
      </div>
        <div>
              <?php $controller_maestros->getMaestrosController();  ?>          
        </div>
      </div>
    </div>
