<?php
  $controller_maestros = new MVC();
  $controller_maestros->verificarLoginController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion de tutorias</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>

    <div class="row">
 
      <div>
        <h3>Tutorias de profesor <?php echo $_SESSION['maestro_info']['nombre'] ?></h3>
        <input type="button" name="btn_back" value="Registrar Sesion de Tutoria" onclick="window.location = 'index.php?action=registro_tutoria'" class="button tiny success" style="float: right;">
      </div>
        <div>
          <table width="100%">
            <thead>
              <td>Id</td>
              <td>Alumno</td>
              <td>Tutor</td>
              <td>Fecha</td>
              <td>Hora</td>
              <td>Tipo de tutoria</td>
              <td>Tema</td>
              <td></td>
            </thead>
            <tbody>
              <?php 
                $controller_maestros->getTutoriasMaestros("");  
              ?>
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
