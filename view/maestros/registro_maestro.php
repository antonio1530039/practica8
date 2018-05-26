<?php
  //se crea la instancia del controlador
  $controller_maestros = new MVC();
  //se verifica si se inicio sesion
  $controller_maestros->verificarLoginController();
  //ejecucion del metodo registro del controlador
  $controller_maestros->registroMaestroController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de maestro</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <form method="post">
    <div class="row">
      <div>
        <h3>Registro de maestro</h3>
        <p>
          Por favor, ingrese la información que se pide a continuación
        </p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=maestros'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
            <p>
              <label>Numero de empleado</label>
              <input type="text" name="numero_empleado" placeholder="Numero de Empleado" required="">
            </p>

            <p>
              <label>Nombre</label>
              <input type="text" name="nombre" placeholder="Nombre" required="">
            </p>
            <p>
              <label>Carrera</label>
              <select name="carrera" required="" class='select2'>
                  <?php
                    $controller_maestros->getSelectForCarreras("");
                  ?>
              </select>
            </p>
            <p>
              <label>Correo</label>
              <input type="email" name="correo" placeholder="Correo" required="">
            </p>
            <p>
              <label>Password</label>
              <input type="text" name="password" placeholder="Password" required="">
            </p>
            <select name="tipo">
              <option value="1">Superadmin</option>
              <option value="0">Maestro</option>
          </select>
               <input type="submit" name="btn_agregar" value="Registrar" class="button tiny success" style="float: right;">
            
            <!--content !-->
        </div>
      </div>
    </div>
    </form>
  </body>
  </html>
