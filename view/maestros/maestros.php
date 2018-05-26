<?php
  //se crea la instancia de la clase controlador
  $controller_maestros = new MVC();
  //se verifica que se haya iniciado sesion
  $controller_maestros->verificarLoginController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Gestion de maestros</title>
  </head>
  <body>

    <div class="row">
    
      <div>
        <h3>Gestión de Maestros</h3>
        <input type="button" name="btn_back" value="Registrar maestro" onclick="window.location = 'index.php?action=registro_maestro'" class="button tiny success" style="float: right;">
      </div>
        <div>
          <table style="width:100%">
            <thead>
              <td>Numero Empleado</td>
              <td>Nombre</td>
              <td>Carrera</td>
              <td>Correo</td>
              <td>Tipo de usuario</td>
              <td></td>
              <td></td>
            </thead>
            <tbody>
              <?php 
              //se muestra el listado de maestros
              $controller_maestros->getMaestrosController("");  
              ?>
            </tbody>
          </table>
          
        </div>
      </div>
      <script>
          //funcion de confirmacion de borrado de registro
        function confirmar(){
          var x = confirm("Seguro que deseas borrar el registro?");
          if(!x)
            event.preventDefault();
        }
      </script>
    </div>
